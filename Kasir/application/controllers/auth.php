
<?php

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
    }

    public function index()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/auth_header');
            $this->load->view('auth/login');
            $this->load->view('template/auth_footer');
        } else {
            $this->login();
        }
    }
    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $admin = $this->db->get_where('admin', ['username' => $username])->row_array();

        if (md5($password) == $admin['password']) {
            $data = [
                'username' => $admin['username'],


            ];


            $this->session->set_userdata($data);

            redirect('dashboard');
        } else {
            $this->session->set_flashdata('message', '<div class= "alert alert-danger" role="alert">
					Username atau Password salah</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('message', '<div class= "alert alert-success" role="alert">
		Berhasil keluar </div>');
        redirect('auth');
    }
}
