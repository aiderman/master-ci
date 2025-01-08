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
        $this->load->model('M_log_user');
        $this->load->model('M_list_perawat');
        $this->load->library('session');

        $this->load->helper(array('file', 'url', 'form'));
        $this->load->library('form_validation');

        if (!($this->session->userdata('username'))) {
            redirect('user/logbook_login');
        }
    }


    public function index()
    {

        $role_id = '1';
        $data['users'] = $this->M_user->get_only_user($role_id);
        $data['id_user']    = $this->session->userdata('id_user');
        $id['id_user']    = $this->session->userdata('id_user');
        $data['name']       = $this->session->userdata('name');
        $data['role_id']    = $this->session->userdata('role_id');
        $data['image']    = $this->session->userdata('image');
        $status['status']    = 0;

        $data['user'] = $this->db->get_where('t_users', $id)->row_array();
        $data['logbook'] = $this->M_log_user->get_where_user($id, $status);
        $data['perawat'] = $this->M_list_perawat->get_by_user_id($id['id_user']);

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();
        $this->load->view("user/logbook", $data);
    }

    public function logbook()
    {

        $role_id = '1';
        $data['users'] = $this->M_user->get_only_user($role_id);
        $data['id_user']    = $this->session->userdata('id_user');
        $id['id_user']    = $this->session->userdata('id_user');
        $data['name']       = $this->session->userdata('name');
        $data['role_id']    = $this->session->userdata('role_id');
        $data['image']    = $this->session->userdata('image');
        $status['status']    = 0;

        $data['user'] = $this->db->get_where('t_users', $id)->row_array();
        $data['logbook'] = $this->M_log_user->get_where_user($id, $status);
        $data['perawat'] = $this->M_list_perawat->get_by_user_id($id['id_user']);

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();
        $this->load->view("user/logbook", $data);
    }
    public function exportLog()
    {
        $id['id_user'] = $this->session->userdata('id_user');
        $status = '0';
        // Ambil data logbook dari model
        $data['logbook'] = $this->M_log_user->get_where_log_userId($id, $status);

        // Generate view ke dalam variabel
        $html = $this->load->view('logbook_perawat', $data, true);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();
        // Muat library dompdf jika belum diload
        $this->load->library('dompdf_gen');

        // Convert HTML menjadi PDF
        $this->dompdf->load_html($html);
        $this->dompdf->set_paper('A4', 'landscape');  // Jika ingin mengatur ukuran kertas
        $this->dompdf->render();

        // Unduh PDF dengan nama "logbook_nurse.pdf"
        $this->dompdf->stream("logbook_nurse.pdf", array("Attachment" => 0)); // Attachment 0 untuk menampilkan di browser, 1 untuk download
    }

    public function exportHistoryLog()
    {
        $id['id_user'] = $this->session->userdata('id_user');
        $status = '3';
        // Ambil data logbook dari model
        $data['logbook'] = $this->M_log_user->get_where_log_userId($id, $status);

        // Generate view ke dalam variabel
        $html = $this->load->view('logbook_perawat', $data, true);

        // Muat library dompdf jika belum diload
        $this->load->library('dompdf_gen');

        // Convert HTML menjadi PDF
        $this->dompdf->load_html($html);
        $this->dompdf->set_paper('A4', 'landscape');  // Jika ingin mengatur ukuran kertas
        $this->dompdf->render();

        // Unduh PDF dengan nama "logbook_nurse.pdf"
        $this->dompdf->stream("logbook_nurse.pdf", array("Attachment" => 0)); // Attachment 0 untuk menampilkan di browser, 1 untuk download
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
            redirect('user/profil', $data);
        } else {
            // Jika upload gagal
            $error = $this->upload->display_errors();
            // var_dump($error);
            // die();
            $this->session->set_flashdata('error', $error);
            redirect('user/profil', $data);
        }
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

        // Update data pengguna di model
        if ($this->M_user->edit($id, $data)) {
            $this->session->set_flashdata('success', "Data berhasil diperbarui!");
        } else {
            $this->session->set_flashdata('error', "Gagal memperbarui data!");
        }
        redirect('user/profil'); // Ubah sesuai halaman setelah update
    }

    public function logbook_login()
    {

        $role_id = '1';
        $data['users'] = $this->M_user->get_only_user($role_id);
        $data['id_user']    = $this->session->userdata('id_user');
        $id['id_user']    = $this->session->userdata('id_user');
        $data['name']       = $this->session->userdata('name');
        $data['role_id']    = $this->session->userdata('role_id');
        $data['image']    = $this->session->userdata('image');
        $data['user'] = $this->db->get_where('t_users', $id)->row_array();
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

                $data['role_id']    = $user['role_id'];
                $data['position']   = $user['position'];
                $data['image']      = $user['image'];
                $data['detail_menu_id'] = '';
                // $user['detail_menu_id'];
                $data['title']      = '';
                // $user['title'];
                $data['ruangan']        = '';
                // $user['url'];


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
        $data['seleksiRiwayat'] = $this->M_logbook->rekamMedisById($id_log, $id_user);

        // echo "<pre>";
        // print_r($data['seleksiRiwayat']);
        // echo "</pre>";
        // die();
        $this->load->view("user/logbook_rekam_medis", $data);
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
        redirect('user/logbookRekamMedis/' . $id_log);
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
        redirect('user/logbookRekamMedis/' . $id_log);
    }
    public function sendTableData($id_log)
    {
        // Ambil data log berdasarkan $id_log
        $mydata = $this->M_logbook->get1($id_log);

        // Cek tanggal (asumsikan field 'tanggal' ada di database)
        $currentDate = date('Y-m-d');
        $logDate = $mydata[0]->tanggal;

        // echo "<pre>";
        // print_r($logDate);
        // echo "</pre>";
        // die();

        if ($logDate < $currentDate) {
            // Jika tanggal log sudah lewat
            $this->session->set_flashdata('error', 'Tanggal log sudah kadaluarsa!');
            redirect('user/logbookRekamMedis/' . $id_log);
            return; // Tambahkan return untuk menghentikan eksekusi lebih lanjut
        }

        // Memperbarui status rekam medis dan logbook
        $this->M_logbook->UpdateStatusRekamMedis($id_log);
        $this->M_logbook->UpdateStatusLogbook($id_log);

        // Set flashdata sukses dan redirect
        $this->session->set_flashdata('success', 'Data rekam medis berhasil diperbarui!');
        redirect('user/logbookRekamMedis/' . $id_log);
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
        redirect('user/logbookRekamMedis/' . $data['id_log']);
    }

    public function getRekamMedis($id)
    {
        $data = $this->M_logbook->getRekamMedisbyid($id);
        echo json_encode($data);
    }
    public function logbook_riwayat()
    {
        $data['id_user']    = $this->session->userdata('id_user');
        $id['id_user']    = $this->session->userdata('id_user');
        $data['name']       = $this->session->userdata('name');
        $data['role_id']    = $this->session->userdata('role_id');
        $data['image']    = $this->session->userdata('image');
        $data['user'] = $this->db->get_where('t_users', $id)->row_array();
        $status =   '3';
        // Ambil data logbook dari model
        $data['logbook'] = $this->M_logbook->get_historyLogbookUser($id['id_user'], $status);

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();

        $this->load->view("user/logbook_riwayat", $data);
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
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();

        $this->M_user->edit($id, $data);
        $this->session->set_flashdata('success', "Data Berhasil Diubah!");
        redirect('user/profil');
    }

    public function profil()
    {
        $data['name']       = $this->session->userdata('name');
        $data['image']    = $this->session->userdata('image');
        $id['id_user']    = $this->session->userdata('id_user');
        $data['role_id']    = $this->session->userdata('role_id');
        $data['user'] = $this->db->get_where('t_users', $id)->row_array();
        $data['pengalaman'] = $this->db->get_where('t_pengalaman', $id)->result_array();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();
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
        $data['image']    = $this->session->userdata('image');
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
            $ids = array('id_user' =>   $id);
            $datas = array('password' =>  $data['password']);
            if ($datapas) {
                $this->M_user->edit($ids, $datas);
                $this->session->set_flashdata('add', "sukses");
                redirect('user/ganti_pass'); // Replace 'success_page' with the actual URL
            } else {
                $this->session->set_flashdata('error', "Gagal! Kata sandi lama tidak sesuai");
                redirect("user/ganti_pass");
            }
        }
        redirect("user/ganti_pass");
    }


    public function tambah_log()
    {

        // Validation succeeded, update the user data
        $data['id_user'] = $this->session->userdata('id_user');
        $data['tanggal'] = $this->input->post('tanggal');
        $data['created'] = date('Y-m-d H:i:s'); // Get current date and time in the format Y-m-d H:i:s

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();
        $this->M_logbook->tambah($data);

        // Set flash data for success
        $this->session->set_flashdata('success', "Data Berhasil Diubah!");
        redirect('user/halaman_utama');
    }


    public function update_data_log()
    {

        // Validation succeeded, update the user data

        $id_log['id_log'] = $this->input->post('idLog');
        $data['PK'] = $this->input->post('PK');
        $data['nama_kewenangan'] = $this->input->post('namaKewenangan');
        $data['no_rekam_medis'] = $this->input->post('noRekamMedis');
        $data['tindakan_keperawatan'] = $this->input->post('tindakan_keperawatan');
        $data['status'] = '1';
        $data['created'] = date('Y-m-d H:i:s'); // Get current date and time in the format Y-m-d H:i:s
        $this->M_logbook->edit($id_log, $data);
        $this->M_logbook->updateStatusRiwayat($id_log, $data);

        // Redirect to the profil route
        redirect('user/logbook');
    }
}
