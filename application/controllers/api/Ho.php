<?php


defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;


class Ho extends RestController

{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_api', 'ho_api');
    }

    public function index_get()
    {
        $artikel = $this->ho_api->getartikel();
        var_dump($artikel);
    }
}
