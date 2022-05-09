<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guest extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->model('M_konten', 'konten');
        $this->load->model('M_kategori', 'kategori');
        $this->load->model('M_user', 'user');
    }


    public function index()
    {

        $data = array(
            'title' => 'Dashboard',
            'artikel' => $this->M_user->artikel(),
            'db_kategori' => $this->M_user->kategori(),
            'isi' => 'guest/index'
        );
        $this->load->view('layout/guest/wrapper', $data, FALSE);
    }

    public function view()
    {
        $slug = $this->uri->segment(3);
        $data = array(
            'db_konten' => $this->konten->get_data($slug),
            'db_kategori' => $this->user->kategori(),
            'isi' => 'guest/view',
        );
        $this->load->view('layout/guest/wrapper', $data, FALSE);
    }

    public function kategori()
    {
        $slug = $this->uri->segment(3);
        $get_id = $this->db->get_where('kategori', ['k_slug' => $slug])->row_array();

        $data = array(
            'tittle' => 'Dashboard',
            'db_kategori' => $this->M_user->kategori(),
            'db_konten' => $this->M_user->v_artikel($get_id),
            'isi' => 'guest/kategori',
        );
        $this->load->view('layout/guest/wrapper', $data, FALSE);
    }
    public function Cari()
    {
        $cari = $this->input->post('keyboard');
        if (!$this->input->post('keyboard') == '') {
            $data['tittle'] = 'Hasil Pencarian';
            $data['cari'] = $this->M_user->cari($cari);
            $data['isi'] = 'guest/cari';
            $this->load->view('layout/guest/wrapper', $data, FALSE);
        } else {
            redirect(base_url('guest/home'));
        }
    }
}


/* End of file Dashboard.php */
