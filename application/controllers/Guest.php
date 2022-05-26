<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guest extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('M_konten', 'konten');
        $this->load->model('M_kategori', 'kategori');
        $this->load->model('M_user', 'user');
    }




    public function index()
    {
        $config['base_url'] = site_url('guest/');
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
        $data['artikel'] = $this->user->artikeldesc();
        $data['start'] = $this->uri->segment(3);
        $data['pagartikel'] = $this->konten->get_artikel($config['per_page'], $data['start']);
        $data['db_kategori'] = $this->user->kategori();
        $data['isi'] = 'guest/index';


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
        $data['isi'] = 'guest/kategori';

        $this->load->view('layout/guest/wrapper', $data, FALSE);
    }
    public function Cari()
    {
        $cari = $this->input->post('keyboard');
        if (!$this->input->post('keyboard') == '') {
            $data['tittle'] = 'Hasil Pencarian';
            $data['cari'] = $this->user->cari($cari);
            $data['db_kategori'] = $this->user->kategori();
            $data['isi'] = 'guest/cari';
            $this->load->view('layout/user/wrapper', $data, FALSE);
        } else {
            redirect(base_url('user/home'));
        }
    }
}


/* End of file Dashboard.php */
