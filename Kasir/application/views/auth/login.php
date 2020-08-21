<div class="row">
	<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">Login</div>
			<div class="panel-body">
				<?= $this->session->flashdata('message'); ?>
				<form action="<?= base_url('auth'); ?>" method="post">
					<fieldset>
						<div class="form-group">
							<input type="text" class="form-control form-control-user" id="username" name="username" required placeholder="Username" value="<?= set_value('username'); ?>">
							<?= form_error('email', ' <small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Password" name="password" type="password" required>
						</div>



						<br>
						<td><input type="submit" class="btn btn-primary btn-user btn-block" value="Masuk"></td>
					</fieldset>
				</form>
			</div>
		</div>
	</div><!-- /.col-->
</div><!-- /.row -->