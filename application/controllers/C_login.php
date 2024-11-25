<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->helper('url');
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('login');
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('login', $data);
        } else {
            //validasinya sukses
            $this->cek_login();
        }
    }


    public function logout()
    {
        // Clear cache
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');

        // Unset session data
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('success', "Logged out!");
        $this->session->sess_destroy();
        redirect('login');
    }

    public function cek_login()
    {
        $username    = $this->input->post('username');
        $password    = $this->input->post('password');

        $user = $this->db->get_where('t_users', ['username' => $username])->row_array();

        if ($user != " ") {
            if ($user['password'] == $password && $user['username'] == $username) {
                $data['id_user']    = $user['id_user'];
                $data['name']       = $user['name'];
                $data['username']   = $user['username'];
                $data['password']   = $user['password'];
                $data['role_id']    = $user['role_id'];
                $data['position']   = $user['position'];
                $data['image']      = $user['image'];
                $data['ruangan']        = $user['ruangan'];
                $data['image']      = $user['image'];


                if ($data['role_id'] == 1) {
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('success', "Selamat Datang!");
                    redirect('user/halaman_utama', $data);
                } elseif ($data['role_id'] == 2) {
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('success', "Selamat Datang!");
                    redirect('admin/halaman_utama', $data);
                } elseif ($data['role_id'] == 3) {
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('success', "Selamat Datang!");
                    redirect('admin_validator/halaman_utama', $data);
                }
            } else {
                $this->session->set_flashdata('error', "Masuk Gagal! anda belum terdaftar atau username/kata sandi anda salah");
                redirect('login');
            }
        }
    }
}
