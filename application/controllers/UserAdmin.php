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
        $data['dataPesan']      = $this->mUserAdmin->detailPesan('pesan.valid=0')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/vDashboard', $data);
        $this->load->view('templates/footer', $data);
    }

    // halaman admin
    public function admin()
    {
        $data['title']          = getDateIndo();
        $data['subtitle']       = "Daftar Admin";

        $data['dataAdmin']   = $this->mUserAdmin->getData("admin")->result();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/vAdmin', $data);
        $this->load->view('templates/footer', $data);
    }

    // halaman template
    public function template()
    {
        $data['title']          = getDateIndo();
        $data['subtitle']       = "Daftar Template";

        $data['dataTemplate']   = $this->mUserAdmin->getData("template")->result();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/vTemplate', $data);
        $this->load->view('templates/footer', $data);
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
            'title'         => $this->input->post('title'),
            'subtitle'      => $this->input->post('subtitle'),
            'image'         => $file,
        );

        if (!$this->mUserAdmin->insertData('template', $data)) {
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p>Gagal melakukan order, silahkan coba lagi</p>
            </div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
