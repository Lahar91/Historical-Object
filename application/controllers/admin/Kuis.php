<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kuis extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kuis', 'kuis');
    }

    public function index()
    {
        $data = array(
            'tittle' => 'Kuis',
            'isi' => 'admin/kuis',
            'db_kuis' => $this->kuis->r_kuis(),
        );
        $this->load->view('layout/admin/wrapper', $data, FALSE);
    }

    public function add()
    {
        $data = array(
            'tittle' => 'Kuis',
            'isi' => 'admin/add_kuis',
            'db_kuis' => $this->kuis->r_kuis(),
        );
        $this->load->view('layout/admin/wrapper', $data, FALSE);
    }
    public function _add()
    {
        $data = array(
            'soal_kuis' => $this->input->post('soal_kuis'),
            'jawaban_benar' => $this->input->post('jawaban_benar'),
            'Pilihan_A' => $this->input->post('Pilihan_A'),
            'Pilihan_B' => $this->input->post('Pilihan_B'),
            'Pilihan_C' => $this->input->post('Pilihan_C'),
            'aktif' => "Y",

        );
        $this->kuis->w_kuis($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
        redirect('admin/kategori');
    }

    public function delete($id_kuis = null)
    {
        $data = array('id_kuis' => $id_kuis);

        $this->kategori->d_kategori($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !!! ');
        redirect('admin/kuis');
    }

    public function edit($id_kuis)
    {
        $data = array(
            'id_kuis' => $id_kuis,
            'nama_kategori' => $this->input->post('nama_kategori'),
            'soal_kuis' => $this->input->post('soal_kuis'),
            'jawaban_benar' => $this->input->post('jawaban_benar'),
            'Pilihan_A' => $this->input->post('Pilihan_A'),
            'Pilihan_B' => $this->input->post('Pilihan_B'),
            'Pilihan_C' => $this->input->post('Pilihan_C'),
            'aktif' => $this->input->post('aktif'),
        );
        $this->kategori->u_kuis($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
        redirect('admin/kuis');
    }
}

/* End of file Kategori.php */
