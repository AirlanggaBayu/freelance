<?php

class dashboard extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('crud');
    }

    public function index(){
        $data['barang'] = $this->crud->tampil_data('barang')->result();
        $this->load->view('template/header');
        $this->load->view('barang', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');
    }
}

?>