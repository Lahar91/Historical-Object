<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class Ho extends RestController

{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_api', 'ho_api');
    }

    public function index_get()
    {
        $id_artikel = $this->get("id_artikel");

        if ($id_artikel != null || $id_artikel == '') {
            $artikel = $this->ho_api->getartikel($id_artikel);

            if ($artikel) {
                $this->response([
                    'status' => true,
                    'data' => $this->ho_api->getartikel(),
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'massage' => 'data not found'
                ], 404);
            }
        } else {
            $artikel = $this->ho_api->getartikel($id_artikel);
            if ($artikel) {
                $this->response([
                    'status' => true,
                    'data' => $this->ho_api->getartikel(),
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'massage' => 'data not found'
                ], 404);
            }
        }
    }



    public function index_kuis()
    {
        $kuis = $this->ho_api->rendkuis();
        if ($kuis) {
            $this->response($kuis, 200);
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
