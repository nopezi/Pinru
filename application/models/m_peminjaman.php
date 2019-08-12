<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class m_peminjaman extends CI_Model {

    function peminjaman_tampil(){
        $tampil = $this->db->query("SELECT ruangan.nama_ruangan, booking.id_ruangan, booking.id_booking, booking.nama_peminjam, booking.tanggal, booking.kegiatan, booking.waktu_mulai, booking.waktu_selesai, booking.jumlah_orang, booking.kebutuhan FROM booking, ruangan WHERE booking.id_ruangan=ruangan.id_ruangan");
        return $tampil->result();
    }

    function peminjaman_tambah($table, $data){
        $tambah = $this->db->insert($table, $data);
        return $tambah;
    }

    function peminjaman_tampil_id($id_booking){
        $tampil = $this->db->query("SELECT * FROM booking WHERE id_booking = $id_booking");
        return $tampil->result();
    }

    function peminjaman_edit($table, $data, $where){
        $edit = $this->db->update($table, $data, $where);
    }

    function peminjaman_hapus($table, $where){
        return $this->db->delete($table, $where);
    }

}

/* End of file m_peminjaman.php */
