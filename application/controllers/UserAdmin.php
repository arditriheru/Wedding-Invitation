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
}
