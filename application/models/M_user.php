<?php
class M_user extends CI_Model
{
    private $table = "t_users";

    public function update_profile_image($user_id, $file_name)
    {
        $data = array('image' => $file_name);
        $this->db->where('id_user', $user_id);
        $this->db->update('t_users', $data);
    }


    public function add_experience($data)
    {
        return $this->db->insert('t_pengalaman', $data); // Ganti 'experience' dengan nama tabel yang sesuai
    }

    public function update_user($id, $data)
    {
        $this->db->where('id_user', $id); // Ganti 'id_user' dengan nama kolom ID yang sesuai
        return $this->db->update('users', $data); // Ganti 'users' dengan nama tabel pengguna yang sesuai
    }


    public function all()
    {
        $this->db->select('*');
        return $this->db->get($this->table)->result();
    }


    public function check_current_password($id, $password)
    {
        $this->db->where('id_user', $id);
        $this->db->where('password', $password); // Assuming passwords are stored as MD5 hashes (adjust as needed)
        $query = $this->db->get($this->table);

        return $query->num_rows() > 0;
    }

    function get_jadwal_all($id)
    {
        $this->db->select('*');
        $this->db->where('role_id', $id);
        $this->db->from('v_user_logbook');
        $result = $this->db->get(); // Simpan hasil query ke variabel $result

        if ($result) {
            return $result->result(); // Ambil hasil jika query berhasil
        } else {
            return false; // Kembalikan FALSE jika query gagal
        }
    }
    function get($id)
    {
        $this->db->where($id);
        return $this->db->get($this->table)->row_array();
    }
    function get_all_where($id)
    {
        $this->db->where($id);
        return $this->db->get($this->table)->result();
    }
    function get_where_data($user, $pass)
    {
        $this->db->where('username', $user);
        $this->db->where('password', $pass);
        return $this->db->get($this->table)->result();
    }
    function get_only_user($id)
    {
        $this->db->where('role_id', $id);
        return $this->db->get($this->table)->result();
    }

    function edit($id, $data)
    {
        $this->db->where($id);
        $this->db->update($this->table, $data);
    }
    function tambah($data)
    {
        $this->db->insert($this->table, $data);
    }
}
