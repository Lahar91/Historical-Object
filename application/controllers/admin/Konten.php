<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Konten extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_konten', 'konten');
    }

    public function index()
    {
        $data = array(
            'tittle' => 'Konten',
            'isi' => 'admin/konten'
        );
        $this->load->view('layout/admin/wrapper', $data, FALSE);
    }
}

/* End of file Kategori.php */
