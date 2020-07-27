<?php

class M_menu extends CI_Model{

    #fungsi ini untuk menampilkan data menu
    public function getmenu(){
        $data = $this->db->get('menu')->result_array();
        return $data;
    }

    #fungsi ini untuk tambah data menu
    public function addmenu($data){
        $this->db->insert('menu', $data);
    }

    #fungsi ini untuk hapus data menu
    function delmenu($id){
        $this->db->where('id_menu', $id);
        $this->db->delete('menu');
    }

    #fungsi ini untuk update data menu
    function edtmenu($id, $data){
        $this->db->where('id_menu', $id);
        $this->db->update('menu',$data);
    }

    #funsi menonaktifkan menu
    function disablemenu($id, $data){
        $this->db->where('id_menu', $id);
        $this->db->update('menu', $data);
    }

    #funsi menonaktifkan menu
    function activemenu($id, $data){
        $this->db->where('id_menu', $id);
        $this->db->update('menu', $data);
    }

    #=================================================================================================================================================

    #fungsi ini untuk menampilkan data submenu
    public function getsubmenu(){
        $this->db->select('*');
        $this->db->from('submenu');
        $this->db->join('menu', 'submenu.id_menu=menu.id_menu');
        $data = $this->db->get();
        $sql = $data->result_array();
        return $sql;
    }

    #fungsi ini untuk tambah data submenu
    public function addsubmenu($data){
        $this->db->insert('submenu', $data);
    }

    #fungsi ini untuk hapus data submenu
    function delsubmenu($id){
        $this->db->where('id_submenu', $id);
        $this->db->delete('submenu');
    }

    #fungsi ini untuk update data submenu
    function edtsubmenu($id, $data){
        $this->db->where('id_submenu', $id);
        $this->db->update('submenu',$data);
    }

    #funsi menonaktifkan submenu
    function disablesubmenu($id, $data){
        $this->db->where('id_submenu', $id);
        $this->db->update('submenu', $data);
    }

    #funsi menonaktifkan submenu
    function activesubmenu($id, $data){
        $this->db->where('id_submenu', $id);
        $this->db->update('submenu', $data);
    }
}

?>