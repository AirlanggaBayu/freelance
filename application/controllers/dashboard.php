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

    public function ubah_data($id_brg){
        $id_brg = $this->input->post('id_brg');
        $nama_brg = $this->input->post('nama_brg');
        $stok = $this->input->post('stok');
        $hrg_jual = $this->input->post('hrg_jual');
        $foto = $_FILES['foto_brg']['name'];
                if($foto){
                    $config ['upload_path'] = 'uploads/';
                    $config ['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config ['max_size'] = '2048';
    
                    $this->load->library('upload', $config);

                    if($this->upload->do_upload('foto_brg')){
                        //menghapus foto lama jika mitra menginputkan foto baru kedalam database kecuali default.png
                        $foto_lama = $data['barang']['foto_brg'];
                        if($foto_lama != 'default.png'){
                            unlink(FCPATH.'/assets/img/profil/'.$foto_lama);
                        }
                        
                        $foto = $this->upload->data('file_name');
                        //untuk foto tidak disatukan kedalam data array dibawah untuk menghindari tampilan foto kosong ketika mengubah data 
                        $this->db->set('foto_brg', $foto);
                    }else{
                        echo $this->upload->display_errors();
                    }
                }
        $id_kategori = $this->input->post('id_kategori');

        $data = array(
            'nama_brg' => $nama_brg,
            'stok' => $stok,
            'hrg_jual' => $hrg_jual,
            'id_kategori' => $id_kategori
        );

        $where = array(
            'id_brg' => $id_brg
        );

        $this->crud->ubah_data($where, $data, 'barang');
        redirect('dashboard/index');
    }

    function hapus_data($id_brg){
        $where = array(
            'id_brg' => $id_brg
        );
        $this->crud->hapus_data($where, 'barang');
        redirect('dashboard/index');
    }

    function tambah_data(){
        $nama_brg = $this->input->post('nama_brg');
        $stok = $this->input->post('stok');
        $hrg_jual = $this->input->post('hrg_jual');
        $id_kategori = $this->input->post('id_kategori');
        $foto        = $_FILES['foto_brg']['name'];
        if ($foto =''){}else{
            $config ['upload_path'] = './uploads/';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';
            $config ['max_size'] = '2048';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_brg')){
                echo "Gambar Yang Anda Upload Gagal Rek!!";
            }else{
                $foto=$this->upload->data('file_name');
            }
        }
        $data = array(
            'nama_brg' => $nama_brg,
            'stok' => $stok,
            'hrg_jual' => $hrg_jual,
            'foto_brg' => $foto,
            'id_kategori' => $id_kategori
        );
        $this->crud->tambah_data($data, 'barang');
        $data['kodeunik'] = $this->crud->kode_unik();
        redirect('dashboard/index');
    }
}

?>