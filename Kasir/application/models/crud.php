<?php

class crud extends CI_Model
{

    #fungsi ini untuk menampilkan data
    function tampil_data($table)
    {
        return $this->db->get($table);
    }

    #fungsi ini untuk tambah data
    function tambah_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    #fungsi ini untuk hapus data
    function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    #fungsi ini untuk update data
    function ubah_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    // function kode_unik()
    // {
    //     $this->db->select('RIGHT(barang.id_brg,4) as kode', FALSE);
    //     $this->db->order_by('id_brg', 'DESC');
    //     $this->db->limit(1);
    //     $query = $this->db->get('barang');      //cek dulu apakah ada sudah ada kode di tabel.    
    //     if ($query->num_rows() <> 0) {
    //         //jika kode ternyata sudah ada.      
    //         $data = $query->row();
    //         $kode = intval($data->kode) + 1;
    //     } else {
    //         //jika kode belum ada      
    //         $kode = 1;
    //     }

    //     $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
    //     // $kodejadi = "P".$kodemax;    // hasilnya ODJ-9921-0001 dst.
    //     if ($data->id_kategori == 1) {
    //         $kodejadi = "K" . $kodemax;
    //     } else if ($data->id_kategori == 2) {
    //         $kodejadi = "M" . $kodemax;
    //     } else {
    //         $kodejadi = "L" . $kodemax;
    //     }
    //     return $kodejadi;
    // }

    public function kode()
    {
        $this->db->select('RIGHT(barang.kode_barang,2) as kode_barang', FALSE);
        $this->db->order_by('kode_barang', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('barang');  //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->kode_barang) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $tgl = date('dmY');
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = "BR" . "5" . $tgl . $batas;  //format kode
        return $kodetampil;
    }

    public function inputBarang($data)
    {
        $this->db->insert('barang', $data);
    }

    public function cekkodebarang()
    {
        $query = $this->db->query("SELECT MAX(kode_barang) as kodebarang from barang");
        $hasil = $query->row();
        return $hasil->kodebarang;
    }
}
