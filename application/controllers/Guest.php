<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guest extends CI_Controller
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
            'isi' => 'guest/index'
        );
        $this->load->view('layout/guest/wrapper', $data, FALSE);
    }
}


/* End of file Dashboard.php */
