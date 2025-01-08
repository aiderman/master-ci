<?php
class M_log_user extends CI_Model
{
    private $table = "v_logbook_rekam_medis";
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
        $this->db->where($status);
        return $this->db->get('v_logbook')->result();
    }
    function get_where_log_userId($id, $status)
    {
        $this->db->where($id);
        $this->db->where('status', $status);
        return $this->db->get('v_report')->result();
    }

    function get_where_status($status)
    {

        $this->db->where($status);
        return $this->db->get('v_logbook')->result();
    }
    function get_where_statusAdmin($status)
    {
        $this->db->where($status);
        return $this->db->get('v_logbook')->result();
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
}
