<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user', 'user');
        $this->load->helper('ho_helper');

        if ($this->input->cookie('viewer', true) == null && $this->input->cookie('viewer', true) == "") {
            $this->_readviewer();
        }
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
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "com.rrd.ho") {

            $email    = $this->input->post('email');
            $password = $this->input->post('password');

            $cek = $this->db->get_where('user', ['email' => $email])->row_array();

            if (!empty($cek) && password_verify($password, $cek['Password'])) {

                $level     = $cek['id_role'];
                $nama_user = $cek['username'];

                $data['id_user']   = $cek['id_user'];
                $data['email']      = $cek['email'];
                $data['img']      = $cek['img'];
                $data['level_user'] = $level;
                $data['nama_users'] = $nama_user;
                $data['android'] = "true";


                $this->session->set_userdata($data);

                if ($level == '1') {
                    $this->session->set_flashdata('ilegal_login', 'Anda Berhasil Logout !!!!');
                    redirect('auth/login');
                } else {
                    redirect('user/home');
                }
            } else {
                $this->session->set_flashdata('errorlogin', 'Email atau Password salah');
                redirect('auth/login');
            }
        } else {
            $email    = $this->input->post('email');
            $password = $this->input->post('password');

            $cek = $this->db->get_where('user', ['email' => $email])->row_array();

            if (!empty($cek) && password_verify($password, $cek['Password'])) {

                $level     = $cek['id_role'];
                $nama_user = $cek['username'];

                $data['id_user']   = $cek['id_user'];
                $data['email']      = $cek['email'];
                $data['img']      = $cek['img'];
                $data['level_user'] = $level;
                $data['nama_users'] = $nama_user;

                $this->session->set_userdata($data);

                if ($level == '1') {
                    redirect('admin/dashboard');
                } else {
                    redirect('user/home');
                }
            } else {
                $this->session->set_flashdata('errorlogin', 'Email atau Password salah');
                redirect('auth/login');
            }
        }
    }

    public function _readviewer()
    {
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $chrome = '/Chrome/';
        $firefox = '/Firefox/';
        $ie = '/IE/';
        if (preg_match($chrome, $browser))
            $isi = "Chrome/Opera";

        if (preg_match($firefox, $browser))
            $isi = "Firefox";

        if (preg_match($ie, $browser))
            $isi = "IE";

        $ipaddress = $_SERVER['REMOTE_ADDR'] . "";
        $browser = $isi;
        $tanggal = date('Y-m-d');
        $kunjungan = 1;

        $counter['id_viewer'] = generatevieweruser();
        $counter['tanggal'] = $tanggal;
        $counter['ip_address'] = $ipaddress;
        $counter['counter'] = $kunjungan;
        $counter['browser'] = $browser;
        $this->user->counteruser($counter);

        $cookie = array(

            'name'   => 'viewer',
            'value'  => $counter['id_viewer'],
            'expire' => '7200',
            'secure' => TRUE

        );

        $this->input->set_cookie($cookie);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('pesan', 'Anda Berhasil Logout !!!!');
        redirect('Auth');
    }

    public function register()
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
                'id_user' => generateuserid('2'),
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



/* End of file Login.php */
