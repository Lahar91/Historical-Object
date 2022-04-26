<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_kuis extends CI_Model {

      // Model Kuis 
      public function r_kuis()
      {
          $this->db->select('*');
          $this->db->from('kuis');
          return $this->db->get()->result();
      }
  
      public function w_kuis($data)
      {
          $this->db->insert('kuis', $data);
      }
  
      public function u_kuis($data)
      {
          $this->db->where('kuis', $data['id_kuis']);
          $this->$this->db->update('kuis', $data);;
      }
  
      public function d_kuis($data)
      {
          $this->db->delete('kuis', $data);
      }

}

/* End of file M_laporan.php */
