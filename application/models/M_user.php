<?php
class M_user extends CI_Model
{
    private $table = "t_users";
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

    function get($id)
    {
        $this->db->where($id);
        return $this->db->get($this->table)->row_array();
    }
    function get_where_data($user, $pass)
    {
        $this->db->where('username', $user);
        $this->db->where('password', $pass);
        return $this->db->get($this->table)->result();
    }

    function edit($id, $data)
    {
        $this->db->where($id);
        $this->db->update($this->table, $data);
    }
}
