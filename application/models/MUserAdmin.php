<?php

class mUserAdmin extends CI_Model
{

    /*
|--------------------------------------------------------------------------
|
| Model public
|
|--------------------------------------------------------------------------
*/

    public function switchLang($lang)
    {
        if ($lang == 'en') {
            $this->db->select('id_multi_bahasa, english AS translate');
        } else {
            $this->db->select('id_multi_bahasa, indonesia AS translate');
        }

        $this->db->from('multi_bahasa');
        return $this->db->get();
    }

    public function getData($table)
    {
        return $this->db->get($table);
    }

    public function insertData($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function insert_batch($table, $data)
    {
        $this->db->insert_batch($table, $data);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function updateData($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function update_batch($table, $data, $where)
    {
        $this->db->update_batch($table, $data, $where);
    }

    public function deleteData($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function selectData($table, $column, $where, $orderby)
    {
        $this->db->select($column);
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by($orderby);
        return $this->db->get();
    }

    function getMax($table, $column, $where)
    {
        $this->db->select_max($column);
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get()->row();
    }

    function countData($table, $where)
    {
        $this->db->where($where);
        $query = $this->db->get($table);
        return $query->num_rows();
    }

    function detailPesan($where)
    {
        $query = $this->db->select('*')
            ->from('pesan')
            ->join('customer', 'pesan.id_customer = customer.id_customer')
            ->join('template', 'pesan.id_template = template.id_template')
            ->where($where)
            ->order_by('valid', 'ASC')
            ->order_by('id_pesan', 'ASC')
            ->get();
        return $query;
    }

    function listKontak($where)
    {
        $query = $this->db->select('*, invitation_contact.name AS name_contact, invitation_contact.contact AS contact_number')
            ->from('invitation_contact')
            ->join('pesan', 'invitation_contact.id_pesan = pesan.id_pesan')
            ->join('customer', 'pesan.id_customer = customer.id_customer')
            ->where($where)
            ->get();
        return $query;
    }
}
