<?php
class M_foto extends CI_Model
{
    private $table = "foto";
    public function foto()
    {
        $this->db->select('*');
        return $this->db->get($this->table)->result();
    }

    public function fotoId($data)
    {
        $this->db->select('*');
        $this->db->where('id', $data);

        return $this->db->get($this->table)->result();
    }
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
}
