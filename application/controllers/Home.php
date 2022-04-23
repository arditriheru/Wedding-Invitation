<?php

class home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("Mhome");
    }

    public function index()
    {
        $data['title']          = "Undanganku";
        $data['subtitle']       = "Digital Wedding Invitation";

        $data['dataTemplate']   = $this->Mhome->getData("template")->result();

        $this->load->view('vHome', $data);
    }
}
