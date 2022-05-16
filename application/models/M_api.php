<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Api extends CI_Model
{


    public function getartikel()
    {
        return $this->db->get('artikel')->result_array();
    }
}

/* End of file M_Api.php */
