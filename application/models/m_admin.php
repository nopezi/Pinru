<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class m_admin extends CI_Model {

    function tampil_admin($id_admin){
        $tampil = $this->db->query("SELECT * FROM admin WHERE id_admin = $id_admin");
        return $tampil->result();
    }

    function admin_edit($table, $data, $where){
        $edit = $this->db->update($table, $data, $where);
        return $edit;
    }

}

/* End of file m_admin.php */
