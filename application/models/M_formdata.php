<?php
class M_formdata extends CI_Model
{
    private $table = "form_data";
    public function index()
    {
        $this->db->select('*');
        return $this->db->get($this->table)->result();
    }


    public function formdata_pengawas($id_pengguna)
    {
        $this->db->join('pengguna', 'pengguna.id_pengguna=form_data.id_pengguna');
        $this->db->join('panwascam', 'panwascam.id_panwascam=form_data.id_panwascam');
        $this->db->where('pengguna.id_pengguna', $id_pengguna);
        return $this->db->get($this->table)->result();
    }
    public function titikSelesai()
    {
        $this->db->where('status', 2);
        return $this->db->get($this->table)->result();
    }

    public function formdata_a()
    {

        $this->db->select('*');
        $this->db->where('form_type', 'A');
        return $this->db->get($this->table)->result();
    }
    public function detail_formdata($id)
    {

        $this->db->select('*');
        $this->db->where('id_form', $id);
        return $this->db->get($this->table)->result();
    }

    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
}
