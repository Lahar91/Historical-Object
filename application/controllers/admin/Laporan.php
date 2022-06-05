<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_laporan', 'laporan');
        if ($this->session->userdata('level_user') != "1") {
            redirect("auth/logout");
        }
    }

    public function index()
    {
        $data = array(
            'tittle' => 'Laporan',
            'isi' => 'admin/laporan',
            'db_laporan' => $this->laporan->r_laporan(),
        );
        $this->load->view('layout/admin/wrapper', $data, FALSE);
    }

    public function edit($id_report)
    {
        $data = array(
            'id_report' => $id_report,
            'id_artikel' => $this->input->post('id_artikel'),
            'id_user' => $this->input->post('id_user'),
            'keterangan' => $this->input->post('ketarangan'),
            'status' => $this->input->post('cek'),

        );


        $this->laporan->u_laporan($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
        redirect('admin/laporan');
    }
}

/* End of file Kategori.php */
