<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_konten', 'konten');
        $this->load->model('M_kategori', 'kategori');
        $this->load->model('M_kuis', 'kuis');
        $this->load->model('M_user', 'user');

        if ($this->session->userdata('level_user') != "1") {
            redirect("auth/logout");
        }
    }


    public function index()
    {
        $data = array(
            'tittle' => 'Dashboard',
            'countartikel' => $this->konten->countartikel(),
            'countkategori' => $this->kategori->countkategori(),
            'countkuis' => $this->kuis->countkuis(),
            'countuser' => $this->user->countuser(),
            'isi' => 'admin/dashboard'
        );
        $this->load->view('layout/admin/wrapper', $data, FALSE);
    }
}


/* End of file Dashboard.php */
