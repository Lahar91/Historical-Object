<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kuis extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
    }
    public function index()
    {
        $data = array(
            'tittle' => 'kuis',
            'db_kategori' => $this->M_user->kategori(),
            'isi' => 'user/kuis'
        );
        $this->load->view('layout/user/wrapper', $data, FALSE);
    }

    public function play()
    {
        $data = array(
            'tittle' => 'kuis',
            'db_kuis' => $this->M_user->rendkuis(),
            'isi' => 'user/play_kuis'
        );
        $this->load->view('layout/user/wrapper', $data, FALSE);
    }

    public function hasil()
    {
        $hasil =  $this->db->get_where('kuis', ['id_kuis' => $this->input->post('id_kuis')])->row_array();
        $jawab = $this->input->post('jawab');
        $jawabbener = $hasil['jawaban_benar'];

        if ($jawab ==  $jawabbener) {
            $cari = $this->db->get_where('tmp_nilai', ['id_user' => $this->session->userdata('id_user')])->row_array();

            $notif = 'jawaban anda benar, anda dapat 20 point';
            $nilai = 20;
            if ($cari == null) {
                //insert nilai ke tmp_nilai
                $data = array(
                    'id_user' => $this->session->userdata('id_user'),
                    'nilai' => $nilai,
                    'soal' => 1,
                );
                $this->M_user->insttmp_nilai($data);
            } else {


                //update nilai ke tmp_nilai
                $cari = $this->db->get_where('tmp_nilai', ['id_user' => $this->session->userdata('id_user')])->row_array();

                $soal = $cari['soal'] + 1;
                $upnilai = $cari['nilai'] + $nilai;
                $data = array(
                    'id_user' => $this->session->userdata('id_user'),
                    'nilai' => $upnilai,
                    'soal' => $soal
                );
                $this->M_user->uptmp_nilai($data);
                if ($this->input->post('form_jawab') == "form_jawab_5") {
                    $this->finsih();
                }
            }
        } else {
            $cari = $this->db->get_where('tmp_nilai', ['id_user' => $this->session->userdata('id_user')])->row_array();

            $notif = 'jawaban anda Salah, ';
            if ($cari != null) {
                //update nilai ke tmp_nilai
                $soal = $cari['soal'] + 1;

                $data = array(
                    'id_user' => $this->session->userdata('id_user'),
                    'soal' => $soal
                );
                $this->M_user->uptmp_nilai($data);
                if ($this->input->post('form_jawab') == "form_jawab_5") {
                    $this->finsih();
                }
            } else {
                //insert nilai ke tmp_nilai
                $data = array(
                    'id_user' => $this->session->userdata('id_user'),
                    'nilai' => "0",
                    'soal' => 1
                );
                $this->M_user->insttmp_nilai($data);
            }
        }
        echo $notif . '/' . 'selamat';
    }

    public function finsih()
    {

        //buat session untuk tampil nilai
        $shownilai = $this->db->get_where('tmp_nilai', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $snilai['snilai']      = $shownilai['nilai'];
        $snilai['show']        = true;
        $this->session->set_userdata($snilai);

        $finalnilai = $this->db->get_where('hasil_kuis', ['id_user' => $this->session->userdata('id_user')])->row_array();
        if ($finalnilai['id_user'] == null) {

            //update hasil_nilai
            $data = array(
                'id_user' => $this->session->userdata('id_user'),
                'nilai' => $shownilai['nilai']
            );
            $this->M_user->insertnilai($data);

            //delete data di tmp_nilai
            $data_delete = array('id' => $shownilai['id']);
            $this->M_user->deltmp_nilai($data_delete);
        } else {
            $mxnilai = $finalnilai['nilai'] + $shownilai['nilai'];

            //insert hasil_nilai
            $data = array(
                'id_user' => $this->session->userdata('id_user'),
                'nilai' => $mxnilai
            );
            $this->M_user->upfinalnilai($data);

            //delete data di tmp_nilai
            $data_delete = array('id' => $shownilai['id']);

            $this->M_user->deltmp_nilai($data_delete);
        }
    }
}

/* End of file kuis.php */
