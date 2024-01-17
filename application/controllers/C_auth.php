<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->helper('url');
        $this->load->Model('t_user');
    }

    public function index()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        $data = $this->t_user->userCek($user, $pass);
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('C_login');
    }
    public function c_apk()
    {
        redirect('apk/c_berita/');
    }
}
