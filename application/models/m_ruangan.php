<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_ruangan extends CI_Model {

    function ruangan_list(){
        $tampil = $this->db->query("SELECT * FROM ruangan ORDER BY id_ruangan DESC");
        return $tampil->result();
    }

    function ruangan_tambah($table, $data){
        $tambah = $this->db->insert($table, $data);
        return $tambah;
    }

    function total_ruangan(){
        $tampil = $this->db->query("SELECT * FROM ruangan");
        return $tampil->num_rows();
    }

    function get_ruangan_keyword($keyword){
        $this->db->select('*');
        $this->db->from('ruangan');
        $this->db->like('nama_ruangan',$keyword);
        $this->db->or_like('kapasitas',$keyword);
        return $this->db->get()->result();
    }

    function get_ruangan_by_id($id_ruangan){
        $tampil = $this->db->query("SELECT * FROM ruangan WHERE id_ruangan='$id_ruangan'");
        if($tampil->num_rows() > 0){
            foreach($tampil->result() as $data){
                $fasilitas = explode(",", $data->fasilitas);
                $hasil = array(
                    'id_ruangan'   => $data->id_ruangan,
                    'nama_ruangan' => $data->nama_ruangan,
                    'kapasitas'    => $data->kapasitas,
                    'fasilitas'    => $fasilitas,
                    'foto_ruangan' => $data->foto_ruangan,
                    'keterangan'   => $data->keterangan 
                );
            }
            return $hasil;
        }else{
            echo "null";
        }
        
    }

    function ruangan_edit($table, $data, $where){
        return $this->db->update($table, $data, $where);
    }

    function ruangan_hapus($table, $where){
        return $this->db->delete($table, $where);
    }

}

/* End of file ModelName.php */
