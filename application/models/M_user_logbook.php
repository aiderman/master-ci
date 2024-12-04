<?php
class M_user_logbook extends CI_Model
{
    private $view = "v_logbook_rekam_medis";

    // Fetch all records from the view
    public function all()
    {
        $this->db->select('*');
        return $this->db->get($this->view)->result();
    }

    // Fetch a single record by log ID
    public function get_by_log_id($id_log)
    {
        $this->db->where('id_log', $id_log);
        return $this->db->get($this->view)->row_array();
    }

    // Fetch records by user ID
    public function get_by_user_id($id_user)
    {
        $this->db->where('id_user', $id_user);
        return $this->db->get($this->view)->result();
    }

    // Fetch records by date
    public function get_by_date($date)
    {
        $this->db->where('tanggal', $date);
        return $this->db->get($this->view)->result();
    }

    // Fetch records by role ID
    public function get_by_role($role_id)
    {
        $this->db->where('role_id', $role_id);
        return $this->db->get($this->view)->result();
    }

    // Fetch records by position
    public function get_by_position($position)
    {
        $this->db->where('position', $position);
        return $this->db->get($this->view)->result();
    }
    function get_where_status($status)
    {
        $this->db->where('status', $status);
        return $this->db->get($this->view)->result();
    }
}
