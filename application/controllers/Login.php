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

        $this->load->view('layout/header', $data);
        $this->load->view('vLogin', $data);
        $this->load->view('layout/footer', $data);
    }

    public function loginAksi()
    {
        // jika login sebagai admin
        if ($this->mLogin->login(
            'admin',
            [
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password'))
            ]
        ) !== FALSE) {

            // ambil data user
            $data = $this->mLogin->userData(
                'admin',
                [
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password'))
                ]
            )->row();

            // set session
            $userdata = array(
                'login'         => 1,
                'notif'         => $data->nama,
                'login_as'      => 'Admin',
            );
            $this->session->set_userdata($userdata);
            $this->session->set_flashdata('success', 'Hai, Selamat Datang..');
            redirect('userAdmin/index?menuUtama=active');
        }

        // jika login customer
        elseif ($this->mLogin->login(
            'customer',
            [
                'email'     => $this->input->post('username'),
                'password'  => md5($this->input->post('password'))
            ]
        ) !== FALSE) {

            // ambil data user
            $data = $this->mLogin->userData(
                'customer',
                [
                    'email'     => $this->input->post('username'),
                    'password'  => $this->input->post('password')
                ]
            )->row();

            // set session
            $userdata = array(
                'login'         => 1,
                'user_name'     => $data->name,
                'user_email'    => $data->email,
                'notif'         => $data->nama,
            );
            $this->session->set_userdata($userdata);
            $this->session->set_flashdata('success', 'Hai, Selamat Datang..');
            redirect('home/order?template=' . $this->input->get('template'));
        }

        // jika user tidak ditemukan
        else {
            $this->session->set_flashdata('error', 'Username atau password salah');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    /**
     * proses daftar peserta baru
     */
    public function signup()
    {
        $data['title']          = "Events";
        $data['subtitle']       = "Daftar akun baru";

        $this->load->view('layout/header', $data);
        $this->load->view('mhs/vSignup', $data);
        $this->load->view('layout/footer', $data);
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

        $this->load->view('layout/header', $data);
        $this->load->view('mhs/vSignupSukses', $data);
        $this->load->view('layout/footer', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
