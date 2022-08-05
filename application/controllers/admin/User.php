<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user', 'user');
        if ($this->session->userdata('level_user') != "1") {
            redirect("auth/logout");
        }
    }


    public function index()
    {
        $data = array(
            'tittle' => 'user',
            'isi' => 'admin/user',
            'db_user' => $this->user->read_profile(),
        );
        $this->load->view('layout/admin/wrapper', $data, FALSE);
    }


}

/* End of file User.php */

?>