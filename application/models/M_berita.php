<?php
class M_berita extends CI_Model
{
    private $table = "berita";
    public function all()
    {
        $this->db->select('*');
        $this->db->join('pengguna', 'pengguna.id_pengguna=berita.idf_pengguna');
        return $this->db->get($this->table)->result();
    }

    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
    function delete($id)
    {
        $this->db->where('id_berita', $id);
        $this->db->delete('berita');
        return;
    }
}
