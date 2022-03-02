<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'isi' => 'admin/dashboard'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}


/* End of file Dashboard.php */
