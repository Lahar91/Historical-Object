<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
    }


    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'artikel' => $this->M_user->artikel(),
            'db_kategori' => $this->M_user->kategori(),
            'isi' => 'user/index'
        );
        $this->load->view('layout/user/wrapper', $data, FALSE);
    }
}

/* End of file Home.php */
