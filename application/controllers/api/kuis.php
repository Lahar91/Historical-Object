<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class kuis extends RestController

{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_api', 'ho_api');
    }


    public function index_get()
    {
        $kuis = $this->ho_api->rendkuis();
        if ($kuis) {
            $this->response([
                'status' => false,
                'data' => $kuis
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'massage' => 'data not found'
            ], 404);
        }
    }

    public function kuis_post(Type $var = null)
    {
        $id = $this->get('id');
        $hasil = $this->get('hasil');

        if ($id != null || $id == 0) {
        }
    }
}
