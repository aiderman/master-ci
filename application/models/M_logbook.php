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
    function get_where_user($id, $status)
    {
        $this->db->where($id);
        $this->db->where('status', $status);
        return $this->db->get($this->table)->result();
    }
    function get_where_join($id)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('t_logbook', 't_users.id_user = t_logbook.id_user');
        $this->db->where($this->table . '.id_user', $id);

        return $this->db->get()->result();
    }

    function get_all_where($role_id)
    {

        $this->db->from('t_logbook');
        $this->db->where('t_logbook.role_id', $role_id);
        $result = $this->db->get(); // Simpan hasil query ke variabel $result

        if ($result) {
            return $result->result(); // Ambil hasil jika query berhasil
        } else {
            return false; // Kembalikan FALSE jika query gagal
        }
    }

    function edit($id_log, $data)
    {
        $this->db->where($id_log);
        $this->db->update($this->table, $data);
    }

    function tambah($data)
    {
        return $this->db->insert($this->table, $data);
         
    }
}
