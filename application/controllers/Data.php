<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_ruangan');
        $this->load->model('m_peminjaman');
        $this->load->model('m_admin');
        $this->load->library('encryption');
        
    }
    

    public function index()
    {
        $key = $this->input->get('key');
        $id_ruangan = $this->input->get('id_ruangan');
        if($key == ""){
            echo "null";
        }
        else if($key == "nasi" && $id_ruangan == ""){
            $data = $this->m_ruangan->ruangan_list();
            echo json_encode($data);
        }
        else if($key == "nasi" && $id_ruangan != ""){
            $data = $this->m_ruangan->get_ruangan_by_id($id_ruangan);
            echo json_encode($data);
        }
        else if($key != "nasi"){
            echo "null";
        }
    }

    function tambah_peminjaman_user(){
        $key = $this->input->get('key');
        $id_ruangan    = $this->input->post('id_ruangan');
        $nama_peminjam = $this->input->post('nama_peminjam');
        $tanggal       = $this->input->post('tanggal');
        $waktu_mulai   = $this->input->post('waktu_mulai');
        $waktu_selesai = $this->input->post('waktu_selesai');
        $jumlah_orang  = $this->input->post('jumlah_orang');
        $kegiatan      = $this->input->post('kegiatan');
        $kebutuhan     = $this->input->post('kebutuhan');
        $kebutuhan = implode(", ",$kebutuhan);
        if($key == ""){
            echo "null";
        }
        else if($key == "nasi"){
            

            $data = array(
                'id_ruangan'    => $id_ruangan,
                'nama_peminjam' => $nama_peminjam,
                'tanggal'       => $tanggal,
                'kegiatan'      => $kegiatan,
                'waktu_mulai'   => $waktu_mulai,
                'waktu_selesai' => $waktu_selesai,
                'jumlah_orang'  => $jumlah_orang,
                'kebutuhan'     => $kebutuhan 
             );
     
             $hasil = $this->m_peminjaman->peminjaman_tambah('booking', $data);
             
             redirect(base_url());
             

        }
        else if($key != "nasi"){
            echo "null";
        }
    }

    function tambah_peminjaman(){
        $key = $this->input->get('key');
        $id_ruangan    = $this->input->post('id_ruangan');
        $nama_peminjam = $this->input->post('nama_peminjam');
        $tanggal       = $this->input->post('tanggal');
        $waktu_mulai   = $this->input->post('waktu_mulai');
        $waktu_selesai = $this->input->post('waktu_selesai');
        $jumlah_orang  = $this->input->post('jumlah_orang');
        $kegiatan      = $this->input->post('kegiatan');
        $kebutuhan     = $this->input->post('kebutuhan');
        // $kebutuhan = implode(", ",$kebutuhan);
        
        if($key == ""){
            echo "null";
        }
        else if($key == "nasi"){
            

            $data = array(
                'id_ruangan'    => $id_ruangan,
                'nama_peminjam' => $nama_peminjam,
                'tanggal'       => $tanggal,
                'kegiatan'      => $kegiatan,
                'waktu_mulai'   => $waktu_mulai,
                'waktu_selesai' => $waktu_selesai,
                'jumlah_orang'  => $jumlah_orang,
                'kebutuhan'     => $kebutuhan 
             );
     
             $hasil = $this->m_peminjaman->peminjaman_tambah('booking', $data);

        }
        else if($key != "nasi"){
            echo "null";
        }
    }

    function tampil_peminjam(){
        $key = $this->input->get('key');
        if($key == "8799e0aa00bba9e6a0d7050c2c65b6134a3f4865"){
            $data = $this->m_peminjaman->peminjaman_tampil();
            foreach($data as $data2){
                $arrayName = array(
                    'id_ruangan' => $data2->id_ruangan,
                    'nama_ruangan' => $data2->nama_ruangan,
                    'tanggal' => $data2->tanggal, 
                );
            }
            echo json_encode($data);
            // echo str_replace(array('[', ']'), '', json_encode($data));
        }else{
            echo "null";
        }
    }

    function data_admin($id_admin){
        // $where = array('id_admin' =>  $id_admin);
        $hasil = $this->m_admin->tampil_admin($id_admin);
        echo json_encode($hasil);
        $msg = "nasi";
        $key = "bb9f601ba081ab8d336a14a697048cb0";
        // $encrypted_string = $this->encrypt->encode($msg, $key);
        // $plaintext_string = $this->encrypt->decode($encrypted_string);
        // echo $data = md5($data);
        $ciphertext = $this->encryption->encrypt($msg);
        echo $this->encryption->decrypt($ciphertext);
    }

    function aksi_edit_admin(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $id_admin = $this->input->post('id_admin');
        $data = array(
            'username' => $username,
            'password' => $password 
        );

        $hasil = $this->m_admin->admin_edit('admin', $data, array('id_admin' => $id_admin));
        echo $hasil;
    }
    

}

/* End of file Data.php */
