<?php
class Kode_otomatis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kode_m');
    }
    public function index()
    {
        $data['kode'] = $this->kode_m->kode();
        $data['tampil'] = $this->kode_m->tampil();
        $this->load->view('Kode_otomatis', $data);
    }

    public function inputbarang()
    {
        if ($_POST) {
            $barang = $this->input->post('namaBarang');
            $kodebarang = $this->input->post('kodeBarang');
            $stok = $this->input->post('stokBarang');
            $harga = $this->input->post('harga');
            $foto = $this->input->post('foto_brg');
            $kategori = $this->input->post('id_kategori');
            $status = $this->input->post('id_status');
            $this->kode_m->inputBarang(array(
                'nama_barang'         => $barang,
                'kode_barang'        => $kodebarang,
                'stok'        => $stok,
                'harga'        => $harga,
                'foto_brg'        => $foto,
                'id_kategori'        => $kategori,
                'id_status'        => $status,
            ));
        }
        redirect("Kode_otomatis");
    }
}
