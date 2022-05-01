<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Konten extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_konten', 'konten');
        $this->load->model('M_kategori', 'kategori');
    }

    public function index()
    {
        $data = array(
            'tittle' => 'Konten',
            'db_konten' => $this->konten->artikel(),
            'isi' => 'admin/konten'
        );
        $this->load->view('layout/admin/wrapper', $data, FALSE);
    }

    public function add()
    {

        $this->form_validation->set_rules(
            'judul',
            'judul',
            'required',
            array('required' => '%s Harus Diisi !!!')
        );

        $this->form_validation->set_rules(
            'img',
            'img',
            'required',
            array('required' => '%s Harus Diisi !!!')
        );


        if ($this->form_validation->run() == FALSE) {

            $data = array(
                'tittle' => 'Editing',
                'db_kategori' => $this->kategori->r_kategori(),
                'isi' => 'admin/konten_add'
            );
            $this->load->view('layout/admin/wrapper', $data, FALSE);
        } else {
            $this->_add();
        }
    }

    public function _add()
    {

        $config['upload_path'] = './assets/image/konten_img';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['file_name'] = time();
        $config['max_size']  = '2000';
        $this->upload->initialize($config);
        $field_name = "img";

        if (!$this->upload->do_upload($field_name)) {
            $data = array(
                'tittle' => 'Editing',
                'db_kategori' => $this->kategori->r_kategori(),
                'isi' => 'admin/konten_add'
            );
            $this->load->view('layout/admin/wrapper', $data, FALSE);
        } else {

            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gb2';
            $config['source_image'] = './assets/image/konten_img' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
            $data = array(
                'img_artikel' => $upload_data['uploads']['file_name'],
                'nama_artikel' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'id_kategori' => $this->input->post('kategori'),
                'username' => $this->session->userdata('nama_users'),

            );
        }


        $this->konten->w_artikel($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
        redirect('admin/konten');
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

    public function edit($id_artikel)
    {

        $data = array(
            'tittle' => 'Editing',
            'db_konten' => $this->konten->get_data($id_artikel),
            'isi' => 'admin/konten_edit'
        );
        $this->load->view('layout/admin/wrapper', $data, FALSE);
    }

    public function saveedit($id_artikel)
    {

        $config['upload_path'] = './assets/image/konten_img';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['file_name'] = time();
        $config['max_size']  = '2000';
        $this->upload->initialize($config);
        $field_name = "img";

        if (!$this->upload->do_upload($field_name)) {
            $data = array(
                'id_artikel' => $id_artikel,
                'nama_artikel' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'id_kategori' => $this->input->post('id_kategori')
            );
            $this->kategori->u_kategori($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
            redirect('admin/kategori');
        } else {

            $gambar = $this->db->get_where('artikel', ['id_artikel' => $id_artikel])->row_array();
            if ($gambar['img_artikel'] != "") {
                unlink('./assets/image/konten_img/' . $gambar['img_artikel']);
            }
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gb2';
            $config['source_image'] = './assets/image/konten_img/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $data = array(
                'id_artikel' => $id_artikel,
                'img_artikel' => $upload_data['uploads']['file_name'],
                'nama_artikel' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'id_kategori' => $this->input->post('id_kategori')
            );
            $this->kategori->u_kategori($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
            redirect('admin/kategori');
        }
    }

    public function delete()
    {
        $gambar = $this->db->get_where('artikel', [
            'id_artikel' => $this->input->post('id')
        ])->row_array();
        if ($gambar['img_artikel'] != "") {
            unlink('./assets/image/konten_img/' . $gambar['img_artikel']);
        }
        $data = array('id_artikel' => $this->input->post('id'));

        $this->konten->d_artikel($data);
        $this->session->set_flashdata('kdelete', 'Data Berhasil Di Hapus !!! ');
        redirect('admin/konten');
    }
}

/* End of file Kategori.php */
