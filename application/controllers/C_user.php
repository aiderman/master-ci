<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view("user/halaman_utama");
    }
    public function edit_profil()
    {
        $this->load->view("user/edit_profil");
    }
    public function ganti_pass()
    {
        $this->load->view("user/ganti_pass");
    }
}
