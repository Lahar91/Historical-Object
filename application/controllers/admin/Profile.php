<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_profile', 'profile');
    }

    public function index()
    {
        $data = array(
            'tittle' => 'Profile',
            'isi' => 'admin/profile2'
        );
        $this->load->view('layout/admin/wrapper', $data, FALSE);
    }



    public function edit()
    {
        $config['upload_path'] = './assets/image/user';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['file_name'] = time();
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
                    $this->profile->edit($data);
                    $this->session->set_flashdata('Gpassword', 'Password Berhasil di rubah');

                    $this->logout();

                    $this->load->view('layout/wrapper', $data, FALSE);
                } else {

                    $this->session->set_flashdata('Ggagal', 'Password gagal di rubah');
                    redirect('admin/profile');
                }
            } else {
                $data = array(
                    'id_user' => $this->session->userdata('id_user'),
                    'username' => $this->session->userdata('nama_users'),
                    'email' => $this->input->post('email'),
                );
                $this->profile->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
                redirect('admin/dashboard');


                $this->load->view('layout/wrapper', $data, FALSE);
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
                    $this->profile->edit($data);
                    $this->session->set_flashdata('Spassword', 'data Berhasil dirubah');
                    redirect('admin/profile');


                    $this->load->view('layout/wrapper', $data, FALSE);
                }
            } else {

                $data = array(
                    'id_user' => $this->session->userdata('id_user'),
                    'username' => $this->session->userdata('nama_users'),
                    'email' => $this->input->post('email'),
                    'img' => $upload_data['uploads']['file_name'],

                );
                $this->profile->edit($data);
                $this->session->set_flashdata('GagalPassword', 'data Gagal di rubah');
                redirect('admin/profile');


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
        $this->session->set_flashdata('pesan', 'Anda Berhasil Logout !!!!');
        redirect('Auth');
    }
}

/* End of file Kategori.php */
