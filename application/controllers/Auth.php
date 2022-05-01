<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $data = array(
            'tittle' => 'Historical Object'
        );
        $this->load->view('login', $data, FALSE);
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('login', $data, FALSE);
        } else {
            $this->_login();
        }
    }

    public function _login()
    {
        $email    = $this->input->post('email');
        $password = $this->input->post('password');

        $cek = $this->db->get_where('user', ['email' => $email])->row_array();

        if (password_verify($password, $cek['Password'])) {

            $level     = $cek['id_role'];
            $nama_user = $cek['username'];

            $data['id_user']   = $cek['id_user'];
            $data['email']      = $cek['email'];
            $data['level_user'] = $level;
            $data['nama_users'] = $nama_user;

            $this->session->set_userdata($data);

            if ($level == '1') {
                redirect('admin/dashboard');
            } else {
                redirect('user/dashboard');
            }
        } else {
            $this->session->set_flashdata('error', 'Email atau Password salah');
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('level_user');
        $this->session->unset_userdata('nama_users');
        $this->session->unset_userdata('error');
        $this->session->set_flashdata('pesan', 'Anda Berhasil Logout !!!!');
        redirect('Auth');
    }
}



/* End of file Login.php */
