<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Feadback extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_feadback', 'feadback');
        $this->load->helper('ho_helper');
    }


    public function index()
    {
        $data['tittle'] = "Feadback";
        $data['isi'] = "user/feadback";
        $this->load->view('layout/user/wrapper', $data, FALSE);
    }

    public function insert_feadback()
    {
        $data['id_feadback'] = generatfeedbackid();
        $data['id_user'] = $this->session->userdata('id_user');
        $data['isi_feadback'] = $this->input->post('isi_feadback');
        $data['status'] = "new";

        $this->feadback->insert_feadback($data);
        redirect("user/profile");
    }
}

/* End of file Feadback.php */
