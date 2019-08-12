<?php

class Login extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('m_login');
    }

    function index(){
        // if(!empty($data)){
            $data = array(
                'pesan' => "error", 
            );
            $this->load->view('v_login', $data);
        // }
        // else{
        //     $this->load->view('v_login');
        // }
        
    }

    function aksi_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => $password //md5($password) 
        );
        $cek = $this->m_login->cek_login('admin', $where)->num_rows();
        if($cek > 0){
            $data_session = array(
                'nama' => $username,
                'status' => "login"
            );

            $this->session->set_userdata($data_session);

            redirect(base_url("admin"));
            
        }else{
            
            $this->session->set_flashdata('error', 'Username dan password salah !');
            redirect(base_url("login"));
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url("login"));
        
    }

}
