<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Data Barang</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Barang</h1>
			</div>
		</div><!--/.row-->

		<div class="panel panel-container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Tabel Barang
						<ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
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
							<th scope="col">Nama Barang</th>
							<th scope="col">Stok</th>
							<th scope="col">Harga Jual</th>
							<th scope="col">Foto</th>
							<th scope="col">Kategori</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php
							$no = 1;
							foreach($barang as $brg){
							?>
							<th scope="row"><?= $no++?></th>
							<td><?= $brg->nama_brg?></td>
							<td><?= $brg->stok?></td>
							<td><?= $brg->hrg_jual?></td>
							<td>
                        		<img src="<?= base_url('uploads/').$brg->foto_brg?>" width="70" height="70">
							</td>
							<td><?= $brg->id_kategori?></td>
						</tr>
							<?php }?>
					</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
</div>
