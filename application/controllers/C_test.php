<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->helper('url');
        $this->load->model('M_user');
        $this->load->model('M_logbook');
        $this->load->model('M_log_user');
        $this->load->model('M_user_logbook');
        $this->load->model('M_list_perawat');
        $this->load->library('session');
        $this->load->helper(array('file', 'url', 'form'));
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['logbook'] = $this->M_logbook->rekamMedisByIdAdminIdOne();
        $this->load->view('logbook_perawat_test', $data);
    }
}
