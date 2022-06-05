<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Feadback extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        
    }
        

    public function index()
    {
        $data['tittle'] = "Feadback List";
        $data['db_feadback'] = ;
        $data['isi'] = "user/feadback";
        $this->load->view('layout/user/wrapper', $data, FALSE);
        
    }

    public function insert()
    {
        
    }

    public function FunctionName(Type $var = null)
    {
        
    }

}

/* End of file Feadback.php */

?>