<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guest extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'isi' => 'guest/index'
        );
        $this->load->view('layout/guest/wrapper', $data, FALSE);
    }
}


/* End of file Dashboard.php */
