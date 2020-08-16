<div class="container mt-4">
<?php foreach($barang as $brg){?>
    <h5 class="text-produk"><?= $brg->nama_brg?></h5>
    <div class="row mb-4">
        <div class="col col-lg-4">
            <img class=" dtl" src="<?= base_url('uploads/').$brg->foto_brg?>" alt="">
        </div>
        <div class="col col-lg-4">
            <div class="row">
                <div class="col">
                    <ul class="list-unstyled">
                        <li class="detail-text">Kode Barang</li>
                        <li class="detail-text">Nama Barang</li>
                    </ul>
                </div>
                <div class="col">
                    <ul class="list-unstyled">
                        <li class="detail-text"><?= $brg->id_brg ?></li>
                        <li class="detail-text"><?= $brg->nama_brg?></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
<?php } ?>
    <h4>Produk Lainnya</h4>
      <?php foreach($barang as $brg){?>
        <div class="row mt-4">

          <div class="col-lg-3 col-md-4 mb-4">
            <div class="card">
              <a href="#"><img class="card-img-top gambar" src="<?= base_url('uploads/').$brg->foto_brg?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="<?= base_url('home/detail_barang/'.$brg->id_brg)?>"><?= $brg->nama_brg?></a>
                </h4>
                <h6>Harga hubungi kami</h6>
              </div>
              <div class="card-footer">
                <p class="stok">Sisa Stok : <?= $brg->stok?></p>
              </div>
              
            </div>
          </div>

        </div>
      <?php }?>

</div>