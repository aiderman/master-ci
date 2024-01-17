<?php
class M_pengguna extends CI_Model
{
    private $table = "pengguna";
    public function all()
    {
        $this->db->select('*');
        $this->db->order_by('id_pengguna', 'desc');
        return $this->db->get($this->table)->result();
    }
    public function datapengguna()
    {
        $this->db->select('*');
        // $this->db->join('panwascam', 'panwascam.id_panwascam=pengguna.idf_panwascam');
        $this->db->order_by('id_pengguna', 'desc');
        return $this->db->get($this->table)->result();
    }
    public function pengguna()
    {
        $this->db->select('*');
        $this->db->select('count(id_pengguna) as totalPengguna');
        return $this->db->get($this->table)->result();
    }
    public function userCek($user,$pass)
    {
        $this->db->select('*');
        $this->db->where('username', $user);
        $this->db->where('password', $pass);
        return $this->db->get($this->table)->result();
    }
    public function alamatPenggunaAll()
    {
        $this->db->select('*');

        $this->db->join('panwascam', 'panwascam.id_panwascam=pengguna.idf_panwascam');
        $this->db->join('desa', 'desa.id_desa=pengguna.idf_desa');
        // $this->db->where('pengguna.idf_skpd', null);
        $this->db->order_by('id_pengguna', 'desc');

        return $this->db->get($this->table)->result();
    }
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function delete($id)
    {
        $this->db->where('id_pengguna', $id);
        $this->db->delete('pengguna');
        return;
    }
}
