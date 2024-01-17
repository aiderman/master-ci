<?php
class M_user_data extends CI_Model
{
    private $table = "user_data";
    public function all()
    {
        $this->db->select('*');
        return $this->db->get($this->table)->result();
    }
}
