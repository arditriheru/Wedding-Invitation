<?php

class mHome extends CI_Model
{

    /*
|--------------------------------------------------------------------------
|
| Model public
|
|--------------------------------------------------------------------------
*/

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
}
