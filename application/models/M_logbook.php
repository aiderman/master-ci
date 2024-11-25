<?php
class M_logbook extends CI_Model
{
    private $table = "t_logbook";


    public function tambahRekamMedis($data)
    {
        return $this->db->insert('t_rekam_medis', $data);
    }
    public function selectRekamMedis($id)
    {
        $this->db->select('*');
        $this->db->from('t_rekam_medis');
        $this->db->where('id_log', $id);
        return $this->db->get()->result();
    }

    public function getRekamMedisbyid($id)
    {
        $this->db->select('*');
        $this->db->from('t_rekam_medis');
        $this->db->where('id_rek', $id);
        return $this->db->get()->row();
    }

    public function UpdateStatusRekamMedis($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id_log', $id);
        $this->db->update('t_rekam_medis');

        return $this->db->get_where('t_rekam_medis', ['id_log' => $id])->result();
    }
    public function UpdateRekamMedis($id, $data)
    {
        $this->db->where('id_rek', $id);
        $this->db->update('t_rekam_medis', $data);
        // Mengembalikan data yang telah diperbarui setelah update
        return $this->db->get_where('t_rekam_medis', ['id_rek' => $id])->row_array();
    }
    public function DeleteRekamMedis($id)
    {
        $this->db->where('id_rek', $id);
        $this->db->delete('t_rekam_medis');
        return $this->db->affected_rows() > 0;
    }
    public function findOneRekamMedis($id)
    {
        $this->db->select('*');
        $this->db->where('id_rek', $id);
        return $this->db->get_where('t_rekam_medis', ['id_rek' => $id])->row_array();
    }


    public function rekamMedisById($id_log, $id_user)
    {
        $this->db->select('*');
        $this->db->from('t_rekam_medis');
        $this->db->where('id_log', $id_log);
        $this->db->where('id_user', $id_user);
        $this->db->where('status', '0');
        return $this->db->get()->result();
    }


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
