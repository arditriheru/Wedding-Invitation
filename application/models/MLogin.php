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
        $this->db->where('email', $id);
        $query = $this->db->get('customer');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function Insert_user_data($data)
    {
        $this->db->insert('customer', $data);
    }

    public function Last_login($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function userData($from, $where)
    {
        $query = $this->db->select('*')
            ->from($from)
            ->where($where)
            ->get();
        return $query;
    }
}
