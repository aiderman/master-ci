<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->helper('url');
        $this->load->model('M_user');
        $this->load->model('M_logbook');

        $this->load->helper(array('file', 'url', 'form'));
        $this->load->library('form_validation');

        if (!($this->session->userdata('username'))) {
            redirect('user/halaman_utama');
        }
    }

    public function index()
    {
        $id['id_user']    = $this->session->userdata('id_user');
        $data['id_user']    = $this->session->userdata('id_user');
        $data['name']       = $this->session->userdata('name');
        $data['username']   = $this->session->userdata('username');
        $data['password']   = $this->session->userdata('password');
        $data['role_id']    = $this->session->userdata('role_id');
        $data['position']   = $this->session->userdata('position');
        $data['image']      = $this->session->userdata('image');
        $data['detail_menu_id'] = $this->session->userdata('detail_menu_id');
        $data['title']      = $this->session->userdata('title');
        $data['url']        = $this->session->userdata('url');
        $data['icon']       = $this->session->userdata('icon');

        $data['logbook'] = $this->M_logbook->get_where($id);

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();

        $this->load->view("user/halaman_utama", $data);
    }

    public function edit()
    {

        // Validation succeeded, update the user data
        $id['id_user'] = $this->input->post('ed_id');
        $data['name'] = $this->input->post('ed_name');
        $data['username'] = $this->input->post('ed_username');
        $data['NRP'] = $this->input->post('ed_NRP');
        $data['pendidikan'] = $this->input->post('ed_pendidikan');
        $data['str_berlaku'] = $this->input->post('ed_str_berlaku');
        $data['str_selesai'] = $this->input->post('ed_str_selesai');
        $data['ruangan'] = $this->input->post('ed_ruangan');
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();
        // Call the edit method from your M_user model
        $this->M_user->edit($id, $data);

        // Set flash data for success
        $this->session->set_flashdata('success', "Data Berhasil Diubah!");

        // Redirect to the profil route
        redirect('user/profil');
    }
    public function profil()
    {
        $data['name']       = $this->session->userdata('name');
        $id['id_user']    = $this->session->userdata('id_user');
        $data['role_id']    = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('t_users', $id)->row_array();
        $data['pengalaman'] = $this->db->get_where('t_pengalaman', $id)->result_array();

        $this->load->view("user/profil", $data);
    }
    public function get($ids)
    {
        $id['id_user'] = $ids;
        $data = $this->M_user->get($id);
        echo json_encode($data);
    }
    public function get_log($ids)
    {
        $id['id_log'] = $ids;
        $data = $this->M_logbook->get($id);
        echo json_encode($data);
    }


    public function ganti_pass()
    {
        $data['name']       = $this->session->userdata('name');
        $data['role_id']    = $this->session->userdata('role_id');
        $id['id_user']    = $this->session->userdata('id_user');
        $data['user'] = $this->db->get_where('t_users', $id)->row_array();
        $this->load->view("user/ganti_pass", $data);
    }

    public function verif_ganti_pass()
    {
        $data['id'] = $this->input->post('id');
        $data['password_terkini'] = $this->input->post('Password_terkini');
        $data['password'] = $this->input->post('Password');
        $data['konfirmasi_password'] = $this->input->post('konfirmasi_Password');
        $data['role_id']    = $this->session->userdata('role_id');
        $this->form_validation->set_rules('Password_terkini', 'Password Terkini', 'required');
        $this->form_validation->set_rules('Password', 'Password', 'required');
        $this->form_validation->set_rules('konfirmasi_Password', 'Konfirmasi Password', 'required|matches[Password]');

        if ($this->form_validation->run() == FALSE) {
            redirect("user/ganti_pass");
        } else {

            $id = $this->input->post('id');
            $password = $this->input->post('Password_terkini');
            $datapas = $this->M_user->check_current_password($id, $password);
            // echo "<pre>";
            // print_r($datapas);
            // echo "</pre>";
            // die();
            if ($datapas) {
                $this->session->set_flashdata('add', "success");
                redirect('user/ganti_pass'); // Replace 'success_page' with the actual URL
            } else {

                $this->session->set_flashdata('error', "Gagal! Kata sandi lama tidak sesuai");
                redirect("user/ganti_pass");
            }
        }
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();
        redirect("user/ganti_pass");
    }
    public function logbook()
    {
        $data['id_user']    = $this->session->userdata('id_user');
        $id['id_user']    = $this->session->userdata('id_user');
        $data['name']       = $this->session->userdata('name');
        $data['role_id']    = $this->session->userdata('role_id');

        $data['logbook'] = $this->M_logbook->get_where($id);

        // echo "<pre>";
        // print_r($data['logbook']);
        // echo "</pre>";
        // die();

        $this->load->view("user/logbook", $data);
    }
    public function logbook_login()
    {
        $data['id_user']    = $this->session->userdata('id_user');
        $id['id_user']    = $this->session->userdata('id_user');
        $data['name']       = $this->session->userdata('name');
        $data['role_id']    = $this->session->userdata('role_id');

        $data['logbook'] = $this->M_logbook->get_where($id);
        $this->load->view('user/logbook_login', $data);
    }

    public function logbook_login_cek()
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
                $data['status']     = $user['status'];
                $data['role_id']    = $user['role_id'];
                $data['position']   = $user['position'];
                $data['image']      = $user['image'];
                $data['detail_menu_id'] = $user['detail_menu_id'];
                $data['id_menu_d']  = $user['id_menu_d'];
                $data['menu_id']    = $user['menu_id'];
                $data['title']      = $user['title'];
                $data['url']        = $user['url'];
                $data['icon']       = $user['icon'];
                if ($data['role_id'] == 1) {
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('success', "Selamat Datang!");
                    redirect('user/logbook', $data);
                } else {
                    $this->session->set_flashdata('error', "Masuk Gagal! anda belum terdaftar atau username/kata sandi anda salah");
                    redirect('user/logbook_login');
                }
            } else {
                $this->session->set_flashdata('error', "Masuk Gagal! anda belum terdaftar atau username/kata sandi anda salah");
                redirect('user/logbook_login');
            }
        }
    }
    public function update_data_log()
    {

        // Validation succeeded, update the user data
        $id['id_user'] = $this->input->post('idUser');
        $id_log['id_log'] = $this->input->post('idLog');
        $data['PK'] = $this->input->post('PK');
        $data['nama_kewenangan'] = $this->input->post('namaKewenangan');
        $data['no_rekam_medis'] = $this->input->post('noRekamMedis');
        $data['tindakan_keperawatan'] = $this->input->post('tindakan_keperawatan');
        $data['role_id']    = $this->session->userdata('role_id');

        // Call the edit method from your M_user model
        // echo "<pre>";
        // print_r($id);
        // print_r($id_log);
        // print_r($data);
        // echo "</pre>";
        // die();

        $this->M_logbook->edit($id, $id_log, $data);

        // Redirect to the profil route
        redirect('user/logbook');
    }
}
