<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{

    public  function artikel()
    {
        $this->db->select('*');
        $this->db->from('artikel');
        return $this->db->get()->result();
    }

    public function countuser()
    {
        return $this->db->get('user')->num_rows();
    }

    public  function artikeldesc()
    {
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->order_by('id_artikel', 'desc');

        return $this->db->get()->result();
    }


    public function add($data)
    {
        $this->db->insert('user', $data);
    }

    public  function kategori()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        return $this->db->get()->result();
    }


    public  function v_artikel($slug)
    {
        $this->db->from('artikel');
        $this->db->where('artikel.id_kategori', $slug['id_kategori']);
        return $this->db->get()->result();
    }

    public function cariartikel()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM artikel WHERE nama_artikel LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultset();
    }

    public function cari($keyword)
    {

        $this->db->from('artikel');
        if (!empty($keyword)) {
            $this->db->like('nama_artikel', $keyword);
        }
        return $this->db->get()->result();
    }

    public function report($data)
    {
        $this->db->insert('report_artikel', $data);
    }

    public function rendkuis()
    {
        return $query = $this->db->query('SELECT * FROM kuis  ORDER BY RAND() LIMIT 5 ');
    }

    public function insttmp_nilai($data)
    {
        $this->db->insert('tmp_nilai', $data);
    }

    public function uptmp_nilai($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('tmp_nilai', $data);
    }


    public function deltmp_nilai($data_delete)
    {
        $this->db->delete('tmp_nilai', $data_delete);
    }

    public function insertnilai($data)
    {
        $this->db->insert('hasil_kuis', $data);
    }

    public function upfinalnilai($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('hasil_kuis', $data);
    }

    public function shownilai($data)
    {
        $this->db->select('hasil_kuis.id_user, img, username, nilai');
        $this->db->from('hasil_kuis');
        $this->db->join('user', 'hasil_kuis.id_user = user.id_user', 'inner');
        $this->db->where('user.id_user', $data);

        return $this->db->get()->row();
    }

    public function shownilairank()
    {
        $this->db->select('user.id_user, img, username, nilai');
        $this->db->from('user');
        $this->db->join('hasil_kuis', 'user.id_user = hasil_kuis.id_user', 'inner');
        $this->db->order_by('nilai', 'DESC');
        $this->db->limit(3);

        return $this->db->get()->result();
    }
}

/* End of file M.user.php */
