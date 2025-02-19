<?php
defined('BASEPATH') or exit('No direct script access allowed');


class C_admin extends CI_Controller
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

        if (!($this->session->userdata('username'))) {
            redirect('admin/halaman_utama');
        }
    }

    // public function index()
    // {
    //     $id['id_user']    = $this->session->userdata('id_user');
    //     $data['id_user']    = $this->session->userdata('id_user');
    //     $data['name']       = $this->session->userdata('name');
    //     $data['username']   = $this->session->userdata('username');
    //     $data['password']   = $this->session->userdata('password');
    //     $data['status']     = $this->session->userdata('status');
    //     $data['role_id']    = $this->session->userdata('role_id');
    //     $data['position']   = $this->session->userdata('position');
    //     $data['image']      = $this->session->userdata('image');
    //     $data['logbook'] = $this->M_log_user->all();

    //     $role_id = '2';


    //     $data['users'] = $this->M_user->get_only_user($role_id);
    //     $id['id_user']    = $this->session->userdata('id_user');
    //     $data['user'] = $this->db->get_where('t_users', $id)->row_array();


    //     $this->load->view("admin/logbook_login", $data);
    // }

    public function index()
    {
        $data['id_user']    = $this->session->userdata('id_user');
        $data['name']       = $this->session->userdata('name');
        $data['role_id']    = $this->session->userdata('role_id');
        $status['status']    = 1;
        $data['image']    = $this->session->userdata('image');
        $data['logbook'] = $this->M_logbook->get_where_status($status);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();
        $this->load->view("admin/logbook", $data);
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
        $config['max_size'] = 2048; // Maksimal ukuran file 2MB
        $config['encrypt_name'] = TRUE; // Untuk mengacak nama file yang di-upload

        $this->load->library('upload', $config);

        // Proses upload file
        if ($this->upload->do_upload('profile_photo')) {
            // Jika upload berhasil
            $dataupload = $this->upload->data();
            $file_name = $dataupload['file_name'];


            // Update foto profil pengguna di database
            $this->M_user->update_profile_image($user_id, $file_name);

            // Set pesan sukses dan redirect ke halaman profil
            $this->session->set_flashdata('success', 'Foto profil berhasil diubah');
            redirect('admin/profil', $data);
        } else {
            // Jika upload gagal
            $error = $this->upload->display_errors();
            // var_dump($error);
            // die();
            $this->session->set_flashdata('error', $error);
            redirect('admin/profil', $data);
        }
    }

    public function exportLog()
    {
        $id['id_user'] = $this->session->userdata('id_user');
        $status = '2';
        $data['logbook'] = $this->M_logbook->rekamMedisByIdAdminIdOne();
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

    // Fungsi untuk memperbarui data pengguna
    public function updateUser()
    {
        $id['id_user'] = $this->input->post('id_user_update');
        $data['name'] = $this->input->post('name');
        $data['username'] = $this->input->post('username');
        $data['position'] = $this->input->post('position');
        $data['nrp'] = $this->input->post('nrp');
        $data['pendidikan'] = $this->input->post('pendidikan');
        $data['image']    = $this->session->userdata('image');

        // Update data pengguna di model
        if ($this->M_user->edit($id, $data)) {
            $this->session->set_flashdata('success', "Data berhasil diperbarui!");
        } else {
            $this->session->set_flashdata('error', "Gagal memperbarui data!");
        }
        redirect('admin/profil'); // Ubah sesuai halaman setelah update
    }

    // Fungsi untuk menambahkan foto pengguna
    public function uploadFoto()
    {
        $id_user = $this->input->post('id_user_photo');
        $config['upload_path'] = './uploads/'; // Ganti dengan path yang sesuai
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // Ukuran maksimal 2MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            $data = $this->upload->data();
            $data_foto['image'] = $data['file_name'];

            // Update foto di model
            if ($this->M_user->edit(array('id_user' => $id_user), $data_foto)) {
                $this->session->set_flashdata('success', "Foto berhasil diupload!");
            } else {
                $this->session->set_flashdata('error', "Gagal memperbarui foto!");
            }
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
        }
        redirect('admin/profil'); // Ubah sesuai halaman setelah upload
    }

    public function data_perawat()
    {

        $data['id_user'] = $this->session->userdata('id_user');
        $data['name'] = $this->session->userdata('name');
        $data['username'] = $this->session->userdata('username');
        $data['password'] = $this->session->userdata('password');
        $data['status'] = $this->session->userdata('status');
        $data['role_id'] = $this->session->userdata('role_id');
        $data['position'] = $this->session->userdata('position');
        $data['image'] = $this->session->userdata('image');
        $idx['role_id'] = '1';

        $data['data_perawat'] = $this->M_user->get_all_where($idx);
        $id['id_user']    = $this->session->userdata('id_user');
        $data['user'] = $this->db->get_where('t_users', $id)->row_array();
        // print_r($data);
        // echo "</pre>";
        // die();
        $this->load->view("admin/dataperawat", $data);
    }

    public function tambahUser()
    {

        $datas = [
            'name' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'position' => $this->input->post('position'),
            'nrp' => $this->input->post('NRP'),
            'ruangan' => $this->input->post('ruangan'),
            'pendidikan' => $this->input->post('pendidikan'),
            'str_berlaku' => $this->input->post('str_berlaku'),
            'str_selesai' => $this->input->post('str_selesai'),
            'role_id' => '1',
            'Pengalaman_id' => '1',
        ];

        $id_user = $this->session->userdata('id_user');
        $datapas = $this->M_user->tambah($datas);
        $data['user'] = $this->M_user->get($id_user);
        if (!$datapas) {
            $this->session->set_flashdata('error', "Gagal menambahkan data!");
        } else {
            $this->session->set_flashdata('add', "Data berhasil ditambahkan!");
        }

        // Redirect ke halaman data perawat
        redirect("admin/data_perawat", $data);
    }

    public function tambahJadwalPerawat()
    {


        $ids = $this->input->post('name');
        $container = $this->M_user->get($ids);


        $data['id_user'] = $container["id_user"];
        $data['tanggal'] = $this->input->post('tanggal');
        $data['piket'] = $this->input->post('piket');
        $data['ruangan'] = $container["ruangan"];

        $datapas = $this->M_logbook->tambah($data);
        $id['id_user']    = $this->session->userdata('id_user');
        $data['user'] = $this->db->get_where('t_users', $id)->row_array();
        // echo "<pre>";
        // print_r($datapas);
        // echo "</pre>";
        // die();

        if ($datapas == true) {
            $this->session->set_flashdata('add', "sukses");
            redirect('admin/jadwal_perawat', $data); // Replace 'success_page' with the actual URL
        } else {
            $this->session->set_flashdata('error', "gagal menyimpan data!");
            redirect("admin/jadwal_perawat", $data);
        }
        // Load view dengan data
    }

    public function jadwal_perawat()
    {
        $data['id_user']    = $this->session->userdata('id_user');
        $id['id_user']    = $this->session->userdata('id_user');
        $data['user'] = $this->db->get_where('t_users', $id)->row_array();
        $data['name']       = $this->session->userdata('name');
        $data['image']    = $this->session->userdata('image');
        $data['username']   = $this->session->userdata('username');
        $data['password']   = $this->session->userdata('password');
        $data['status']     = $this->session->userdata('status');
        $data['role_id']    = $this->session->userdata('role_id');
        $data['position']   = $this->session->userdata('position');
        $data['user_logbook'] = $this->M_logbook->all();
        $data['perawat'] = $this->M_list_perawat->all();
        $data['daftarPerawat'] = $this->M_list_perawat->listPerawat();

        // echo "<pre>";
        // print_r($data['perawat']);
        // echo "</pre>";
        // die();
        $this->load->view("admin/jadwalperawat", $data);
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
        $this->M_user->edit($id, $data);
        $this->session->set_flashdata('success', "Data Berhasil Diubah!");
        redirect('admin/profil');
    }

    public function tambah_log()
    {
        $data['image']    = $this->session->userdata('image');
        // Validation succeeded, update the user data
        $data['id_user'] = $this->input->post('idUser');
        $data['tanggal'] = $this->input->post('tanggal');
        $data['shift'] = $this->input->post('shift');
        $data['nama_ruangan'] = $this->input->post('nama_ruangan');
        $this->M_logbook->tambah($data);
        $this->session->set_flashdata('success', "Data Berhasil Ditambahkan!");
        redirect('admin/halaman_utama');
    }

    public function profil()
    {
        $data['role_id'] = $this->session->userdata('role_id');
        $data['name'] = $this->session->userdata('name');
        $data['ruamgam'] = $this->session->userdata('name');
        $data['image']    = $this->session->userdata('image');
        $id['id_user'] = $this->session->userdata('id_user');

        // Ambil data pengguna dari database
        $data['user'] = $this->db->get_where('t_users', $id)->row_array();

        // Ambil data pengalaman (jika ada)
        $data['pengalaman'] = $this->db->get_where('t_pengalaman', $id)->result_array(); // Ubah ke result_array jika ingin array

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();

        // Muat tampilan
        $this->load->view("admin/profil", $data);
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

    public function get_id_logbookAdmin($id)
    {
        $data = $this->M_logbook->get_where($id);
        echo json_encode($data);
    }

    public function ganti_pass()
    {
        $data['role_id']       = $this->session->userdata('role_id');
        $data['image']    = $this->session->userdata('image');
        $data['name']       = $this->session->userdata('name');
        $id['id_user']    = $this->session->userdata('id_user');
        $data['user'] = $this->db->get_where('t_users', $id)->row_array();

        $this->load->view("admin/ganti_pass", $data);
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
            redirect("admin/ganti_pass");
        } else {

            $id = $this->input->post('id');
            $password = $this->input->post('Password_terkini');
            $datapas = $this->M_user->check_current_password($id, $password);
            $ids = array('id_user' =>   $id);
            $datas = array('password' =>  $data['password']);

            if ($datapas) {
                $this->M_user->edit($ids, $datas);
                $this->session->set_flashdata('add', "success");
                redirect('admin/ganti_pass'); // Replace 'success_page' with the actual URL
            } else {

                $this->session->set_flashdata('error', "Gagal! Kata sandi lama tidak sesuai");
                redirect("admin/ganti_pass");
            }
        }
        redirect("admin/ganti_pass");
    }

    public function logbook_login()
    {
        $data['id_user']    = $this->session->userdata('id_user');
        $id['id_user']    = $this->session->userdata('id_user');
        $data['logbook'] = $this->M_logbook->get_where($id);
        $data['name']       = $this->session->userdata('name');
        $data['role_id']    = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('t_users', $id)->row_array();
        $data['image']    = $this->session->userdata('image');
        //  echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();
        $this->load->view('admin/logbook_login', $data);
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




                if ($data['role_id'] == 2) {
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('success', "Selamat Datang!");
                    $id['id_user']    = $this->session->userdata('id_user');
                    $data['user'] = $this->db->get_where('t_users', $id)->row_array();
                    redirect('admin/logbook', $data);
                } else {
                    $id['id_user']    = $this->session->userdata('id_user');
                    $data['user'] = $this->db->get_where('t_users', $id)->row_array();
                    $this->session->set_flashdata('error', "Masuk Gagal! anda belum terdaftar atau username/kata sandi anda salah");
                    redirect('admin/logbook_login', $data);
                }
            } else {
                $this->session->set_flashdata('error', "Masuk Gagal! anda belum terdaftar atau username/kata sandi anda salah");
                redirect('admin/logbook_login');
            }
        }
    }

    public function logbook()
    {
        $data['id_user']    = $this->session->userdata('id_user');
        $data['name']       = $this->session->userdata('name');
        $data['role_id']    = $this->session->userdata('role_id');
        $status['status']    = 1;
        $data['image']    = $this->session->userdata('image');
        $data['logbook'] = $this->M_logbook->get_where_status($status);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();
        $this->load->view("admin/logbook", $data);
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
        $data['status']    = 0;
        $id_user = $data['id_user'];
        $data['user'] = $this->db->get_where('t_users',  $data['id_user'])->row_array();
        $data['logbook'] = $this->M_log_user->get_where_user($data['id_user'], $data['status']);
        $data['seleksiRiwayat'] = $this->M_logbook->rekamMedisByIdAdmin($id_log);

        // echo "<pre>";
        // print_r($data['seleksiRiwayat']);
        // echo "</pre>";
        // die();
        $this->load->view("admin/logbook_rekam_medis", $data);
    }

    public function updateDataRekamMedis()
    {
        // Validation succeeded, update the user dat
        $datas['PK'] = $this->input->post('PK');
        $datas['id_log'] = $this->input->post('idLog');
        $datas['id_rek'] = $this->input->post('idRek');
        $datas['id_user'] = $this->input->post('idUser');
        $datas['nama_kewenangan'] = $this->input->post('namaKewenangan');
        $datas['no_rekam_medis'] = $this->input->post('noRekamMedis');
        $datas['status'] = $this->input->post('status');
        $datas['tindakan_keperawatan'] = $this->input->post('tindakan_keperawatan');

        $id_user = $datas['id_user'];
        $id_log = $datas['id_log'];
        $id_rek = $datas['id_rek'];

        $data['user'] = $this->db->get_where('t_users',  $datas['id_user'])->row_array();
        // $data['logbook'] = $this->M_log_user->get_where_user($data['id_user'], $data['status']);
        $data['seleksiRiwayat'] = $this->M_logbook->rekamMedisById($id_log, $id_user);

        $this->M_logbook->UpdateRekamMedis($id_rek, $datas);
        // echo "<pre>";
        // print_r($result);
        // echo "</pre>";
        // die();

        // Redirect to the profil route
        redirect('admin/logbookRekamMedis/' . $id_log);
    }

    public function hapusDataRekamMedis($id_rek)
    {
        $result = $this->M_logbook->findOneRekamMedis($id_rek);


        $id_log = $result['id_log'];
        $id_user = $result['id_user'];
        $id_rek = $result['id_rek'];
        $data['seleksiRiwayat'] = $this->M_logbook->rekamMedisById($id_log, $id_user);
        $deleteResult = $this->M_logbook->DeleteRekamMedis($id_rek);
        // Cek apakah penghapusan berhasil
        if ($deleteResult) {
            // Jika berhasil, beri pesan sukses
            $this->session->set_flashdata('success', 'Data rekam medis berhasil dihapus.');
        } else {
            // Jika gagal, beri pesan error
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat menghapus data.');
        }

        // Redirect ke halaman logbook rekam medis berdasarkan ID log
        redirect('admin/logbookRekamMedis/' . $id_log);
    }

    public function sendTableData($id_log)
    {
        $this->M_logbook->UpdateStatusRekamMedisAdmin($id_log);
        $this->M_logbook->UpdateStatusLogbook($id_log);
        redirect('admin/logbookRekamMedis/' . $id_log);
    }

    public function tambahRekamMedis()
    {
        // Ambil data dari form input dan set default values
        $data = [
            'id_log' => $this->input->post('idLog'),
            'id_user' => $this->input->post('idUser'),
            'PK' => $this->input->post('PK'),
            'nama_kewenangan' => $this->input->post('namaKewenangan'),
            'no_rekam_medis' => $this->input->post('noRekamMedis'),
            'tindakan_keperawatan' => $this->input->post('tindakan_keperawatan'),
            'created' => date('Y-m-d H:i:s'), // Get current date and time,
            'status' => '0' // Status awal 0
        ];

        // Panggil model untuk menambahkan rekam medis dan dapatkan hasilnya
        $result = $this->M_logbook->tambahRekamMedis($data);
        $this->session->set_flashdata($result['status'] ? 'success' : 'error', $result['message']);

        // Redirect ke halaman logbook rekam medis berdasarkan ID log
        redirect('admin/logbookRekamMedis/' . $data['id_log']);
    }

    public function getRekamMedis($id)
    {
        $data = $this->M_logbook->getRekamMedisbyid($id);
        echo json_encode($data);
    }
    public function logbook_riwayat()
    {
        $data['id_user']    = $this->session->userdata('id_user');
        $data['image']    = $this->session->userdata('image');
        $id['id_user']    = $this->session->userdata('id_user');
        $data['name']       = $this->session->userdata('name');
        $data['role_id']    = $this->session->userdata('role_id');
        $status = '3';
        $data['logbook'] = $this->M_logbook->get_historyLogbookAdmin($status);
        $data['user'] = $this->db->get_where('t_users', $id)->row_array();

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();


        $this->load->view("admin/logbook_riwayat", $data);
    }

    public function update_data_log()
    {
        $id_log['id_log'] = $this->input->post('idLog');
        $data['nilai'] = $this->input->post('nilai');
        $data['status'] = '2'; // Status untuk nilai valid

        // Update data log
        $this->M_logbook->edit($id_log, $data);
        $this->M_logbook->editrek($id_log,  $data['status']);

        // Redirect ke halaman yang diinginkan
        redirect('admin/logbook');
    }
}
