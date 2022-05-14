<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Konten extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_konten', 'konten');
        $this->load->model('M_kategori', 'kategori');
        $this->load->model('M_user', 'user');
    }

    public function view()
    {
        $slug = $this->uri->segment(3);
        $data = array(
            'db_konten' => $this->konten->get_data($slug),
            'db_kategori' => $this->user->kategori(),
            'isi' => 'user/view',
        );
        $this->load->view('layout/user/wrapper', $data, FALSE);
    }

    public function Cari()
    {
        $cari = $this->input->post('keyboard');
        if (!$this->input->post('keyboard') == '') {
            $data['tittle'] = 'Hasil Pencarian';
            $data['cari'] = $this->user->cari($cari);
            $data['db_kategori'] = $this->user->kategori();
            $data['isi'] = 'user/cari';
            $this->load->view('layout/user/wrapper', $data, FALSE);
        } else {
            redirect(base_url('user/home'));
        }
    }

    public function report($id_artikel)
    {
        if ($this->input->post('radio1') != "lain") {
            $data = array(
                'id_artikel' => $id_artikel,
                'id_user' => $this->session->userdata('id_user'),
                'keterangan' => $this->input->post('radio1'),
                'status' => "proses",
            );


            $this->user->report($data);
            $this->session->set_flashdata('s_report', 'Report berhasil di kirim');
            redirect('user/home');
        } else {
            $data = array(
                'id_artikel' => $id_artikel,
                'id_user' => $this->session->userdata('id_user'),
                'keterangan' => $this->input->post('area1'),
                'status' => "proses",
            );


            $this->user->report($data);
            $this->session->set_flashdata('s_report', 'Report berhasil di kirim');
            redirect('user/home');
        }
    }
}

/* End of file konten.php */
