<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user', 'user');
        $this->load->model('M_konten', 'konten');
        $this->load->library('pagination');
    }

    public function view()
    {
        $slug = $this->uri->segment(3);
        $get_id = $this->db->get_where('kategori', ['k_slug' => $slug])->row_array();


        $config['base_url'] = site_url('guest/kategori/' . $slug . '/');
        $config['total_rows'] = $this->konten->countkategori($get_id);
        $config['per_page'] = 3;
        $config['uri_segment'] = 4;

        $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '<ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = ' <li class="page-item">';
        $config['first_tag_close'] = ' </li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = ' <li class="page-item">';
        $config['last_tag_close'] = ' </li>';


        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = ' <li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = ' <li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = ' <li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = ' <li class="page-item ">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');
        $this->pagination->initialize($config);



        $data['tittle'] = 'Dashboard';
        $data['start'] = $this->uri->segment(4);
        $data['db_kategori'] = $this->user->kategori();
        $data['db_konten'] = $this->konten->v_artikel($get_id, $config['per_page'], $data['start']);
        $data['isi'] = 'user/kategori';

        $this->load->view('layout/user/wrapper', $data, FALSE);
    }
}

/* End of file Kategori.php */
