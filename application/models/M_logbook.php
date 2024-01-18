<?php
class M_logbook extends CI_Model
{
    private $table = "t_logbook";
    public function all()
    {
        $this->db->select('*');
        return $this->db->get($this->table)->result();
    }

    function get($id)
    {
        $this->db->where($id);
        return $this->db->get($this->table)->row_array();
    }
    function get_where($id)
    {
        $this->db->where($id);
        return $this->db->get($this->table)->result();
    }

    function edit($id, $id_log, $data)
    {
        $this->db->where($id);
        $this->db->where($id_log);
        $this->db->update($this->table, $data);
    }
    function tambah($data)
    {
        $this->db->insert($this->table, $data);
    }
}
