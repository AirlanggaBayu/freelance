<?php

    class Barang extends CI_Controller {
        public function index(){
            $this->load->view('template/header');
            $this->load->view('barang');
            $this->load->view('template/footer');
        }
    }
?>