<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class register extends RestController

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
        $namadepan = $this->input->post('namadepan');
        $namabelakang = $this->input->post('namabelakang');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $repassword = $this->input->post('repassword');
        if ($password == $repassword) {
            $data = array(
                'username' => $namadepan . ' '  . $namabelakang,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'img' => 'Logo.png',
                'id_role' => '2'
            );
            $query = $this->db->insert('user', $data);
            if ($query == true) {
                $this->response(
                    $res['success'] = "1",
                    $res['message'] = "success",
                    200
                );
                echo json_encode($res);
                $this->db->close();
            } else {
                $this->response(
                    $res['success'] = "0",
                    $res['message'] = "error",
                    404
                );
                echo json_encode($res);
            }
        } else {
            $this->response(
                $res['success'] = "2",
                $res['message'] = "password tidak sama",
                403
            );
            echo json_encode($res);
        }
    }
}
