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



    public function get_artikel($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->order_by('id_artikel', 'desc');
        $this->db->limit($limit, $start);

        return $this->db->get()->result_array();
    }

    public function countartikel()
    {
        return $this->db->get('artikel')->num_rows();
    }


    public  function v_artikel($slug, $limit, $start)
    {
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->where('artikel.id_kategori', $slug['id_kategori']);
        $this->db->limit($limit, $start);

        return $this->db->get()->result_array();
    }

    public function countkategori($slug)
    {
        $this->db->from('artikel');
        $this->db->where('artikel.id_kategori', $slug['id_kategori']);
        return $this->db->get()->num_rows();
    }

    public  function artikeldesc()
    {
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->order_by('id_artikel', 'desc');

        return $this->db->get()->result();
    }




    public function get_data($slug)
    {
        $this->db->from('artikel');

        $this->db->where('artikel.artikel_slug', $slug);

        return $this->db->get()->row();
    }


    public function w_artikel($data)
    {
        $this->db->insert('artikel', $data);
    }

    public function u_artikel($data)
    {
        $this->db->where('id_artikel', $data['id_artikel']);
        return $this->db->update('artikel', $data);
    }

    public function d_artikel($data)
    {
        $this->db->delete('artikel', $data);
    }
}

/* End of file M_laporan.php */
