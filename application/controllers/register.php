<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user', 'user');
        $this->load->helper('ho_helper');
    }

    public function index()
    {
        $data = array(
            'tittle' => 'Historical Object'
        );
        $this->load->view('register', $data, FALSE);
    }

    public function reg()
    {
        $this->form_validation->set_rules('email', 'email', 'required|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('R_password', 'password confirmasi', 'required');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('register', $data, FALSE);
        } else {
            $this->_register();
        }
    }

    public function _register()
    {
        $password = $this->input->post('password');
        $r_passowrd = $this->input->post('R_password');
        $dname = $this->input->post('D_name');
        $bname = $this->input->post('B_name');
        $name = $dname . ' ' . $bname;
        if ($password == $r_passowrd) {
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $data = array(
                'id_user' => generateuserid("2"),
                'username' => $name,
                'email' => $this->input->post('email'),
                'Password' => $pass,
                'img' => 'Logo.png',
                'id_role' => '2'
            );

            $this->user->add($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
            redirect('Auth');
        } else {
            redirect('register');
        }
    }
}

/* End of file register.php */
