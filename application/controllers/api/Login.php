<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class Login extends RestController

{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_api', 'ho_api');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->index_post();
        }
    }


    public function index_post()
    {

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $result['login'] = array();
        $cek = $this->db->get_where('user', ['email' => $email])->row_array();


        if (password_verify($password, $cek['Password'])) {

            $index['username'] = $cek['username'];
            $index['email'] = $cek['email'];
            $level     = $cek['id_role'];

            if ($level == '2') {
                array_push($result['login'], $index);
                $this->response(
                    $result['success'] = "1",
                    $result['message'] = "success",
                    200
                );

                echo json_encode($result);
                $this->db->close();
            } else {
                array_push($result['login'], $index);
                $this->response(
                    $result['success'] = "0",
                    $result['message'] = "Admin tidak bisa login di android",
                    403
                );

                echo json_encode($result);
                $this->db->close();
            }
        } else {
            $this->response(
                $result['success'] = "0",
                $result['message'] = "Password anda salah",
                403
            );
            echo json_encode($result);
            $this->db->close();
        }
    }
}
