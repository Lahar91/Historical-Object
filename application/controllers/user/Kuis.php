<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kuis extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
    }
    public function index()
    {
        $data = array(
            'tittle' => 'kuis',
            'db_kategori' => $this->M_user->kategori(),
            'isi' => 'user/kuis'
        );
        $this->load->view('layout/user/wrapper', $data, FALSE);
    }

    public function play()
    {
        $data = array(
            'tittle' => 'kuis',
            'db_kuis' => $this->M_user->rendkuis(),
            'isi' => 'user/play_kuis'
        );
        $this->load->view('layout/user/wrapper', $data, FALSE);
    }
}

/* End of file kuis.php */
