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
        $data['isi'] = "admin/feadback";
        $data['db_feadback'] = $this->feadback->viewlist();
        $this->load->view('layout/admin/wrapper', $data, FALSE);
    }


    public function respon_feadback($id_feadback)
    {

        $data['id_feadback'] = $id_feadback;

        $data['status'] = $this->input->post('status');
        $this->feadback->update_feadback($data);
    }
}

/* End of file Feadback.php */
