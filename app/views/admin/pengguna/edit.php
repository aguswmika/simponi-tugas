<?php view('admin/partial/header', $data) ?>
    <style>
        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .upload-btn-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }

        .text-foto{
            display: none;
        }

    </style>
    <section class="content-header">
        <h1>
            Pengguna
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('control-panel/pengguna') ?>"><i class="fa fa-users"></i> Pengguna</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h1 class="box-title">Edit</h1>
                    </div>
                    <div class="box-body">
                        <?php echo Session::flash('error'); ?>
                        <form action="<?php echo base_url('control-panel/pengguna/update/'.Input::url(3)) ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Depan</label>
                                <input type="text" name="nama_depan" class="form-control" value="<?php echo (old('nama_depan') === null ? $item->nama_depan : old('nama_depan')) ?>">
                            </div>
                            <div class="form-group">
                                <label>Nama Belakang</label>
                                <input type="text" name="nama_belakang" class="form-control" value="<?php echo (old('nama_belakang') === null ? $item->nama_belakang : old('nama_belakang')) ?>">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    <?php $jk = (old('jenis_kelamin') === null ? $item->jenis_kelamin : old('jenis_kelamin')) ?>
                                    <option value="l" <?php echo ($jk === 'l' ? 'selected' : '' ) ?>>Laki-laki</option>
                                    <option value="p" <?php echo ($jk === 'p' ? 'selected' : '' ) ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" value="<?php echo (old('tgl_lahir') === null ? $item->tgl_lahir : old('tgl_lahir')) ?>">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo (old('email') === null ? $item->email : old('email')) ?>">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo (old('username') === null ? $item->username : old('username')) ?>">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label>Foto</label><br>
                                <?php echo (!empty($item->foto) ? '<img style="max-width: 250px;" src="'.base_url($item->foto).'" alt=""><br>' : '') ?>
                                <div class="text-foto">
                                    <b>Nama File:</b> <span id="namaFoto"></span>
                                </div>
                                <div class="upload-btn-wrapper">
                                    <button class="btn btn-info btn-xs" id="labelFoto">Tambahkan foto</button>
                                    <input type="file" id="inputFoto" name="foto" accept=".png, .jpg, .jpeg" />
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- disini taruh kontennya anjing  -->
    </section>
<?php view('admin/partial/footer', $data) ?>
<script>
	$(document).ready(function(){
		$('#inputFoto').change(function(){
			var foto  = $(this)[0].files[0],
				label = $('#labelFoto'),
				nama  = $('#namaFoto');

			if(typeof foto != 'undefined'){
				if(foto.size > 0){
					label.text('Ganti foto');
					label.removeClass('btn-info');
					label.addClass('btn-warning');
					nama.text(foto.name);
					$('.text-foto').show();
				}
			}else{
				label.text('Tambahkan foto');
				label.addClass('btn-info');
				label.removeClass('btn-warning');
				nama.text('');
				$('.text-foto').hide();
			}
		})
	});
</script>
