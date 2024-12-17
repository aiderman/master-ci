<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_admin_validator extends CI_Controller
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
        $this->load->helper(array('file', 'url', 'form'));
        $this->load->library('form_validation');
        if (!($this->session->userdata('username'))) {
            redirect('admin_validator/halaman_utama');
        }
    }

    public function index()
    {
        $id['id_user']    = $this->session->userdata('id_user');
        $data['id_user']    = $this->session->userdata('id_user');
        $data['name']       = $this->session->userdata('name');
        $data['username']   = $this->session->userdata('username');
        $data['password']   = $this->session->userdata('password');
        $data['status']     = $this->session->userdata('status');
        $data['role_id']    = $this->session->userdata('role_id');
        $data['position']   = $this->session->userdata('position');
        $data['image']      = $this->session->userdata('image');
        $data['logbook'] = $this->M_log_user->all();
        $role_id = '3';


        $data['users'] = $this->M_user->get_only_user($role_id);
        $id['id_user']    = $this->session->userdata('id_user');
        $data['user'] = $this->db->get_where('t_users', $id)->row_array();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();
        $this->load->view("admin_validator/logbook_login", $data);
    }

    public function changePhoto()
    {
        $id['id_user'] = $this->session->userdata('id_user');
        $data['id_user'] = $this->session->userdata('id_user');
        $data['name'] = $this->session->userdata('name');
        $data['username'] = $this->session->userdata('username');
        $data['password'] = $this->session->userdata('password');
        $data['status'] = $this->session->userdata('status');
        $data['role_id'] = $this->session->userdata('role_id');
        $data['position'] = $this->session->userdata('position');
        $data['image'] = $this->session->userdata('image');
        $data['logbook'] = $this->M_log_user->all();
        $role_id = '1';
        $data['users'] = $this->M_user->get_only_user($role_id);
        $user_id = $this->input->post('user_id');
        $config['upload_path'] = './uploads/profile/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('profile_photo')) {
            $dataupload = $this->upload->data();
            $file_name = $dataupload['file_name'];
            $this->M_user->update_profile_image($user_id, $file_name);
            $this->session->set_flashdata('success', 'Foto profil berhasil diubah');
            redirect('admin_validator/profil', $data);
        } else {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('admin_validator/profil', $data);
        }
    }


    public function exportLog()
    {
        $id['id_user'] = $this->session->userdata('id_user');
        $status = '2';
        $data['logbook'] = $this->M_logbook->rekamMedisByIdAdminIdOne();
        $html = $this->load->view('logbook_perawat', $data, true);
        $this->load->library('dompdf_gen');
        $this->dompdf->load_html($html);
        $this->dompdf->set_paper('A4', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("logbook_nurse.pdf", array("Attachment" => 0));
    }


    public function exportHistoryLog()
    {
        $id['id_user'] = $this->session->userdata('id_user');
        $status = '3';
        $data['logbook'] = $this->M_user_logbook->get_where_status($status);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();
        $html = $this->load->view('logbook_perawat', $data, true);
        $this->load->library('dompdf_gen');
        $this->dompdf->load_html($html);
        $this->dompdf->set_paper('A4', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("logbook_nurse.pdf", array("Attachment" => 0));
    }

    public function data_perawat()
    {
        $id['id_user']    = $this->session->userdata('id_user');
        $data['id_user']    = $this->session->userdata('id_user');
        $data['name']       = $this->session->userdata('name');
        $data['image']    = $this->session->userdata('image');
        $data['username']   = $this->session->userdata('username');
        $data['password']   = $this->session->userdata('password');
        $data['status']     = $this->session->userdata('status');
        $data['role_id']    = $this->session->userdata('role_id');
        $data['position']   = $this->session->userdata('position');
        $data['image']      = $this->session->userdata('image');
        $idx['role_id'] = '1';
        $data['data_perawat'] = $this->M_user->get_all_where($idx);
        $data['user'] = $this->db->get_where('t_users', $id)->row_array();

        $this->load->view("admin_validator/dataperawat", $data);
    }

    public function edit()
    {

        $id['id_user'] = $this->input->post('ed_id');
        $data['name'] = $this->input->post('ed_name');
        $data['username'] = $this->input->post('ed_username');
        $data['NRP'] = $this->input->post('ed_NRP');
        $data['pendidikan'] = $this->input->post('ed_pendidikan');
        $data['str_berlaku'] = $this->input->post('ed_str_berlaku');
        $data['str_selesai'] = $this->input->post('ed_str_selesai');
        $data['ruangan'] = $this->input->post('ed_ruangan');
        $data['image']    = $this->session->userdata('image');
        $this->M_user->edit($id, $data);
        $this->session->set_flashdata('success', "Data Berhasil Diubah!");

        redirect('admin_validator/profil');
    }

    public function tambah_log()
    {
        $data['id_user'] = $this->input->post('idUser');
        $data['tanggal'] = $this->input->post('tanggal');
        $data['shift'] = $this->input->post('shift');
        $data['nama_ruangan'] = $this->input->post('nama_ruangan');
        $this->M_logbook->tambah($data);
        $this->session->set_flashdata('success', "Data Berhasil Diubah!");
        redirect('admin_validator/halaman_utama');
    }

    public function profil()
    {
        $data['role_id']       = $this->session->userdata('role_id');
        $data['name']       = $this->session->userdata('name');
        $id['id_user']    = $this->session->userdata('id_user');
        $data['user'] = $this->db->get_where('t_users', $id)->row_array();
        $data['pengalaman'] = $this->db->get_where('t_pengalaman', $id)->result_array();
        $data['image']    = $this->session->userdata('image');
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();
        $this->load->view("admin_validator/profil", $data);
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
        $data = $this->M_log_user->get($id);
        echo json_encode($data);
    }

    public function ganti_pass()
    {
        $data['role_id']       = $this->session->userdata('role_id');
        $data['name']       = $this->session->userdata('name');
        $id['id_user']    = $this->session->userdata('id_user');
        $data['user'] = $this->db->get_where('t_users', $id)->row_array();
        $this->load->view("admin_validator/ganti_pass", $data);
    }

    public function verif_ganti_pass()
    {
        $data['role_id']       = $this->session->userdata('role_id');
        $data['id'] = $this->input->post('id');
        $data['password_terkini'] = $this->input->post('Password_terkini');
        $data['password'] = $this->input->post('Password');
        $data['konfirmasi_password'] = $this->input->post('konfirmasi_Password');
        $this->form_validation->set_rules('Password_terkini', 'Password Terkini', 'required');
        $this->form_validation->set_rules('Password', 'Password', 'required');
        $this->form_validation->set_rules('konfirmasi_Password', 'Konfirmasi Password', 'required|matches[Password]');

        if ($this->form_validation->run() == FALSE) {
            redirect("user/ganti_pass");
        } else {

            $id = $this->input->post('id');
            $password = $this->input->post('Password_terkini');
            $datapas = $this->M_user->check_current_password($id, $password);
            $ids = array('id_user' =>   $id);
            $datas = array('password' =>  $data['password']);
            if ($datapas) {
                $this->M_user->edit($ids, $datas);
                $this->session->set_flashdata('add', "success");
                redirect('admin_validator/ganti_pass'); // Replace 'success_page' with the actual URL
            } else {
                $this->session->set_flashdata('error', "Gagal! Kata sandi lama tidak sesuai");
                redirect("admin_validator/ganti_pass");
            }
        }
        redirect("admin_validator/ganti_pass");
    }

    public function logbook_login()
    {
        $data['id_user']    = $this->session->userdata('id_user');
        $id['id_user']    = $this->session->userdata('id_user');
        $data['name']       = $this->session->userdata('name');
        $data['role_id']    = $this->session->userdata('role_id');
        $data['image']    = $this->session->userdata('image');
        $data['logbook'] = $this->M_logbook->get_where($id);
        $this->load->view('admin_validator/logbook_login', $data);
    }

    public function logbook_login_cek()
    {
        $username    = $this->input->post('username');
        $password    = $this->input->post('password');
        $user = $this->db->get_where('t_users', ['username' => $username])->row_array();
        if ($user != " ") {
            if ($user['password'] == $password && $user['username'] == $username) {
                $data['id_user']    = $user['id_user'];
                $data['id_user']    = $user['id_user'];
                $data['name']       = $user['name'];
                $data['username']   = $user['username'];
                $data['password']   = $user['password'];

                $data['role_id']    = $user['role_id'];
                $data['position']   = $user['position'];
                $data['image']      = $user['image'];
                $data['detail_menu_id'] = $user['detail_menu_id'];
                $data['title']      = $user['title'];
                $data['url']        = $user['url'];
                if ($data['role_id'] == 3) {
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('success', "Selamat Datang!");
                    redirect('admin_validator/logbook', $data);
                } else {
                    $this->session->set_flashdata('error', "Masuk Gagal! anda belum terdaftar atau username/kata sandi anda salah");
                    redirect('admin_validator/logbook_login');
                }
            } else {
                $this->session->set_flashdata('error', "Masuk Gagal! anda belum terdaftar atau username/kata sandi anda salah");
                redirect('admin_validator/logbook_login');
            }
        }
    }

    public function logbook()
    {
        $data['id_user']    = $this->session->userdata('id_user');
        $data['name']       = $this->session->userdata('name');
        $data['role_id']    = $this->session->userdata('role_id');
        $status['status']    = 2;
        $data['image']    = $this->session->userdata('image');
        $data['logbook'] = $this->M_log_user->get_where_statusAdmin($status);
        $id['id_user']    = $this->session->userdata('id_user');
        $data['user'] = $this->db->get_where('t_users', $id)->row_array();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();

        $this->load->view("admin_validator/logbook", $data);
    }
    public function logbook_riwayat()
    {
        $data['id_user']    = $this->session->userdata('id_user');
        $id['id_user']    = $this->session->userdata('id_user');
        $data['name']       = $this->session->userdata('name');
        $data['role_id']    = $this->session->userdata('role_id');
        $data['image']    = $this->session->userdata('image');
        $data['user'] = $this->db->get_where('t_users', $id)->row_array();
        $status['status']    = "3";
        $data['logbook'] = $this->M_log_user->get_where_status($status);
        $data['user'] = $this->db->get_where('t_users', $id)->row_array();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();
        $this->load->view("admin_validator/logbook_riwayat", $data);
    }
    public function update_data_log()
    {
        $id_log['id_log'] = $this->input->post('idLog');
        $data['sifat'] = $this->input->post('nilai');
        $data['status'] = '3';
        $this->M_logbook->edit($id_log, $data);
        $this->M_logbook->editrek($id_log,  $data['status']);
        redirect('admin_validator/logbook');
    }


    public function logbookRekamMedis($id_log)
    {

        $role_id = '1';
        $data['image']    = $this->session->userdata('image');
        $data['users'] = $this->M_user->get_only_user($role_id);
        $data['id_user']    = $this->session->userdata('id_user');
        $data['id_log'] =  $id_log;
        $data['name']       = $this->session->userdata('name');
        $data['role_id']    = $this->session->userdata('role_id');
        $data['status']    = 2;
        $data['user'] = $this->db->get_where('t_users',  $data['id_user'])->row_array();
        $data['logbook'] = $this->M_log_user->get_where_user($data['id_user'], $data['status']);
        $data['seleksiRiwayat'] = $this->M_logbook->rekamMedisByIdAdminVal($id_log);

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();
        $this->load->view("admin_validator/logbook_rekam_medis", $data);
    }
}
