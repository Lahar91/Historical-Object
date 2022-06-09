<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_feadback extends CI_Model
{


    public function insert_feadback($data)
    {
        $this->db->insert('feadback', $data);
    }

    function update_feadback($data)
    {
        $this->db->where('id_feadback', $data['id_feadback']);
        $this->db->update('feadback', $data);
    }

    public function viewlist()
    {
        $this->db->select('*');
        $this->db->from('feadback');

        return $this->db->get()->result_array();
    }

    public function viewdetail($id)
    {
        $this->db->select('*');
        $this->db->from('feadback');
        $this->db->where('feadback.id_feadback', $id['id_feadback']);

        return $this->db->get()->result_array();
    }
}

/* End of file M_feadback.php */
