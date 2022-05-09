<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_kuis extends CI_Model
{

    // Model Kuis 
    public function r_kuis()
    {
        $this->db->select('*');
        $this->db->from('kuis');
        return $this->db->get()->result();
    }

    public function get_data($id_kuis)
    {
        $this->db->from('kuis');

        $this->db->where('kuis.id_kuis', $id_kuis);

        return $this->db->get()->row();
    }

    public function w_kuis($data)
    {
        $this->db->insert('kuis', $data);
    }

    public function u_kuis($data)
    {
        $this->db->where('id_kuis', $data['id_kuis']);
        return $this->db->update('kuis', $data);;
    }

    public function d_kuis($data)
    {
        $this->db->delete('kuis', $data);
    }
}

/* End of file M_laporan.php */
