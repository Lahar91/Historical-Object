<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
    }

    public function view()
    {
        $slug = $this->uri->segment(3);
        $get_id = $this->db->get_where('kategori', ['k_slug' => $slug])->row_array();

        $data = array(
            'tittle' => 'Dashboard',
            'db_kategori' => $this->M_user->kategori(),
            'db_konten' => $this->M_user->v_artikel($get_id),
            'isi' => 'user/kategori',
        );
        $this->load->view('layout/user/wrapper', $data, FALSE);
    }
}

/* End of file Kategori.php */
