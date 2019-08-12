<?php defined('BASEPATH') OR exit('No direct script access allowed');

class m_penggunaan extends CI_Model {

    function penggunaan_list(){
        $tampil = $this->db->query("SELECT ruangan.id_ruangan, ruangan.nama_ruangan, ruangan.no_ruangan, ruangan.status, penggunaan.tanggal, penggunaan.mulai, penggunaan.penanggung_jawab, penggunaan.nama_kegiatan FROM penggunaan, ruangan WHERE penggunaan.id_ruangan = ruangan.id_ruangan");
        return $tampil->result();
    }
    
}

/* End of file ModelName.php */
