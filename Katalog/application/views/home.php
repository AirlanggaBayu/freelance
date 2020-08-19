<section>
<<<<<<< HEAD
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
=======
<div id="carouselExampleControls" class="carousel-sm slide" data-ride="carousel">
>>>>>>> eff5438912b8287bc3353828d0862deb02d5c30d
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="http://placehold.it/900x350" class="d-block w-100 " >
            </div>
            <div class="carousel-item">
            <img src="http://placehold.it/900x350" class="d-block w-100 " >
            </div>
            <div class="carousel-item">
            <img src="http://placehold.it/900x350" class="d-block w-100 " >
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
</section>


<div class="container mt-4">
<div class="col">

<<<<<<< HEAD
  <center><h4 class="text-produk">Produk Kami</h4></center>
        <?php foreach($barang as $brg){?>
        <div class="row mt-4">

          <div class="col-lg-3 col-md-4 mb-4">
=======
  <center><p class="text-produk">Produk Kami</p></center>
        <?php foreach($barang as $brg){?>
        <div class="row mt-4">

          <div class="col-lg-3 col-sm-2 mb-4">
>>>>>>> eff5438912b8287bc3353828d0862deb02d5c30d
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
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->