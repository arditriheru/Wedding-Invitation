<?php
defined('BASEPATH') or exit('No direct script access allowed');

class U extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("mUserAdmin");
        $this->load->helper(array('url', 'download'));
        $this->load->library('form_validation', 'excel');
    }

    // template master
    public function nakula($id)
    {
        $user = $this->mUserAdmin->detailPesan(['id_pesan' => $id])->row();

        $data['title']          = "UndanganKu";
        $data['template']       = "nakula";

        $d                      = $this->input->get('d');
        $data['yth']            = urldecode($d);

        $data['id_wedding']     = $id;

        $data['counter_thn']    = date('Y', strtotime($user->akad_date));
        $data['counter_bln']    = date('m', strtotime($user->akad_date));
        $data['counter_tgl']    = date('d', strtotime($user->akad_date));

        $data['mp_pict']        = $user->groom_pict;
        $data['mw_pict']        = $user->bride_pict;
        $data['mp']             = $user->groom_nickname;
        $data['mw']             = $user->bride_nickname;
        $data['mpp']            = $user->groom;
        $data['mwp']            = $user->bride;
        $data['mp_ortu']        = $user->groom_father . ' & ' . $user->groom_mother;
        $data['mw_ortu']        = $user->bride_father . ' & ' . $user->bride_mother;

        $data['hari_akad']      = formatHari($user->akad_date);
        $data['tgl_akad']       = formatDateIndo($user->akad_date);
        $data['jam_akad1']      = substr($user->akad_time, 0, -8) . ' WIB';
        $data['jam_akad2']      = substr($user->akad_time, -5) . ' WIB';
        $data['tempat_akad']    = $user->akad_place;
        $data['alamat_akad']    = $user->akad_address;
        $data['map_akad']       = $user->akad_map;

        $data['hari_resepsi']   = formatHari($user->resepsi_date);
        $data['tgl_resepsi']    = formatDateIndo($user->resepsi_date);
        $data['jam_resepsi1']   = substr($user->resepsi_time, 0, -8) . ' WIB';
        $data['jam_resepsi2']   = substr($user->resepsi_time, -5) . ' WIB';
        $data['tempat_resepsi'] = $user->resepsi_place;
        $data['alamat_resepsi'] = $user->resepsi_address;
        $data['map_resepsi']    = $user->resepsi_map;

        $where = array(
            'id_pesan' => $id,
        );

        $data['datapesan'] = $this->mUserAdmin->selectData('messages', '*', $where, 'id_messages DESC')->result();

        $this->load->view('templates/nakula/layout/vHeader', $data);
        $this->load->view('templates/nakula/vIndex', $data);
        $this->load->view('templates/nakula/layout/vFooter', $data);
    }

    // proses tambah ucapan
    public function tambahUcapanAksi($template, $id)
    {
        $data = array(
            'id_pesan'  => $id,
            'name'      => $this->input->post('name'),
            'messages'  => $this->input->post('messages'),
        );

        $this->mUserAdmin->insertData('messages', $data);

        redirect('u/' . $template . '/' . $id . '?d=' . $this->input->post('name'));
    }
}
