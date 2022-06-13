<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kuis extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kuis', 'kuis');
        if ($this->session->userdata('level_user') != "1") {
            redirect("auth/logout");
        }
    }

    public function index()
    {
        $data = array(
            'tittle' => 'Kuis',
            'isi' => 'admin/kuis',
            'db_kuis' => $this->kuis->r_kuis(),
        );
        $this->load->view('layout/admin/wrapper', $data, FALSE);
    }

    public function add()
    {
        $data = array(
            'tittle' => 'Kuis',
            'isi' => 'admin/kuis_add',
            'db_kuis' => $this->kuis->r_kuis(),
        );
        $this->load->view('layout/admin/wrapper', $data, FALSE);
    }
    public function saveadd()
    {

        $kjawab =  $this->input->post('radio1');
        $jawab_a = $this->input->post('jawab_a');
        $jawab_b = $this->input->post('jawab_b');
        $jawab_c = $this->input->post('jawab_c');
        if ($kjawab == "a") {
            $data = array(
                'id_kuis' => 'KS-' . generateRandomString(),
                'soal_kuis' => $this->input->post('soal'),
                'jawaban_benar' => $jawab_a,
                'Pilihan_A' => $this->input->post('jawab_a'),
                'Pilihan_B' => $this->input->post('jawab_b'),
                'Pilihan_C' => $this->input->post('jawab_c'),
                'aktif' => "Y",

            );
            $this->kuis->w_kuis($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
            redirect('admin/kategori');
        }
        if ($kjawab == "b") {
            $data = array(
                'id_kuis' => 'KS-' . generateRandomString(),
                'soal_kuis' => $this->input->post('soal'),
                'jawaban_benar' => $jawab_b,
                'Pilihan_A' => $this->input->post('jawab_a'),
                'Pilihan_B' => $this->input->post('jawab_b'),
                'Pilihan_C' => $this->input->post('jawab_c'),
                'aktif' => "Y",

            );
            $this->kuis->w_kuis($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
            redirect('admin/kategori');
        }
        if ($kjawab == "c") {
            $data = array(
                'id_kuis' => 'KS-' . generateRandomString(),
                'soal_kuis' => $this->input->post('soal'),
                'jawaban_benar' => $jawab_c,
                'Pilihan_A' => $this->input->post('jawab_a'),
                'Pilihan_B' => $this->input->post('jawab_b'),
                'Pilihan_C' => $this->input->post('jawab_c'),
                'aktif' => "Y",

            );
            $this->kuis->w_kuis($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
            redirect('admin/kategori');
        }
    }

    public function edit($id_kuis)
    {
        $data = array(
            'tittle' => 'Kuis',
            'db_kuis' => $this->kuis->get_data($id_kuis),
            'isi' => 'admin/kuis_edit',
        );


        $this->load->view('layout/admin/wrapper', $data, FALSE);
    }

    public function upload_image()
    {
        if (isset($_FILES['upload']['tmp_name'])) {
            $file = $_FILES['upload']['tmp_name'];
            $file_name = $_FILES['upload']['name'];
            $file_name_array = explode(".", $file_name);
            $extension = end($file_name_array);
            $new_image_name = rand() . "." . $extension;
            $allowed_extension = array("jpg", "gif", "png", "JPG", "PNG", "GIF");
            if (in_array($extension, $allowed_extension)) {
                move_uploaded_file($file, "./assets/image/konten_img/" . $new_image_name);
                $function_number = $_GET['CKEditorFuncNum'];
                $url = base_url() . "assets/image/konten_img/" . $new_image_name;
                $message = '';
                echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction
                ($function_number, '$url', '$message');</script>";
            }
        }
    }


    public function saveedit($id_kuis)
    {

        $kjawab =  $this->input->post('radio1');
        $jawab_a = $this->input->post('jawab_a');
        $jawab_b = $this->input->post('jawab_b');
        $jawab_c = $this->input->post('jawab_c');
        if ($kjawab == "a") {
            $data = array(
                'id_kuis' => $id_kuis,
                'soal_kuis' => $this->input->post('soal'),
                'jawaban_benar' => $jawab_a,
                'Pilihan_A' => $this->input->post('jawab_a'),
                'Pilihan_B' => $this->input->post('jawab_b'),
                'Pilihan_C' => $this->input->post('jawab_c'),
                'aktif' => "Y",

            );
            $this->kuis->u_kuis($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
            redirect('admin/kuis');
        }
        if ($kjawab == "b") {
            $data = array(
                'id_kuis' => $id_kuis,
                'soal_kuis' => $this->input->post('soal'),
                'jawaban_benar' => $jawab_b,
                'Pilihan_A' => $this->input->post('jawab_a'),
                'Pilihan_B' => $this->input->post('jawab_b'),
                'Pilihan_C' => $this->input->post('jawab_c'),
                'aktif' => "Y",

            );
            $this->kuis->u_kuis($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
            redirect('admin/kuis');
        }
        if ($kjawab == "c") {
            $data = array(
                'id_kuis' => $id_kuis,
                'soal_kuis' => $this->input->post('soal'),
                'jawaban_benar' => $jawab_c,
                'Pilihan_A' => $this->input->post('jawab_a'),
                'Pilihan_B' => $this->input->post('jawab_b'),
                'Pilihan_C' => $this->input->post('jawab_c'),
                'aktif' => "Y",

            );
            $this->kuis->u_kuis($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
            redirect('admin/kategori');
        }
    }

    public function delete()
    {
        $data = array('id_kuis' => $this->input->post('id'));

        $this->kuis->d_kuis($data);
        $this->session->set_flashdata('kuisdelete', 'Data Berhasil Di Hapus !!! ');
        redirect('admin/kuis');
    }
}

/* End of file Kategori.php */
