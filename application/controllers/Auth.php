<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

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
        if ($this->session->userdata('visitor') != null || $this->session->userdata('visitor') != "") {
            $vistor['visitor'] = $ipaddress;
            $this->session->set_userdata($vistor);
            $this->user->counteruser($counter);
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

            if (password_verify($password, $cek['Password'])) {

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

            if (password_verify($password, $cek['Password'])) {

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

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('pesan', 'Anda Berhasil Logout !!!!');
        redirect('Auth');
    }
}



/* End of file Login.php */
