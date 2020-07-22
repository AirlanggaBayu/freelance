<?php

    class Auth extends CI_Controller{

        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->load->view('template/auth_header');
            $this->load->view('auth/login');
            $this->load->view('template/auth_footer');
        }
    }

?>