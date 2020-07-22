<?php

class crud extends CI_Model{

    #fungsi ini untuk menampilkan data
    function tampil_data($table){
        $this->db->get($table);
    }

    #fungsi ini untuk tambah data
    function tambah_data($data, $table){
        $this->db->insert($table, $data);
    }

    #fungsi ini untuk hapus data
    function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    #fungsi ini untuk update data
    function ubah_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}

?>