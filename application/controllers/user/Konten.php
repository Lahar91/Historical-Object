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
        if ($this->session->userdata('level_user') != "2") {
            redirect("auth/logout");
        }
    }

    public function view()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "com.rrd.ho") {

            $slug = $this->uri->segment(3);

            $db_konten = $this->konten->get_data($slug);
            date_default_timezone_set('Asia/Jakarta');
            $rekomendasi['id_rekomendasi'] = ganareterecid();
            $rekomendasi['id_artikel'] = $db_konten->id_artikel;
            $rekomendasi['id_viewer'] = $this->input->cookie('viewer', true);
            $rekomendasi['tanggal'] = date('Y-m-d');
            $rekomendasi['time'] = date('H:i:s');
            $this->konten->add_rekomendasi($rekomendasi);

            $data = array(
                'db_konten' => $this->konten->get_data($slug),
                'db_kategori' => $this->user->kategori(),
                'isi' => 'android_user/view',
            );
            $this->load->view('layout/android_user/wrapper', $data, FALSE);
        } else {
            $slug = $this->uri->segment(3);

            $db_konten = $this->konten->get_data($slug);
            date_default_timezone_set('Asia/Jakarta');
            $rekomendasi['id_rekomendasi'] = ganareterecid();
            $rekomendasi['id_artikel'] = $db_konten->id_artikel;
            $rekomendasi['id_viewer'] = $this->input->cookie('viewer', true);
            $rekomendasi['tanggal'] = date('Y-m-d');
            $rekomendasi['time'] = date('H:i:s');
            $this->konten->add_rekomendasi($rekomendasi);

            $data = array(
                'db_konten' => $this->konten->get_data($slug),
                'db_kategori' => $this->user->kategori(),
                'isi' => 'user/view',
            );
            $this->load->view('layout/user/wrapper', $data, FALSE);
        }
    }

    public function Cari()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "com.rrd.ho") {

            $cari = $this->input->post('keyboard');
            if (!$this->input->post('keyboard') == '') {
                $data['tittle'] = 'Hasil Pencarian';
                $data['cari'] = $this->user->cari($cari);
                $data['db_kategori'] = $this->user->kategori();
                $data['isi'] = 'android_user/cari';
                $this->load->view('layout/android_user/wrapper', $data, FALSE);
            } else {
                redirect(base_url('user/home'));
            }
        } else {
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
