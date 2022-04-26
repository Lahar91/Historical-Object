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
            'tittle' => 'Dashboard',
            'isi' => 'admin/dashboard'
        );
        $this->load->view('layout/admin/wrapper', $data, FALSE);
    }
}


/* End of file Dashboard.php */
