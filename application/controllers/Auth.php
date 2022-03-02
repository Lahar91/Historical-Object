<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'tittle' => 'Historical Object'
        );
        $this->load->view('login', $data, FALSE);
    }
}



/* End of file Login.php */
