<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">Daftar Admin Baru</div>
            <div class="panel-body">
                <form role="form" method="post" action="<?= base_url('auth/register'); ?>">
                    <fieldset>

                        <div class="form-group">
                            <input class="form-control" placeholder="Nama" name="nama_adm" type="text" autofocus="">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Username" name="usnm" type="text" autofocus="">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="psw_adm" type="password" value="">
                        </div>
                        <a href="<?= base_url('auth'); ?>">Sudah punya akun? Login</a>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Buat akun
                        </button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->