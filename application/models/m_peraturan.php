<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class m_peraturan extends CI_Model {

    function peraturan_tampil(){
        $tampil = $this->db->query("SELECT * FROM peraturan");
        return $tampil->result();
    }

    function peraturan_tampil_id($id_peraturan){
        $tampil = $this->db->query("SELECT * FROM peraturan WHERE id_rule = $id_peraturan");
        if($tampil->num_rows() > 0){
            foreach($tampil->result() as $data){
                $hasil = array(
                    'id_rule'   => $data->id_rule,
                    'peraturan' => $data->rule  
                );
            }
        }
        return $hasil;
    }

    function peraturan_edit($table, $data, $where){
        $edit = $this->db->update($table, $data, $where);
        return $edit;
    }

}

/* End of file m_peraturan.php */
