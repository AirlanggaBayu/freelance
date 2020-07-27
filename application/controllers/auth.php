<?php

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Register_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('template/auth_header');
        $this->load->view('auth/login');
        $this->load->view('template/auth_footer');
    }

    public function register()
    {

        $this->form_validation->set_rules('nama_adm', 'Nama', 'required|trim');
        $this->form_validation->set_rules('pwd_adm', 'Password', 'required|trim');
        $this->form_validation->set_rules('usnm', 'Username', 'required|trim|is_unique[admin.usnm]', [
            'is_unique' => 'Username sudah terdaftar!'
        ]);


        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Tambah Admin Baru';
            $this->load->view('template/auth_header');
            $this->load->view('auth/register');
            $this->load->view('template/auth_footer');
        } else {
            $this->Register_model->register();
            $this->session->set_flashdata('message', '<div class= "alert alert-success" role="alert">
			Akun anda berhasil dibuat, silahkan login </div>');
            redirect('auth/login');
        }
    }
}
