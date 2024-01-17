<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->helper('url');
        $this->load->Model('M_pengguna');
    }

    public function index()
    {
        $this->load->view("login");
    }
    public function loginCek()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        $data = $this->M_pengguna->userCek($user, $pass);


        if ($data == TRUE) {

            $session_data = array(
                's_id'         => $data[0]->id_pengguna,
                's_username'         => $data[0]->username,
                's_password'         => $data[0]->password,
                's_foto'            => $data[0]->foto,
                's_level'            => $data[0]->level,
            );
            // echo "<pre>";
            // echo print_r($session_data);
            // echo "<pre>";
            // die();
            $this->session->set_userdata($session_data);
            redirect('C_dash/');
        } else {
?>
            <script type='text/javascript'>
                alert('Nama Akun & Kata Sandi Anda Salah!');
                history.back('C_login');
            </script>
<?php
            $this->session->set_flashdata('fail2', "Gagal");
            redirect('C_login');
        }
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
