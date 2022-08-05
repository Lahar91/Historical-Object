<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Feadback extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_feadback', 'feadback');
        $this->load->helper('ho_helper');
        if(!empty($this->session->userdata('k_android'))){
            $this->session->unset_userdata('k_android');
        }
    }


    public function index()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "com.rrd.ho") {

            $data['tittle'] = "Feadback";
            $data['isi'] = "android_user/feadback";
            $this->load->view('layout/android_user/wrapper', $data, FALSE);
        } else {
            $data['tittle'] = "Feadback";
            $data['isi'] = "user/feadback";
            $this->load->view('layout/user/wrapper', $data, FALSE);
        }
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
