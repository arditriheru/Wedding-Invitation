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
                    'password'  => md5($this->input->post('password'))
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
        $this->load->view('home/vSignup', $data);
        $this->load->view('layout/footer', $data);
    }

    public function signupAksi()
    {
        $email      = $this->input->post('email');

        if ($this->mLogin->Is_already_register($email) != TRUE) {

            $data = array(
                'name'          => ucwords(strtolower($this->input->post('name'))),
                'email'         => $email,
                'address'       => $this->input->post('address'),
                'contact'       => $this->input->post('contact'),
                'password'      => md5($this->input->post('password')),
                'created_at'    => date("Y-m-d H:i:s"),
            );

            $this->mLogin->Insert_user_data($data);

            $this->session->set_flashdata('success', 'Berhasil mendaftar');
            redirect('login/signupSukses?id=' . $email);
        } else {
            $this->session->set_flashdata('error', 'Email sudah terdaftar');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function signupSukses()
    {
        $data = array(
            'title'     => 'UndanganKu',
            'subtitle'  => 'Berhasil',
        );

        $this->load->view('layout/header', $data);
        $this->load->view('home/vSignupSukses', $data);
        $this->load->view('layout/footer', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
