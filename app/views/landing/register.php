<?php view('admin/partial/header', $data) ?>
	<div class="login-box">
		<div class="login-logo">
			<a href="<?php echo base_url() ?>"><img src="<?php echo base_url('img/logo.png') ?>" style="max-width: 50px" alt=""></a>
		</div>
		<div>
        	<?php echo Session::flash('error'); ?>
      	</div>
		
		<div class="login-box-body">
			<p class="login-box-msg">Register untuk mendapatkan akun</p>

			<form action="<?php echo base_url('doregister') ?>" method="post" enctype="multipart/form-data">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Nama Depan" name="nama_depan">
					<span class="form-control-feedback"><i class="fa fa-user"></i></span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Nama Belakang" name="nama_belakang">
					<span class="form-control-feedback"><i class="fa fa-user"></i></span>
				</div>
				<div class="form-group has-feedback">
					<label class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="jenis_kelamin" value="l">
						<span class="form-check-label"> Laki-laki </span>
					</label>
					<label class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="jenis_kelamin" value="p">
						<span class="form-check-label"> Perempuan </span>
					</label>
				</div>
				<div class="form-group has-feedback">
					<input type="date" class="form-control" placeholder="Kalender" name="tgl_lahir">
					<span class="form-control-feedback"><i class="fa fa-calendar"></i></span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Username" name="username">
					<span class="form-control-feedback"><i class="fa fa-users"></i></span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Email" name="email">
					<span class="form-control-feedback"><i class="fa fa-envelope"></i></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Password" name="password">
					<span class="form-control-feedback"><i class="fa fa-lock"></i></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Repeat Password" name="repassword">
					<span class="form-control-feedback"><i class="fa fa-lock"></i></span>
				</div>
				<div class="row">
					<div class="col-xs-8">
						<div class="upload-btn-wrapper">
							<input type="file" id="inputFoto" name="foto" accept=".png, .jpg, .jpeg" />
						</div>
					</div>
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
					</div>
				</div>
			</form>
		</div>
		<!-- /.login-box-body -->
		<div class="text-center" style="display: block;margin-top: 10px;">
			<a href="<?php echo base_url('login') ?>">Sudah regis? login dulu</a>
		</div>
	</div>
	<!-- /.login-box -->
<?php view('admin/partial/footer', $data) ?>
<script>
  $(function () {
	$('input').iCheck({
	  checkboxClass: 'icheckbox_square-blue',
	  radioClass: 'iradio_square-blue',
	  increaseArea: '20%' /* optional */
	});
  });
  $(document).ready(function() {
    $('#datePicker')
        .datepicker({
            format: 'mm/dd/yyyy'
        })
});
</script>