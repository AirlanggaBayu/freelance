<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard'); ?>">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active"><?= $title; ?></li>
        </ol>
    </div>
    <!-- /.row -->
    <!-- /.card-header -->
    <div class="panel panel-container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?= $title; ?>
                        <!-- Button Add Data -->
                        <ul class="pull-right panel-settings panel-button-tab-right">
                            <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
                                    <em class="fa fa-cogs"></em>
                                </a>
                            </li>
                        </ul>
                        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                    </div>
                    <div class="panel-body">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-info" data-toggle="modal" data-target="#addmodal"><em class="fa fa-plus-circle"></em> Add Data</button>
                            </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Menu</th>
                                    <th class="text-center">Icon</th>
                                    <th class="text-center">Url</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($menu as $m) :
                                    $id = $m['id_menu'];
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $i; ?></td>
                                        <td><?= $m['menu']; ?></td>
                                        <td class="text-center"><em class="<?= $m['icon']; ?>">&nbsp;</em></td>
                                        <td><?= $m['url']; ?></td>
                                        <?php if ($m['is_active'] == 1) { ?>
                                            <td class="text-center"> <span class="badge bg-green">active</span></td>
                                        <?php } else { ?>
                                            <td class="text-center"> <span class="badge bg-secondary">disable</span></td>
                                        <?php } ?>
                                        <td class="text-center">
                                            <button class="btn btn-info" data-toggle="modal" data-target="#modaledit<?= $m['id_menu']; ?>">Edit</button>
                                            <?php if ($m['id_menu'] == 1 || $m['id_menu'] == 2 || $m['id_menu'] == 4) { ?>
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#modalhapus<?= $m['id_menu']; ?>" disabled>Hapus</button>
                                            <?php } else { ?>
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#modalhapus<?= $m['id_menu']; ?>">Hapus</button>
                                            <?php } ?>
                                            <?php if ($m['is_active'] != 1) { ?>
                                                <a href="<?= base_url('menu/active/' . $id); ?>" class="btn btn-success">Activate</a>
                                            <?php } else { ?>
                                                <?php if ($m['id_menu'] == 4) { ?>
                                                    <span hidden><a href="<?= base_url('menu/disable/' . $id); ?>" class="btn btn-warning">Disable</a></span>
                                                <?php } else { ?>
                                                    <a href="<?= base_url('menu/disable/' . $id); ?>" class="btn btn-warning">Disable</a>
                                                <?php } ?>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <!-- <?= $i++; ?> -->
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Menu</th>
                                    <th class="text-center">Icon</th>
                                    <th class="text-center">Url</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- Modal Add Data -->
    <div class="modal fade" tabindex="-1" role="dialog" id="addmodal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('menu'); ?>" method="POST">
                        <div class="form-group">
                            <label for="menu">Nama Menu</label>
                            <input type="text" class="form-control" name="menu" id="menu" aria-describedby="emailHelp" placeholder="Nama menu..." <?= set_value('menu'); ?>>
                            <?= form_error('menu', '<small class="text-danger col-md">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="text" class="form-control" name="icon" id="icon" aria-describedby="emailHelp" placeholder="Icon menu..." <?= set_value('icon'); ?>>
                            <?= form_error('icon', '<small class="text-danger col-md">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="url">Url</label>
                            <input type="text" class="form-control" name="url" id="url" aria-describedby="emailHelp" placeholder="Url menu..." <?= set_value('url'); ?>>
                            <small class="text-danger">Jika anda tidak mengisikan url, otomatis menunya berbentuk dropdown.</small>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Add Data -->

    <?php foreach ($menu as $m) : ?>
        <!-- Modal Delete Data -->
        <div class="modal fade" tabindex="-1" role="dialog" id="modalhapus<?= $m['id_menu']; ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('menu/deletemenu'); ?>" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="id" value="<?= $m['id_menu']; ?>">
                            <p>Apakah anda yakin ingin menghapus data ini ? <b><?= $m['menu']; ?></b></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal Delete Data -->

        <!-- Modal Edit Data -->
        <div class="modal fade" tabindex="-1" role="dialog" id="modaledit<?= $m['id_menu']; ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('menu/editmenu'); ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $m['id_menu']; ?>">
                            <div class="form-group">
                                <label for="menu">Nama Menu</label>
                                <input type="text" class="form-control" name="menu" id="menu" value="<?= $m['menu']; ?>" aria-describedby="emailHelp" placeholder="Nama menu..." <?= set_value('menu'); ?>>
                                <?= form_error('menu', '<small class="text-danger col-md">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="icon">Icon</label>
                                <input type="text" class="form-control" name="icon" id="icon" value="<?= $m['icon']; ?>" aria-describedby="emailHelp" placeholder="Icon menu..." <?= set_value('icon'); ?>>
                                <?= form_error('icon', '<small class="text-danger col-md">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="url">Url</label>
                                <input type="text" class="form-control" name="url" id="url" value="<?= $m['url']; ?>" aria-describedby="emailHelp" placeholder="Url menu..." <?= set_value('url'); ?>>
                                <small class="text-danger">Jika anda tidak mengisikan url, otomatis menunya berbentuk dropdown.</small>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Edit Data -->
    <?php endforeach; ?>