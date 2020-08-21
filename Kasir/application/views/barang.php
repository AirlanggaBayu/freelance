<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
          <em class="fa fa-home"></em>
        </a></li>
      <li class="active">Data Barang</li>
    </ol>
  </div>
  <!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Data Barang</h1>
    </div>
  </div>
  <!--/.row-->

  <div class="panel panel-container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Tabel Barang
            <ul class="pull-right panel-settings panel-button-tab-right">
              <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="modal" data-target="#tambah">
                  <em class="fa fa-cogs"></em>
                </a>
              </li>
            </ul>
            <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
          <div class="panel-body">
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Kode Barang</th>
                  <th scope="col">Nama Barang</th>
                  <th scope="col">Stok</th>
                  <th scope="col">Harga Jual</th>
                  <th scope="col">Foto</th>
                  <th scope="col">Kategori</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  $no = 1;
                  foreach ($barang as $brg) {
                  ?>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $brg->kode ?></td>
                    <td><?= $brg->nama_brg ?></td>
                    <td><?= $brg->stok ?></td>
                    <td><?= $brg->hrg_jual ?></td>
                    <td>
                      <img src="<?= base_url('uploads/') . $brg->foto_brg ?>" width="70" height="70">
                    </td>
                    <td><?php if ($brg->id_kategori == 1) { ?>
                        Kursi
                      <?php } else if ($brg->id_kategori == 2) { ?>
                        Meja
                      <?php } else { ?>
                        Lemari
                      <?php } ?>
                    </td>
                    <td><?php if ($brg->id_status == 1) { ?>
                        Tersedia

                      <?php } else { ?>
                        Akan Datang
                      <?php } ?>
                    </td>
                    <td>
                      <div data-toggle="modal" data-target="#ubahdata<?= $brg->id_brg ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>
                    </td>
                    <td>
                      <div data-toggle="modal" data-target="#hapus" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i></div>
                    </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Ini adalah modal untuk ubah data barang  -->
  <?php
  $no = 0;
  foreach ($barang as $brg) {
    $no++ ?>
    <div class="modal fade" id="ubahdata<?= $brg->id_brg ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ubah Data Barang</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url('dashboard/ubah_data/' . $brg->id_brg); ?>" method="post">
              <input type="hidden" readonly value="<?= $brg->id_brg ?>" name="id_brg" class="form-control">
              <h6>Nama Barang</h6>
              <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Username" name="nama_brg" value="<?= $brg->nama_brg ?>">
              <h6>Jumlah Stok</h6>
              <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Nama Admin disini" name="stok" value="<?= $brg->stok ?>">
              <h6 class="mt-2">Harga Jual</h6>
              <input type="textarea" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan alamat disini" name="hrg_jual" value="<?= $brg->hrg_jual ?>">
              <h6 class="mt-2">Foto</h6>
              <input type="file" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Foto" name="foto_brg" value="<?= $brg->foto_brg ?>">
              <h6 class="mt-2">Kategori</h6>
              <div class="form-group">
                <label>Pilih Kategori</label>
                <select name="id_kategori" class="form-control">
                  <option value="<?= $brg->id_kategori ?>">
                    <?php if ($brg->id_kategori == '1') { ?>
                      Kursi
                    <?php } elseif ($brg->id_kategori == '2') { ?>
                      Meja
                    <?php } else { ?>
                      Lemari
                    <?php } ?>
                  </option>
                  <option value="1">Kursi</option>
                  <option value="2">Meja</option>
                  <option value="3">Lemari</option>
                </select>
              </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
            <input type="submit" value="Ubah Data" class="btn btn-primary">
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  <!-- Akhir -->

  <!-- Ini modal hapus data -->
  <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data Barang?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Apakah anda akan menghapus data barang?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <?php echo anchor('dashboard/hapus_data/' . $brg->id_brg, '<button class="btn btn-danger">Hapus</button>'); ?>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir -->
  <!-- Ini modal tambah data -->
  <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Pengurus</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('dashboard/tambah_data'); ?>" method="post">
            <h6 class="mt-2">Kode Barang</h6>
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Nama Barang" name="kode">
            <h6 class="mt-2">Nama Barang</h6>
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Nama Barang" name="nama_brg">
            <h6 class="mt-2">Alamat</h6>
            <input type="textarea" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Jumlah Stok" name="stok">
            <h6 class="mt-2">No Telepon</h6>
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Harga Jual Barang" name="hrg_jual">
            <h6 class="mt-2">Foto</h6>
            <input type="file" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="foto_brg">
            <h6 class="mt-2">Kategori</h6>
            <div class="form-group">
              <label>Pilih Kategori</label>
              <select name="id_kategori" class="form-control">
                <option>-- Pilih Kategori --</option>
                <option value="1">Kursi</option>
                <option value="2">Meja</option>
                <option value="3">Lemari</option>
              </select>
            </div>
            <div class="form-group">
              <label>Pilih Status</label>
              <select name="id_status" class="form-control">
                <option>-- Pilih Status --</option>
                <option value="1">Tersedia</option>
                <option value="2">Akan Datang</option>
                
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
          <input type="submit" value="Tambah" class="btn btn-primary">
          </form>
        </div>
      </div>
    </div>
  </div>