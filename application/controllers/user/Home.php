<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->model('M_konten', 'konten');

        $this->load->library('pagination');
    }


    public function index()
    {

        $config['base_url'] = base_url('user/home/');
        $config['total_rows'] = $this->konten->countartikel();
        $config['per_page'] = 8;

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


        $data['title'] = 'Dashboard';
        $data['artikel'] = $this->M_user->artikeldesc();
        $data['start'] = $this->uri->segment(3);
        $data['pagartikel'] = $this->konten->get_artikel($config['per_page'], $data['start']);
        $data['db_kategori'] = $this->M_user->kategori();
        $data['isi'] = 'user/index';

        $this->load->view('layout/user/wrapper', $data, FALSE);
    }
}

/* End of file Home.php */
