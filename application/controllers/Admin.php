<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('m_ruangan');
        $this->load->model('m_penggunaan');
        $this->load->model('m_peraturan');
        $this->load->model('m_peminjaman');
        $this->load->model('m_admin');
        
        $this->load->helper(array('form', 'url'));
        
        
        if($this->session->userdata('status') != "login"){
            
            redirect(base_url("login"));
            
        }
    }

    function index()
    {
        // $data['data']       = $this->m_ruangan->ruangan_list();
        // $data['penggunaan'] = $this->m_penggunaan->penggunaan_list();
        $data['peraturan']     = $this->m_peraturan->peraturan_tampil();
        $data['total_ruangan'] = $this->m_ruangan->total_ruangan();
        $data['ruangan']       = $this->m_ruangan->ruangan_list();
        $data['peminjaman']    = $this->m_peminjaman->peminjaman_tampil();  

        $this->load->view('admin/admin_header');
        $this->load->view('admin/v_admin', $data);
    }

    function peraturan(){
        $data = $this->m_peraturan->peraturan_tampil();
        echo json_encode($data);
    }

    function edit_admin(){
        $data_admin = $this->m_admin->tampil_admin('1');
        $data = array('pesan' => "sukses", 'data_admin' => $data_admin);
        $this->load->view('admin/admin_header');
        $this->load->view('admin/edit_admin', $data);
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
        if($hasil == true){
            $pesan = '<div class="alert alert-success alert-dismissible fade show" role="alert">'.
                            '<strong>Data </strong> Berhasil di edit'.
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'.
                            '<span aria-hidden="true">&times;</span>'.
                            '</button>'.
                            '</div>';
            $this->session->set_flashdata('sukses', $pesan);
            redirect(base_url('admin/edit_admin'));
        }
        
    }

    function peraturan_id(){
        $id_peraturan = $this->input->get('id_rule');
        $tampil = $this->m_peraturan->peraturan_tampil_id($id_peraturan);
        echo json_encode($tampil);
    }

    function penggunaan(){
        $this->load->view('admin/v_penggunaan');
    }

    function ruangan(){
        $this->load->view('admin/admin_header');
        $this->load->view('admin/v_ruangan');
    }

    function tampil_ruangan(){
        $output = '';
        $data = $this->m_ruangan->ruangan_list();
        echo json_encode($data);
    }

    function tampil_ruangan2(){
        $output = '';
        $data = $this->m_ruangan->ruangan_list();
        // echo json_encode($data);
        $no=1;
        foreach ($data as $ruangan) {
            $output .= '
                <tr>
                    <td>'.$no++.'</td>
                    <td>'.$ruangan->no_ruangan.'</td>
                    <td>'.$ruangan->nama_ruangan.'</td>
                    <td>'.$ruangan->keterangan.'</td>
                    <td>
                    <button class="btn btn-warning btn-sm" id="'.$ruangan->id_ruangan.'">Edit</button>
                    <button class="btn btn-danger btn-sm" id="'.$ruangan->id_ruangan.'">Hapus</button>
                    </td>
            ';

            $arrayName = array(
                'no' => '<tr><td>'.$no++.'</td>',
                'no_ruangan' => '<td>'.$ruangan->no_ruangan.'</td>',
                'nama_ruangan' => '<td>'.$ruangan->nama_ruangan.'</td>',
                'status' => '<td>'.$ruangan->status.'</td>',
                'keterangan' => '<td>'.$ruangan->keterangan.'</td></tr>' 
            );
        }

        $arrayName = json_encode($arrayName);
        print_r($arrayName);

    }

    function tambah_ruangan(){
        $config['upload_path']   = "./assets/gambar";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name']  = TRUE;
        
        $this->load->library('upload', $config);
        echo $this->upload->do_upload("foto_ruangan");
        if($this->upload->do_upload("foto_ruangan")){
            $data = array('upload_data' => $this->upload->data());
            $nama_ruangan = $this->input->post('nama_ruangan');
            $kapasitas = $this->input->post('kapasitas');
            $fasilitas = $this->input->post('fasilitas');
            // $foto_ruangan = $this->input->post('foto_ruangan');
            $keterangan = $this->input->post('keterangan');
            $foto_ruangan = $data['upload_data']['file_name'];


            $data = array(
                'nama_ruangan' => $nama_ruangan,
                'kapasitas' => $kapasitas,
                'fasilitas' => $fasilitas,
                'foto_ruangan' => $foto_ruangan,
                'keterangan' => $keterangan 
            );

            $result = $this->m_ruangan->ruangan_tambah('ruangan', $data);
            echo $result;
            $this->tampil_ruangan();
        }
        
    }

    function get_ruangan(){
        $id_ruangan = $this->input->get('id_ruangan');
        $data = $this->m_ruangan->get_ruangan_by_id($id_ruangan);
        echo json_encode($data);
    }

    function tampil_peminjam(){
        $data = $this->m_peminjaman->peminjaman_tampil();
        echo json_encode($data);
    }

    function tampil_peminjam_perid(){
        $id_booking = $this->input->get('id_peminjam');
        $hasil = $this->m_peminjaman->peminjaman_tampil_id($id_booking);
        echo json_encode($hasil);
    }

    // function tambah_peminjam(){
    //    $id_ruangan    = $this->input->post('nama_ruangan');
    //    $nama_peminjam = $this->input->post('nama_peminjam');
    //    $tanggal       = $this->input->post('tanggal');
    //    $waktu_mulai   = $this->input->post('waktu_mulai');
    //    $waktu_selesai = $this->input->post('waktu_selesai');
    //    $jumlah_orang  = $this->input->post('jumlah_orang');
    //    $kegiatan      = $this->input->post('kegiatan');
    //    $kebutuhan     = $this->input->post('kebutuhan');
    // //    $kebutuhan = implode(",", $kebutuhan);

    //    $tampil_peminjam = $this->m_peminjaman->peminjaman_tampil();
    // //    $data_ruangan    = $this->m_ruangan->ruangan_list();
    // //    foreach($data_ruangan as $d){
    // //        if($nama_ruangan == $d->nama_ruangan){
    // //            $id_ruangan = $d->id_ruangan;
    // //        }
    // //    }
        
    // //    $simpan = FALSE;
    // //    foreach($tampil_peminjam as $data_peminjam){
    // //        if($tanggal == $data_peminjam['tanggal']){
    // //             if()
    // //        }
    // //    }

    //    $data = array(
    //        'id_ruangan'    => $id_ruangan,
    //        'nama_peminjam' => $nama_peminjam,
    //        'tanggal'       => $tanggal,
    //        'kegiatan'      => $kegiatan,
    //        'waktu_mulai'   => $waktu_mulai,
    //        'waktu_selesai' => $waktu_selesai,
    //        'jumlah_orang'  => $jumlah_orang,
    //        'kebutuhan'     => $kebutuhan 
    //     );

    //     $this->m_peminjaman->peminjaman_tambah('booking', $data);
    // }

    function edit_peraturan(){
        $id_rule = $this->input->post('id_rule');
        $peraturan = $this->input->post('peraturan');

        $data = array(
            'rule' => $peraturan 
        );

        $result = $this->m_peraturan->peraturan_edit('peraturan', $data, array('id_rule' => $id_rule));
    }

    function edit_ruangan(){
        $nomor_ruangan = $this->input->post('no_ruangan_edit');
        $nama_ruangan  = $this->input->post('nama_ruangan_edit');
        $status        = $this->input->post('status_edit');
        $keterangan    = $this->input->post('keterangan_edit');
        $id_ruangan    = $this->input->post('id_ruangan_edit');

        $data = array(
            'no_ruangan'   => $nomor_ruangan,
            'nama_ruangan' => $nama_ruangan,
            'status'       => $status,
            'keterangan'   => $keterangan 
        );

        $result = $this->m_ruangan->ruangan_edit('ruangan', $data, array('id_ruangan' => $id_ruangan));
    }

    function hapus_pinjaman(){
        $id_booking = $this->input->post('row_id');
        $result = $this->m_peminjaman->peminjaman_hapus('booking', array('id_booking' => $id_booking));
    }

    function hapus_ruangan(){
        $id_ruangan = $this->input->post('row_id');
        $result = $this->m_ruangan->ruangan_hapus('ruangan', array('id_ruangan' => $id_ruangan));
    }

    function tes(){
        $this->load->view('admin/tes', array('error' => ' ' ));
        
    }

    function tes_upload(){
        $config['upload_path']      = './assets/gambar/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['encrypt_name']     = TRUE; 

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('admin/tes', $error);
        }
        else
        {
            // $config['max_size']             = 1000;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
                $data = array('upload_data' => $this->upload->data());

                $this->load->view('admin/tes_sukses', $data);
        }
    }

}

/* End of file Controllername.php */
