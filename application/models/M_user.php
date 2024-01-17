<?php
class M_user extends CI_Model
{
    private $table = "t_users";
    public function all()
    {
        $this->db->select('*');
        return $this->db->get($this->table)->result();
    }
}
