<?php

class Data_persyaratan extends CI_Model
{
    private $table = "persyaratan";

    function show_persyaratan()
    {
        return $this->db->get($this->table)->result_array();
    }

    function get_persyaratan($id)
    {
        $this->db->where('id_persyaratan', $id);
        return $this->db->get($this->table)->row_array();
    }

    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function edit($id, $data)
    {
        $this->db->where($id);
        $this->db->update($this->table, $data);
    }

    function delete($id)
    {
        $this->db->where($id);
        $this->db->delete($this->table);
    }
}
