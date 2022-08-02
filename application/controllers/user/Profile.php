<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_konten', 'konten');
        $this->load->model('M_kategori', 'kategori');
        $this->load->model('M_user');
        $this->load->helper('ho_helper');

        if ($this->session->userdata('level_user') != "2") {
            redirect("auth/logout");
        }
    }

    public function index()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "com.rrd.ho") {

            $data = array(
                'tittle' => 'Profile',
                'db_kategori' => $this->M_user->kategori(),
                'isi' => 'android_user/profile2'
            );
            $this->load->view('layout/android_user/wrapper', $data, FALSE);
        } else {
            $data = array(
                'tittle' => 'Profile',
                'db_kategori' => $this->M_user->kategori(),
                'isi' => 'user/profile2'
            );
            $this->load->view('layout/user/wrapper', $data, FALSE);
        }
    }



    public function edit()
    {
        $config['upload_path'] = './assets/image/user';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['file_name'] = generateRandomString();
        $config['max_size']  = '2000';
        $this->upload->initialize($config);
        $field_name = "img";

        if (!$this->upload->do_upload($field_name)) {
            if ($this->input->post('new_password') != "" && $this->input->post('new_password') == $this->input->post('confrim_password')) {

                $get_id = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
                $get_password =  $get_id['Password'];


                if (password_verify($this->input->post('password'), $get_password)) {

                    $data = array(
                        'id_user' => $this->session->userdata('id_user'),
                        'username' => $this->session->userdata('nama_users'),
                        'email' => $this->input->post('email'),
                        'Password' => password_hash($this->input->post('new_password'), PASSWORD_DEFAULT),
                    );
                    $this->M_user->edit($data);
                    $this->session->set_flashdata('Gpassword', 'Password Berhasil di rubah');

                    $this->logout();

                    $this->load->view('layout/user/wrapper', $data, FALSE);
                } else {

                    $this->session->set_flashdata('Ggagal', 'Password gagal di rubah');
                    redirect('user/profile');
                }
            } else {
                $data = array(
                    'tittle' => 'Profile',
                    'isi' => 'user/profile2'
                );
                $this->load->view('layout/user/wrapper', $data, FALSE);
            }
        } else {

            $gambar = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
            if ($gambar['img'] != "") {
                if ($gambar['img'] != "Logo.png") {
                    unlink('./assets/image/user/' . $gambar['img']);
                }
            }

            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gb2';
            $config['source_image'] = './assets/image/user' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            if ($this->input->post('new_password') != "") {

                $get_id = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
                $get_password =  $get_id['Password'];

                if ($this->input->post('new_password') != "" && $this->input->post('new_password') == $this->input->post('confrim_password')) {

                    $data = array(
                        'id_user' => $this->session->userdata('id_user'),
                        'username' => $this->session->userdata('nama_users'),
                        'email' => $this->input->post('email'),
                        'Password' => password_hash($this->input->post('new_password'), PASSWORD_DEFAULT),
                        'img' => $upload_data['uploads']['file_name'],

                    );
                    $this->M_user->edit($data);
                    $this->session->set_flashdata('Spassword', 'data Berhasil dirubah');
                    redirect('user/profile');


                    $this->load->view('layout/wrapper', $data, FALSE);
                }
            } elseif ($this->input->post('new_password') == null || $this->input->post('new_password') == "") {

                $data = array(
                    'id_user' => $this->session->userdata('id_user'),
                    'username' => $this->session->userdata('nama_users'),
                    'email' => $this->input->post('email'),
                    'img' => $upload_data['uploads']['file_name'],

                );
                $this->M_user->edit($data);
                $this->session->set_flashdata('s_img', 'data Gagal di rubah');
                redirect('user/profile');


                $this->load->view('layout/wrapper', $data, FALSE);
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('level_user');
        $this->session->unset_userdata('nama_users');
        $this->session->unset_userdata('error');
        $this->session->sess_destroy();
        $this->session->set_flashdata('pesan', 'Anda Berhasil Logout !!!!');
        redirect('Auth');
    }
}

/* End of file Kategori.php */
