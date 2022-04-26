<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Profile extends CI_Model
{

    public function read_profile()
    {
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get()->result();
    }

    public function edit($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('user', $data);
    }
}

/* End of file M_Profile.php */
