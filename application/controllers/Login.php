<?php

class login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("mLogin");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title']          = "UndanganKu";
        $data['subtitle']       = "Halaman login customer";

        // hapus session sebelumnya
        $this->session->sess_destroy();

        $this->load->view('templates/header', $data);
        $this->load->view('vLogin', $data);
        $this->load->view('templates/footer', $data);
    }

    public function loginAksi()
    {
    }

    /**
     * proses daftar peserta baru
     */
    public function signup()
    {
        $data['title']          = "Events";
        $data['subtitle']       = "Daftar akun baru";

        $this->load->view('templates/header', $data);
        $this->load->view('mhs/vSignup', $data);
        $this->load->view('templates/footer', $data);
    }

    public function signupAksi()
    {
    }

    public function signupSukses()
    {
        $data = array(
            'title'     => 'Seminar',
            'subtitle'  => 'Berhasil',
        );

        $this->load->view('templates/header', $data);
        $this->load->view('mhs/vSignupSukses', $data);
        $this->load->view('templates/footer', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
