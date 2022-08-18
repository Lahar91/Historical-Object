<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kuis extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->model('M_kuis', 'kuis');
        $this->load->helper('ho_helper');

        if ($this->session->userdata('level_user') != "2") {
            redirect("auth/logout");
        }
        if(!empty($this->session->userdata('k_android'))){
            $this->session->unset_userdata('k_android');
        }
    }
    public function index()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "com.rrd.ho") {

            $data = array(
                'tittle' => 'kuis',
                'db_kategori' => $this->M_user->kategori(),
                'showrank' => $this->M_user->shownilairank(),
                'shownilai' => $this->M_user->shownilai($this->session->userdata('id_user')),
                'isi' => 'android_user/kuis'
            );
            $this->load->view('layout/android_user/wrapper', $data, FALSE);
        } else {
            $data = array(
                'tittle' => 'kuis',
                'db_kategori' => $this->M_user->kategori(),
                'showrank' => $this->M_user->shownilairank(),
                'shownilai' => $this->M_user->shownilai($this->session->userdata('id_user')),
                'isi' => 'user/kuis'
            );
            $this->load->view('layout/user/wrapper', $data, FALSE);
        }
    }

    public function play()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "com.rrd.ho") {

            $data = array(
                'tittle' => 'kuis',
                'db_kuis' => $this->M_user->rendkuis(),
                'db_kategori' => $this->M_user->kategori(),
                'isi' => 'android_user/play_kuis'
            );
            $this->load->view('layout/android_user/wrapper', $data, FALSE);
        } else {
            $data = array(
                'tittle' => 'kuis',
                'db_kuis' => $this->M_user->rendkuis(),
                'db_kategori' => $this->M_user->kategori(),
                'isi' => 'user/play_kuis'
            );
            $this->load->view('layout/user/wrapper', $data, FALSE);
        }
    }

    public function hasil()
    {

        $hasil =  $this->db->get_where('kuis', ['id_kuis' => $this->input->post('id_kuis')])->row_array();
        $jawab = $this->input->post('jawab');
        $jawabbener = $hasil['jawaban_benar'];
        if($hasil['token'] == null || $hasil['token'] == ""){
        $token['token'] = generattoken();
        $this->session->set_userdata( $token );
        
        }else if ($jawab ==  $jawabbener) {
            $cari = $this->db->get_where('tmp_nilai', ['id_user' => $this->session->userdata('id_user')])->row_array();

            $notif = 'jawaban anda benar, anda dapat 20 point';
            $nilai = 20;
            if ($cari == null) {
                //insert nilai ke tmp_nilai
                // $data = array(
                //     'id_tn' => generattmpid(),
                //     'id_user' => $this->session->userdata('id_user'),
                //     'nilai' => $nilai,
                //     'soal' => 1,
                // );
                $data['id_kj'] = generatkj();
                $data['id_user'] = $this->session->userdata('id_user');
                $data['jawaban'] = $jawab;
                $data['nilai'] = 20;
                $data['token'] = $this->session->userdata('token');
                $this->kuis->kuis_jawab($data);
                // $this->M_user->insttmp_nilai($data);
            } else {


                //update nilai ke tmp_nilai
                $cari = $this->db->get_where('tmp_nilai', ['id_user' => $this->session->userdata('id_user')])->row_array();

                $soal = $cari['soal'] + 1;
                $upnilai = $cari['nilai'] + $nilai;
                $data['id_kj'] = generatkj();
                $data['id_user'] = $this->session->userdata('id_user');
                $data['jawaban'] = $jawab;
                $data['nilai'] = 20;
                $data['token'] = $this->session->userdata('token');
                $this->kuis->kuis_jawab($data);
                // $this->M_user->uptmp_nilai($data);
                if ($this->input->post('form_jawab') == "form_jawab_5") {
                    $this->hasil_kuis();
                }
            }
        } else {
            $cari = $this->db->get_where('tmp_nilai', ['id_user' => $this->session->userdata('id_user')])->row_array();

            $notif = 'jawaban anda Salah, ';
            if ($cari != null) {
                //update nilai ke tmp_nilai
                $soal = $cari['soal'] + 1;

                $data['id_kj'] = generatkj();
                $data['id_user'] = $this->session->userdata('id_user');
                $data['jawaban'] = $jawab;
                $data['nilai'] = 0;
                $data['token'] = $this->session->userdata('token');
                $this->kuis->kuis_jawab($data);

                $this->M_user->uptmp_nilai($data);
                if ($this->input->post('form_jawab') == "form_jawab_5") {

                    $this->hasil_kuis();
                }
            } else {
                //insert nilai ke tmp_nilai
                $data['id_kj'] = generatkj();
                $data['id_user'] = $this->session->userdata('id_user');
                $data['jawaban'] = $jawab;
                $data['nilai'] = 0;
                $data['token'] = $this->session->userdata('token');
                $this->kuis->kuis_jawab($data);

                // $this->M_user->insttmp_nilai($data);
            }
        }
        echo $notif . '/' . 'selamat';
    
    }


    // public function finsih()
    // {
    //     //buat session untuk tampil nilai
    //     $shownilai = $this->db->get_where('tmp_nilai', ['id_user' => $this->session->userdata('id_user')])->row_array();
    //     $snilai['snilai']      = $shownilai['nilai'];
    //     $this->session->set_userdata($snilai);



    //     $finalnilai = $this->db->get_where('hasil_kuis', ['id_user' => $this->session->userdata('id_user')])->row_array();
    //     if ($finalnilai == null) {

    //         //insert hasil_nilai
    //         $data = array(
    //             'id_hasil' => generathasilnilaiid(),
    //             'id_user' => $this->session->userdata('id_user'),
    //             'nilai' => $this->session->userdata('snilai')
    //         );
    //         $this->M_user->insertnilai($data);

    //         //delete data di tmp_nilai
    //         $data_delete = array('id_tn' =>  $shownilai['id_tn']);
    //         $this->M_user->deltmp_nilai($data_delete);
    //         $this->hasil_kuis();
    //     } else {
    //         $mxnilai = $finalnilai['nilai'] + $this->session->userdata('snilai');

    //         //update hasil_nilai
    //         $data = array(
    //             'id_user' => $this->session->userdata('id_user'),
    //             'nilai' => $mxnilai
    //         );
    //         $this->M_user->upfinalnilai($data);

    //         //delete data di tmp_nilai
    //         $data_delete = array('id_tn' =>  $shownilai['id_tn']);
    //         $this->M_user->deltmp_nilai($data_delete);
    //         $this->hasil_kuis();
    //     }
    // }

    public function hasil_kuis()
    {
        if ($this->session->userdata('android') == "true") {

            // $dlt_tmp = $this->db->get_where('tmp_nilai', ['id_user' => $this->session->userdata('id_user')])->row_array();
            // if(!empty($dlt_tmp['soal'])){
            //     // $this->finsih();
            // }else{
            //     $data = array(
            //         'tittle' => 'kuis',
            //         'db_kategori' => $this->M_user->kategori(),
            //     );
            //     $this->load->view('android_user/hasil_kuis', $data, FALSE);
            // }

              $data = array(
                     'tittle' => 'kuis',
                     'db_kategori' => $this->M_user->kategori(),
                );
                 $this->load->view('android_user/hasil_kuis', $data, FALSE);
        } 
        else 
        {
            // $dlt_tmp = $this->db->get_where('tmp_nilai', ['id_user' => $this->session->userdata('id_user')])->row_array();
            // if(!empty($dlt_tmp['soal'])){
            //     // $this->finsih();
            // }else{
            //     $data = array(
            //         'tittle' => 'kuis',
            //         'db_kategori' => $this->M_user->kategori(),
            //     );
            //     $this->load->view('user/hasil_kuis', $data, FALSE);
            // }

                $data = array(
                     'tittle' => 'kuis',
                     'db_kategori' => $this->M_user->kategori(),
                    );
                    $this->load->view('user/hasil_kuis', $data, FALSE);
        }
            

    }
}

/* End of file kuis.php */
