<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{

    // Model Laporan
    public function r_laporan()
    {
        $this->db->select('*');
        $this->db->from('report_artikel');
        return $this->db->get()->result();
    }

    public function w_laporan($data)
    {
        $this->db->insert('report_artikel', $data);
    }

    public function u_laporan($data)
    {
        $this->db->where('id_report', $data['id_report']);
        $this->db->update('report_artikel', $data);
    }

    public function d_laporan($data)
    {
        $this->db->delete('report_artikel', $data);
    }
}

/* End of file M_laporan.php */
