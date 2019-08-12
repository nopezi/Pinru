<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Peraturan extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_peraturan');
        
    }
    

    public function index()
    {
        $data = $this->m_peraturan->peraturan_tampil();
        echo json_encode($data);
    }

}

/* End of file Peraturan.php */
