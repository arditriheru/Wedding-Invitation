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
}
