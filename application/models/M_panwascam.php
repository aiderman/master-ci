<?php
class M_panwascam extends CI_Model
{
    private $table = "panwascam";
    public function panwascam()
    {
        $this->db->select('*');
        return $this->db->get($this->table)->result();
    }
    public function panwascamOnly()
    {
        $this->db->select('*');
        // $this->db->join('pengguna', 'pengguna.idf_panwascam=panwascam.id_panwascam');
        return $this->db->get($this->table)->result();
    }
    public function totalpanwascam()
    {
        $this->db->select('*');
        $this->db->select('count(id_panwascam) as totalpanwascam');
        return $this->db->get($this->table)->result();
    }

    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function delete($id, $data)
    {
        $this->db->where('id_panwascam', $id);
        $this->db->update($this->table, $data);
        return;
    }
    function get_idpanwascam($id)
    {
        $this->db->where('id_panwascam', $id);
        return $this->db->get($this->table)->row_array();
    }
    function update($id, $data)
    {
        $this->db->where($id);
        $this->db->update($this->table, $data);
    }
}
