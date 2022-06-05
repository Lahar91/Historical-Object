<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kategori', 'kategori');
        if ($this->session->userdata('level_user') != "1") {
            redirect("auth/logout");
        }
    }

    public function index()
    {
        $data = array(
            'tittle' => 'Kategori',
            'isi' => 'admin/kategori',
            'db_kategori' => $this->kategori->r_kategori(),
        );
        $this->load->view('layout/admin/wrapper', $data, FALSE);
    }

    public function add()
    {
        $k_slug = str_replace(' ', '-', $this->input->post('nama_kategori'));

        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori'),
            'k_slug' =>  $k_slug,
        );

        $this->kategori->w_kategori($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
        redirect('admin/kategori');
    }

    public function delete($id_kategori = null)
    {
        $data = array('id_kategori' => $id_kategori);

        $this->kategori->d_kategori($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !!! ');
        redirect('admin/kategori');
    }

    public function edit($id_kategori)
    {
        $data = array(
            'id_kategori' => $id_kategori,
            'nama_kategori' => $this->input->post('nama_kategori')
        );
        $this->kategori->u_kategori($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
        redirect('admin/kategori');
    }
}

/* End of file Kategori.php */
