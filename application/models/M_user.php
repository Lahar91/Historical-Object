<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{

    public  function artikel()
    {
        $this->db->select('*');
        $this->db->from('artikel');
    }

    public function add($data)
    {
        $this->db->insert('user', $data);
    }
}

/* End of file M.user.php */
