<?php

    class Home extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model('crud');
        }

        public function index(){
            $data['barang'] = $this->crud->tampil_data('barang')->result();
            $this->load->view('template/header');
            $this->load->view('home', $data);
            $this->load->view('template/footer');
        }

        public function detail_barang($id_brg){
            $data['barang'] = $this->crud->detail_data(['id_brg' => $id_brg], 'barang')->result();
            $this->load->view('template/header');
            $this->load->view('detail_barang', $data);
            $this->load->view('template/footer');
        }
    }
?>