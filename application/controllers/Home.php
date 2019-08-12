<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_peraturan');
        $this->load->model('m_ruangan');
        $this->load->model('m_peminjaman');
    }
    

    public function index()
    {
        $keyword = $this->input->get('keyword');
        $data['peraturan']  = $this->m_peraturan->peraturan_tampil();
        $data['peminjaman'] = $this->m_peminjaman->peminjaman_tampil();
        $data['peminjaman_json'] = json_encode($data['peminjaman']);
        if(empty($keyword)){
            $data['ruangan']    = $this->m_ruangan->ruangan_list();
        }else if(!empty($keyword)){
            $data['ruangan']    = $this->m_ruangan->get_ruangan_keyword($keyword);
            $data['tanda'] = true;
        }
        
        $this->load->view('header');
        $this->load->view('v_home', $data);

        $this->load->view('vendor/autoload.php');
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            '421ce9b5265ffbfbde08',
            'f24a6a32687b3b379cdc',
            '828883',
            $options
        );

            $data = $data;
            $pusher->trigger('peminjaman', 'my-event', $data);
        
    }

    function pinjam(){
        $id_ruangan2 = $this->input->get('id_ruangan');
        $data2['data_ruangan'] = $this->m_ruangan->get_ruangan_by_id($id_ruangan2);
        // echo json_encode($data);

        $key = $this->input->get('key');
        $id_ruangan    = $this->input->post('id_ruangan');
        $nama_peminjam = $this->input->post('nama_peminjam');
        $tanggal       = $this->input->post('tanggal');
        $waktu_mulai   = $this->input->post('waktu_mulai');
        $waktu_selesai = $this->input->post('waktu_selesai');
        $jumlah_orang  = $this->input->post('jumlah_orang');
        $kegiatan      = $this->input->post('kegiatan');
        $kebutuhan     = $this->input->post('kebutuhan');
        
        $peminjaman_validasi = $this->m_peminjaman->peminjaman_tampil();

        if($key == "nasi" && !empty($id_ruangan)){
            
            if(empty($tanggal)){
                $data2['pesan_error'] = 'Please Insert Date';
                $this->load->view('v_pinjam', $data2);
            }
            else if(!empty($tanggal)){
                $kebutuhan = implode(", ",$kebutuhan);
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
                 if($hasil == true){
                    $data3['berhasil'] = true;
                    $this->load->view('v_pinjam', $data3);
                    //  redirect(base_url());
                    $this->load->view('vendor/autoload.php');
                    $options = array(
                        'cluster' => 'ap1',
                        'useTLS' => true
                    );
                    $pusher = new Pusher\Pusher(
                        '421ce9b5265ffbfbde08',
                        'f24a6a32687b3b379cdc',
                        '828883',
                        $options
                    );

                        $kirim_data = $data;
                        $pusher->trigger('peminjam', 'my-event', $data);
                     
                 }else if($hasil == false){
                    $data2['pesan_error'] = 'Error input';
                    $this->load->view('v_pinjam', $data2);
                 }
            }
            

        }else if(empty($id_ruangan2)){

            redirect(base_url());
        
        }else if(!empty($id_ruangan2)){
        
            $this->load->view('v_pinjam', $data2);
        
        }else if($key == "" || $key != "nasi"){
            echo "null";
        }
    }

    function meeting_rule(){
        $this->load->view('header');
        $this->load->view('meeting_rule');
        $this->load->view('footer');
    }

}

/* End of file Controllername.php */
