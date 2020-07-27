<?php

class Menu extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_menu');
    }

    /** Fungsi menampilkan data menu dan untuk menambah data menu */
    public function index(){
        $data['title'] = "Menu Management";

        /** Mengambil data menu */
        $data['menu'] = $this->m_menu->getmenu();

        /** Validasi form input */
        $this->form_validation->set_rules('menu', 'Menu', 'required|trim', [
            'required' => 'Kolom ini harus di isi'
        ]);

        $this->form_validation->set_rules('icon', 'Icon', 'required|trim', [
            'required' => 'Kolom ini harus di isi'
        ]);

        $this->form_validation->set_rules('url', 'Url', 'trim');
        
        if($this->form_validation->run() == false)
        {
            $this->load->view('template/header');
            $this->load->view('menu', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        }
        else
        {
            $menu = htmlspecialchars($this->input->post('menu'));
            $icon = htmlspecialchars($this->input->post('icon'));
            $url = htmlspecialchars($this->input->post('url'));

            $data = [
                'menu' => $menu,
                'icon' => $icon,
                'url' => $url,
                'is_active' => '1'
            ];

            /** Proses tambah data */
            $this->m_menu->addmenu($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('menu');
        }
    }

    /** Fungsi untuk menghapus data menu */
    public function deletemenu()
    {
        $id = $this->input->post('id');
        $this->m_menu->delmenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('menu');
    } 

    /** Fungsi untuk mengedit data menu */
    public function editmenu()
    {
        /** Mengambil data menu */
        $data['menu'] = $this->m_menu->getmenu();

        /** Validasi form input */
        $this->form_validation->set_rules('menu', 'Menu', 'required|trim', [
            'required' => 'Kolom ini harus di isi'
        ]);

        $this->form_validation->set_rules('icon', 'Icon', 'required|trim', [
            'required' => 'Kolom ini harus di isi'
        ]);

        $this->form_validation->set_rules('url', 'Url', 'trim');
        
        if($this->form_validation->run() == false)
        {
            $this->load->view('template/header');
            $this->load->view('menu', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        }
        else
        {
            $id = htmlspecialchars($this->input->post('id'));
            $menu = htmlspecialchars($this->input->post('menu'));
            $icon = htmlspecialchars($this->input->post('icon'));
            $url = htmlspecialchars($this->input->post('url'));
            
            $data = [
                'id_menu' => $id,
                'menu' => $menu,
                'icon' => $icon,
                'url' => $url
            ];

            $this->m_menu->edtmenu($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('menu'); 
        }
    }

    /** Fungsi untuk menonaktifkan menu */
    public function disable($id)
    {
        $data = [
            'is_active' => 0
        ];

        $this->m_menu->disablemenu($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Menu dinonaktifkan.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('menu'); 
    }

    /** Fungsi untuk mengaktifkan menu */
    public function active($id)
    {
        $data = [
            'is_active' => 1
        ];

        $this->m_menu->activemenu($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu diaktifkan.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('menu'); 
    }

    #=================================================================================================================================================

    /** Fungsi untuk menampilkan data submenu dan menambah data submenu */
    public function submenu()
    {
        $data['title'] = "Submenu Management";
        /** Mengambil data menu */
        $data['menu'] = $this->m_menu->getmenu();

        /** Mengambil data submenu */
        $data['submenu'] = $this->m_menu->getsubmenu();

        /** Validasi form input */
        $this->form_validation->set_rules('menu', 'Menu', 'required|trim', [
            'required' => 'Kolom ini harus di isi'
        ]);

        $this->form_validation->set_rules('submenu', 'Submenu', 'required|trim', [
            'required' => 'Kolom ini harus di isi'
        ]);

        $this->form_validation->set_rules('url', 'Url', 'required|trim', [
            'required' => 'Kolom ini harus diisi'
        ]);
        
        if($this->form_validation->run() == false)
        {
            $this->load->view('template/header');
            $this->load->view('submenu', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        }
        else
        {
            $menu = htmlspecialchars($this->input->post('menu'));
            $submenu = htmlspecialchars($this->input->post('submenu'));
            $url = htmlspecialchars($this->input->post('url'));

            $data = [
                'id_menu' => $menu,
                'submenu' => $submenu,
                'url_s' => $url,
                'is_active_s' => '1'
            ];

            /** Proses tambah data */
            $this->m_menu->addsubmenu($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('menu/submenu');
        }
    }

    /** Fungsi untuk menghapus data submenu */
    public function deletesubmenu()
    {
        $id = $this->input->post('id');
        $this->m_menu->delsubmenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('menu/submenu');
    } 

    /** Fungsi untuk mengedit data menu */
    public function editsubmenu()
    {
        /** Mengambil data menu */
        $data['menu'] = $this->m_menu->getmenu();
        
        /** Mengambil data submenu */
        $data['submenu'] = $this->m_menu->getsubmenu();

        /** Validasi form input */
        $this->form_validation->set_rules('menu', 'Menu', 'required|trim', [
            'required' => 'Kolom ini harus di isi'
        ]);

        $this->form_validation->set_rules('submenu', 'Submenu', 'required|trim', [
            'required' => 'Kolom ini harus di isi'
        ]);

        $this->form_validation->set_rules('url', 'Url', 'trim');
        
        if($this->form_validation->run() == false)
        {
            $this->load->view('template/header');
            $this->load->view('submenu', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
        }
        else
        {
            $id = htmlspecialchars($this->input->post('id'));
            $menu = htmlspecialchars($this->input->post('menu'));
            $submenu = htmlspecialchars($this->input->post('submenu'));
            $url = htmlspecialchars($this->input->post('url'));
            
            $data = [
                'id_submenu' => $id,
                'id_menu' => $menu,
                'submenu' => $submenu,
                'url_s' => $url
            ];

            $this->m_menu->edtsubmenu($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('menu/submenu'); 
        }
    }

    /** Fungsi untuk menonaktifkan menu */
    public function disablesm($id)
    {
        $data = [
            'is_active_s' => 0
        ];

        $this->m_menu->disablesubmenu($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Submenu dinonaktifkan.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('menu/submenu'); 
    }

    /** Fungsi untuk mengaktifkan menu */
    public function activesm($id)
    {
        $data = [
            'is_active_s' => 1
        ];

        $this->m_menu->activesubmenu($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu diaktifkan.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('menu/submenu'); 
    }
}

?>