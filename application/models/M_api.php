<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Api extends CI_Model
{


    public function getartikel($id_artikel = null)
    {
        if ($id_artikel === null) {
            return $this->db->get('artikel')->result_array();
        } else {
            return $this->db->get_where('artikel', ['id_artikel' => $id_artikel])->result_array();
        }
    }

    public function rendkuis()
    {
        $this->db->select('*');
        $this->db->from('kuis');
        $this->db->order_by('rand()');
        $this->db->limit(5);
        return $this->db->get()->result_array();
    }
}

/* End of file M_Api.php */
