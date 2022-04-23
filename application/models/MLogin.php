<?php

class mLogin extends CI_Model
{

    /*
|--------------------------------------------------------------------------
|
| Model public
|
|--------------------------------------------------------------------------
*/

    function countData($table, $where)
    {
        $this->db->where($where);
        $query = $this->db->get($table);
        return $query->num_rows();
    }

    public function login($from, $where)
    {
        $query = $this->db->where($where)
            ->limit('1')
            ->get($from);

        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function Is_already_register($id)
    {
        $this->db->where('id_mahasiswa', $id);
        $query = $this->db->get('ekuiv_mahasiswa');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function Insert_user_data($data)
    {
        $this->db->insert('ekuiv_mahasiswa', $data);
    }

    public function Last_login($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function userMhs($where)
    {
        $this->db->select('*');
        $this->db->from('ekuiv_mahasiswa');
        $this->db->where($where);
        return $this->db->get();
    }
}
