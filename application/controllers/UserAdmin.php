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

    // template master
    public function nakula($id)
    {
        $user = $this->mUserAdmin->detailPesan(['id_pesan' => $id])->row();

        $data['title']          = "UndanganKu";

        $d                      = $this->input->get('d');
        $data['yth']            = urldecode($d);

        $data['id_wedding']     = $id;

        $data['counter_thn']    = date('Y', strtotime($user->akad_date));
        $data['counter_bln']    = date('m', strtotime($user->akad_date));
        $data['counter_tgl']    = date('d', strtotime($user->akad_date));

        $data['mp_pict']        = $user->groom_pict;
        $data['mw_pict']        = $user->bride_pict;
        $data['mp']             = $user->groom_nickname;
        $data['mw']             = $user->bride_nickname;
        $data['mpp']            = $user->groom;
        $data['mwp']            = $user->bride;
        $data['mp_ortu']        = $user->groom_father . ' & ' . $user->groom_mother;
        $data['mw_ortu']        = $user->bride_father . ' & ' . $user->bride_mother;

        $data['hari_akad']      = formatHari($user->akad_date);
        $data['tgl_akad']       = formatDateIndo($user->akad_date);
        $data['jam_akad1']      = substr($user->akad_time, 0, -8) . ' WIB';
        $data['jam_akad2']      = substr($user->akad_time, -5) . ' WIB';
        $data['tempat_akad']    = $user->akad_place;
        $data['alamat_akad']    = $user->akad_address;
        $data['map_akad']       = $user->akad_map;

        $data['hari_resepsi']   = formatHari($user->resepsi_date);
        $data['tgl_resepsi']    = formatDateIndo($user->resepsi_date);
        $data['jam_resepsi1']   = substr($user->resepsi_time, 0, -8) . ' WIB';
        $data['jam_resepsi2']   = substr($user->resepsi_time, -5) . ' WIB';
        $data['tempat_resepsi'] = $user->resepsi_place;
        $data['alamat_resepsi'] = $user->resepsi_address;
        $data['map_resepsi']    = $user->resepsi_map;

        $where = array(
            'id_wedding' => $id,
        );

        // $data['datapesan'] = $this->mModel->selectData('pengirim, pesan, tanggal, jam', 'wed_pesan', $where, 'id_wed_pesan DESC')->result();

        $this->load->view('templates/nakula/layout/vHeader', $data);
        $this->load->view('templates/nakula/vIndex', $data);
        $this->load->view('templates/nakula/layout/vFooter', $data);
    }
}
