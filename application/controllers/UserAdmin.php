<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Load library phpspreadsheet
require('./vendor/excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// End load library phpspreadsheet

class UserAdmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') != '1') {

            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable">
        		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        		<p>Session berakhir, silahkan login</p>
        		</div>');
            redirect('login');
        }

        $this->load->model("mUserAdmin");
        $this->load->helper(array('url', 'download'));
        $this->load->library('form_validation', 'excel');
    }

    // halaman utama
    public function index()
    {
        $data['title']          = getDateIndo();
        $data['subtitle']       = "Dashboard";

        // data pesanan
        $data['dataPesan']      = $this->mUserAdmin->detailPesan('id_pesan IS NOT NULL')->result();

        $this->load->view('layout/header', $data);
        $this->load->view('admin/vDashboard', $data);
        $this->load->view('layout/footer', $data);
    }

    // halaman admin
    public function admin()
    {
        $data['title']          = getDateIndo();
        $data['subtitle']       = "Daftar Admin";

        $data['dataAdmin']   = $this->mUserAdmin->getData("admin")->result();

        $this->load->view('layout/header', $data);
        $this->load->view('admin/vAdmin', $data);
        $this->load->view('layout/footer', $data);
    }

    // halaman template
    public function template()
    {
        $data['title']          = getDateIndo();
        $data['subtitle']       = "Daftar Template";

        $data['dataTemplate']   = $this->mUserAdmin->getData("template")->result();

        $this->load->view('layout/header', $data);
        $this->load->view('admin/vTemplate', $data);
        $this->load->view('layout/footer', $data);
    }

    // tambah template proses
    public function tambahTemplateAksi()
    {
        $config['upload_path']          = './assets/uploads/templates/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['overwrite']            = true;
        $config['max_size']             = 500; // 5KB
        $config['encrypt_name']         = true;
        $this->load->library('upload', $config);

        // image
        if (!empty($_FILES['file']['name'])) {
            $this->upload->do_upload('file');
            $data = $this->upload->data();
            $file = $data['file_name'];
        }

        $data = array(
            'title'         => strtoupper($this->input->post('title')),
            'subtitle'      => $this->input->post('subtitle'),
            'image'         => $file,
        );

        if (!$this->mUserAdmin->insertData('template', $data)) {
            $this->session->set_flashdata('success', 'Berhasil menambah data');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', 'Gagal menambah data');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    // proses validasi pesanan
    public function validasiPesan($value, $id)
    {
        $data = array(
            'valid'      => $value,
        );

        if (!$this->mUserAdmin->updateData('pesan', $data, array('id_pesan' => $id))) {

            $this->session->set_flashdata('success', 'Berhasil validasi data');
            redirect($_SERVER['HTTP_REFERER']);
        } else {

            $this->session->set_flashdata('error', 'Gagal validasi data');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    // tambah admin proses
    public function tambahAdminAksi()
    {
        $data = array(
            'nama'      => $this->input->post('nama'),
            'username'  => $this->input->post('username'),
            'password'  => md5($this->input->post('password')),
        );

        if (!$this->mUserAdmin->insertData('admin', $data)) {
            $this->session->set_flashdata('success', 'Berhasil menambah data');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', 'Gagal menambah data');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function downloadFileCp($id)
    {
        if (force_download('./assets/uploads/orders/' . $id, NULL)) {
            $this->session->set_flashdata('success', 'Berhasil mendownload data');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('error', 'Gagal mendownload data');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    // Upload excel data kontak
    public function uploadExcelKontak($id)
    {
        $upload_file    = $_FILES['upload_file']['name'];
        $extension      = pathinfo($upload_file, PATHINFO_EXTENSION);

        // cek ekstensi file
        if ($extension == 'csv') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } else if ($extension == 'xls') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $spreadsheet    = $reader->load($_FILES['upload_file']['tmp_name']);
        $sheetdata      = $spreadsheet->getActiveSheet()->toArray();
        $sheetcount     = count($sheetdata);

        if ($sheetcount > 1) {
            $dataMhs   = array();

            for ($i = 1; $i < $sheetcount; $i++) {

                $data[] = array(
                    'name'      => $sheetdata[$i][1],
                    'contact'   => $sheetdata[$i][2],
                    'id_pesan'  => $id,
                );
            }

            if (
                $this->mUserAdmin->insert_batch('invitation_contact', $data)
            ) {
                $this->session->set_flashdata('success', 'Berhasil upload data');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('error', 'Gagal upload data');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

    // Download ke excel link share
    public function downloadLinkShare($title, $id)
    {
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $spreadsheet->createSheet();
        $spreadsheet->createSheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('UndanganKu')
            ->setLastModifiedBy('UndanganKu')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Test result file');

        $query = $this->mUserAdmin->listKontak(['invitation_contact.id_pesan' => $id])->result();

        // Data worksheet mahasiswa
        $spreadsheet->setActiveSheetIndex(0)
            ->setTitle('Data Mahasiswa')
            ->setCellValue('A1', '#')
            ->setCellValue('B1', 'NAMA PENERIMA')
            ->setCellValue('C1', 'LINK');

        $no     = 1;
        $i      = 2;

        foreach ($query as $d) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $i, $no++)
                ->setCellValue('B' . $i, $d->name_contact)
                ->setCellValue('C' . $i, 'https://wa.me/' . $d->contact_number . '?text=Klik%20tautan%20berikut%20ini%20untuk%20melihat%20undangan%20pernikahan%20%0A%0A' . base_url('u/' . strtolower($title) . '/' . $d->id_pesan . '?d=' . $d->name_contact) . '%0A%0AKami%20yang%20berbahagia%2C%20%0A' . $d->bride_nickname . '%20%0A%26%0A' . $d->groom_nickname . '%20');
            $i++;
        }

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Data Link Share".xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }
}
