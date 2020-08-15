<?php

    class Detail extends CI_Controller{
        public function index(){
            $this->load->view('template/header');
            $this->load->view('detail_barang');
            $this->load->view('template/footer');
        }
    }

?>