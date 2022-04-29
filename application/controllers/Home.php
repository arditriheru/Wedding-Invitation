<?php

class home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("Mhome");
    }

    // halaman utama
    public function index()
    {
        $data['title']          = "Undanganku";
        $data['subtitle']       = "Digital Wedding Invitation";

        $data['dataTemplate']   = $this->Mhome->getData("template")->result();

        $this->load->view('home/vIndex', $data);
    }

    // halaman order
    public function order()
    {
        $data['title']          = "Form Order";
        $data['subtitle']       = "Undanganku Digital Wedding Invitation";

        $this->load->view('home/vOrder', $data);
    }

    // order proses
    public function orderAksi($template, $customer)
    {
        $config['upload_path']          = './assets/uploads/orders/';
        $config['allowed_types']        = 'jpeg|jpg|png|xls|xlsx';
        $config['overwrite']            = true;
        $config['max_size']             = 1000; // 5MB
        $config['encrypt_name']         = true;
        $this->load->library('upload', $config);

        // groom_pict
        if (!empty($_FILES['groom_pict']['name'])) {
            $this->upload->do_upload('groom_pict');
            $data = $this->upload->data();
            $groom_pict = $data['file_name'];
        }

        // bride_pict
        if (!empty($_FILES['bride_pict']['name'])) {
            $this->upload->do_upload('bride_pict');
            $data = $this->upload->data();
            $bride_pict = $data['file_name'];
        }

        // file_cp
        if (!empty($_FILES['file_cp']['name'])) {
            $this->upload->do_upload('file_cp');
            $data = $this->upload->data();
            $file_cp = $data['file_name'];
        }

        $data = array(
            'id_template'       => $template,
            'id_customer'       => $customer,
            'groom'             => $this->input->post('groom'),
            'groom_nickname'    => $this->input->post('groom_nickname'),
            'groom_father'      => $this->input->post('groom_father'),
            'groom_mother'      => $this->input->post('groom_mother'),
            'groom_pict'        => $groom_pict,
            'bride'             => $this->input->post('bride'),
            'bride_nickname'    => $this->input->post('bride_nickname'),
            'bride_father'      => $this->input->post('bride_father'),
            'bride_mother'      => $this->input->post('bride_mother'),
            'bride_pict'        => $bride_pict,
            'akad_date'         => $this->input->post('akad_date'),
            'akad_time'         => $this->input->post('akad_time'),
            'akad_place'        => $this->input->post('akad_place'),
            'akad_address'      => $this->input->post('akad_address'),
            'akad_map'          => $this->input->post('akad_map'),
            'resepsi_date'      => $this->input->post('resepsi_date'),
            'resepsi_time'      => $this->input->post('resepsi_time'),
            'resepsi_place'     => $this->input->post('resepsi_place'),
            'resepsi_address'   => $this->input->post('resepsi_address'),
            'resepsi_map'       => $this->input->post('resepsi_map'),
            'file_cp'           => $file_cp,
        );

        if (!$this->Mhome->insertData('pesan', $data)) {
            redirect('home/order?order=sukses');
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p>Gagal melakukan order, silahkan coba lagi</p>
            </div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
