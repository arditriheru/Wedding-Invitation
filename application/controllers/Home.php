<?php

class home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title']          = "Undanganku";
        $data['subtitle']       = "Digital Wedding Invitation";

        $this->load->view('vHome', $data);
    }
}
