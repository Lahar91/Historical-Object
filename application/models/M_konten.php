<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_konten extends CI_Model
{


    public  function artikel()
    {
        $this->db->select('*');
        $this->db->from('artikel');
        return $this->db->get()->result();
    }

    public function w_artikel($data)
    {
        $this->db->insert('artikel', $data);
    }

    public function u_artikel($data)
    {
        $this->db->where('artikel', $data['id_artikel']);
        $this->db->update('artikel', $data);
    }

    public function d_artikel($data)
    {
        $this->db->delete('aritkel', $data);
    }
}

/* End of file M_laporan.php */
