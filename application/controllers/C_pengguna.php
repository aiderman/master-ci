<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->helper('url');
        $this->load->Model('M_pengguna');
        $this->load->Model('M_foto');
        $this->load->library('form_validation');
        if (!($this->session->userdata('s_username') && $this->session->userdata('s_level'))) {
            redirect('c_loginAdmin');
        }
    }

    public function index()
    {
        
        $data =  array(
            'title'     => 'BAWASLU MANADO',
            'id'         => $this->session->userdata('s_id'),
            'username'   => $this->session->userdata('s_username'),
            'level'      => $this->session->userdata('s_level'),
            'levelName'      => 'ADMIN',
            'halaman'      => 'DATA PENGGUNA'

        );
        $data['dataPengguna'] = $this->M_pengguna->datapengguna();
        
        $this->load->view('headerAdmin', $data);
        $this->load->view('navbar', $data);
        $this->load->view('leftbar', $data);
        $this->load->view('dataPengguna', $data);
        $this->load->view('footer');
    }

    public function tambahPengguna()
    {
        if (!empty($_FILES)) {
            $config['upload_path']          = './assetsAdmin/images/pengguna/';
            $config['allowed_types']        = 'jpg|jpeg|png|PNG|gif|JPG|JPEG';
            $config['image_width']            = 100;
            $config['image_height']           = 100;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('BKAD/admin/pengguna_staf', $error);
            } else {
                $data2 = array('upload_data' => $this->upload->data());
                $this->load->view('dataPengguna', $data2);

                $data['username']                     = $this->input->post('username');
                $data['email']                     = $this->input->post('email');
                $data['password']                     = $this->input->post('password');
                $data['foto']                     = $data2['upload_data']['file_name'];
                $this->M_pengguna->insert($data);
                $this->session->set_flashdata('add', "success");
                redirect('C_pengguna/');
            }
        }
    }
    public function get($id)
    {
        $data = $this->M_laporan->get($id);
        echo json_encode($data);
    }
    public function hapus($id)
    {
        $this->M_pengguna->delete($id);
        redirect('C_skpd/adminSkpd');
    }
    public function hapusPengguna($id)
    {
        $this->M_pengguna->delete($id);
        redirect('C_pengguna');
    }
}
//  