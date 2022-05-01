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
            'isi' => 'admin/kuis_add',
            'db_kuis' => $this->kuis->r_kuis(),
        );
        $this->load->view('layout/admin/wrapper', $data, FALSE);
    }
    public function saveadd()
    {

        $kjawab =  $this->input->post('radio1');
        $jawab_a = $this->input->post('jawab_a');
        $jawab_b = $this->input->post('jawab_b');
        $jawab_c = $this->input->post('jawab_c');
        if ($kjawab == "a") {
            $data = array(
                'soal_kuis' => $this->input->post('soal'),
                'jawaban_benar' => $jawab_a,
                'Pilihan_A' => $this->input->post('Pilihan_A'),
                'Pilihan_B' => $this->input->post('Pilihan_B'),
                'Pilihan_C' => $this->input->post('Pilihan_C'),
                'aktif' => "Y",

            );
            $this->kuis->w_kuis($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
            redirect('admin/kategori');
        }
        if ($kjawab == "b") {
            $data = array(
                'soal_kuis' => $this->input->post('soal'),
                'jawaban_benar' => $jawab_b,
                'Pilihan_A' => $this->input->post('jawab_a'),
                'Pilihan_B' => $this->input->post('jawab_b'),
                'Pilihan_C' => $this->input->post('jawab_c'),
                'aktif' => "Y",

            );
            $this->kuis->w_kuis($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
            redirect('admin/kategori');
        }
        if ($kjawab == "c") {
            $data = array(
                'soal_kuis' => $this->input->post('soal'),
                'jawaban_benar' => $jawab_c,
                'Pilihan_A' => $this->input->post('jawab_a'),
                'Pilihan_B' => $this->input->post('jawab_b'),
                'Pilihan_C' => $this->input->post('jawab_c'),
                'aktif' => "Y",

            );
            $this->kuis->w_kuis($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
            redirect('admin/kategori');
        }
    }

    public function edit($id_kuis)
    {
        $data = array(
            'tittle' => 'Kuis',
            'isi' => 'admin/kuis_edit',
            'db_kuis' => $this->kuis->get_kuis($id_kuis),
        );

        $this->load->view('layout/admin/wrapper', $data, FALSE);
    }


    public function saveedit($id_kuis)
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

    public function delete()
    {
        $data = array('id_kuis' => $this->input->post('id'));

        $this->kuis->d_kuis($data);
        $this->session->set_flashdata('kuisdelete', 'Data Berhasil Di Hapus !!! ');
        redirect('admin/kuis');
    }
}

/* End of file Kategori.php */
