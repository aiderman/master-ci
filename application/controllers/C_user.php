<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->helper('url');
        $this->load->model('M_user_data');


        $this->load->helper(array('file', 'url', 'form'));
        $this->load->library('form_validation');

        if (!($this->session->userdata('username'))) {
            redirect('user/halaman_utama');
        }
    }

    public function index()
    {
        $data['id_user']    = $this->session->userdata('id_user');
        $data['name']       = $this->session->userdata('name');
        $data['email']      = $this->session->userdata('email');
        $data['username']   = $this->session->userdata('username');
        $data['password']   = $this->session->userdata('password');
        $data['status']     = $this->session->userdata('status');
        $data['role_id']    = $this->session->userdata('role_id');
        $data['position']   = $this->session->userdata('position');
        $data['image']      = $this->session->userdata('image');
        $data['role']       = $this->session->userdata('role');
        $data['id_menu']    = $this->session->userdata('id_menu');
        $data['menu']       = $this->session->userdata('menu');
        $data['detail_menu_id'] = $this->session->userdata('detail_menu_id');
        $data['id_menu_d']  = $this->session->userdata('id_menu_d');
        $data['menu_id']    = $this->session->userdata('menu_id');
        $data['title']      = $this->session->userdata('title');
        $data['url']        = $this->session->userdata('url');
        $data['icon']       = $this->session->userdata('icon');

        $this->load->view("user/halaman_utama", $data);
    }
    public function edit_profil()
    {
        $data['name']       = $this->session->userdata('name');
        $id['id_user']    = $this->session->userdata('id_user');
        $data['user'] = $this->db->get_where('t_users', $id)->row_array();
        $data['pengalaman'] = $this->db->get_where('t_pengalaman', $id)->result_array();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();
        $this->load->view("user/edit_profil", $data);
    }
    public function ganti_pass()
    {
        $this->load->view("user/ganti_pass");
    }
}
