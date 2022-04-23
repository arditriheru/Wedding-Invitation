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
        $data['title']          = "eQUIVA";
        $data['subtitle']       = "Sistem Ekuivalensi Prestasi";

        // hapus session sebelumnya
        $this->session->sess_destroy();

        $this->load->view('templates/header', $data);
        $this->load->view('vLogin', $data);
        $this->load->view('templates/footer', $data);
    }

    public function loginAksi()
    {
        // post token
        $token = $this->curl->getToken();

        // jika mendapatkan token access
        if ($token !== FALSE) {

            // set token access
            $this->session->set_userdata('ekuiva_token', $token['access']);

            // login super admin
            if ($this->input->post('username') == 'ekuiva' && md5($this->input->post('password')) == 'e6e73595362c9bc052de4b326461c7da') {
                $userdata = array(
                    'ekuiva_bahasa'         => 'in',
                    'ekuiva_admin_login'    => '1',
                    'ekuiva_login_as'       => 'Admin',
                    'ekuiva_id_hello'       => '214102605',
                    'ekuiva_hello'          => 'Admin Ekuivalensi',
                );
                $this->session->set_userdata($userdata);
                $this->session->set_flashdata('success', 'Hai, Selamat Datang..');
                redirect('admin/userAdmin/index?menuUtama=active');
            }

            // login mahasiswa
            elseif ($this->mLogin->login(
                'ekuiv_mahasiswa',
                array(
                    'id_mahasiswa'     => $this->input->post('username'),
                    'password'  => md5($this->input->post('password')),
                )
            ) == TRUE) {

                $user = $this->mLogin->userMhs(
                    array(
                        'id_mahasiswa'     => $this->input->post('username'),
                        'password'  => md5($this->input->post('password')),
                    )
                )->row();

                $userdata = array(
                    'ekuiva_bahasa'         => 'in',
                    'ekuiva_mhs_login'      => '1',
                    'ekuiva_login_as'       => 'Mahasiswa',
                    'ekuiva_id_hello'       => $user->id_mahasiswa,
                    'ekuiva_hello'          => $user->nama_mahasiswa,
                );
                $this->mLogin->Last_login('ekuiv_mahasiswa', array('updated' => date('Y-m-d H:i:s')), array('id_mahasiswa' => $user->id_mahasiswa));
                $this->session->set_userdata($userdata);
                $this->session->set_flashdata('success', 'Hai, Selamat Datang ' . $this->session->userdata('magang_hello'));
                redirect('mhs/userMhs/index?menuUtama=active');
            }

            // jika nim belum terdaftar
            elseif ($this->mLogin->countData('ekuiv_mahasiswa', 'id_mahasiswa=' . $this->input->post('username')) == 0) {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable">
        		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        		<p>Akun belum terdaftar, silahkan buat akun Anda</p>
        		</div>');
                redirect($_SERVER['HTTP_REFERER']);
            }

            // jika login gagal
            else {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable">
        		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        		<p>NIM atau password Anda salah</p>
        		</div>');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {

            // jika gagal mendapatkan token access
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable">
        		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        		<p>Try again! Failed to access the API, make sure your internet connection is stable</p>
        		</div>');
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

        $this->load->view('templates/header', $data);
        $this->load->view('mhs/vSignup', $data);
        $this->load->view('templates/footer', $data);
    }

    public function signupAksi()
    {
        $email      = substr($this->input->post('email'), 0, 8);

        if ($this->mLogin->Is_already_register($email) != TRUE) {

            $data = array(
                'id_mahasiswa'      => $email,
                'nama_mahasiswa'    => ucwords(strtolower($this->input->post('nama_user'))),
                'password'          => md5($this->input->post('password')),
                'created_at'        => date("Y-m-d H:i:s"),
                'valid'             => 1,
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
