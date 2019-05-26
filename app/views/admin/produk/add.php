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
        .text-foto2{
            display: none;
        }

    </style>
    <section class="content-header">
        <h1>
             Produk
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('control-panel/produk') ?>"><i class="fa fa-tag"></i> Produk</a></li>
            <li class="active">Tambah</li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header">
                        <h1 class="box-title">Tambah</h1>
                    </div>
                    <div class="box-body">
                        <?php echo Session::flash('error'); ?>
                        <form action="<?php echo base_url('control-panel/produk/create') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" value="<?php echo old('nama') ?>">
                            </div>
                            <div class="form-group">
                                <label>Harga Jual</label>
                                <input type="text" name="hargajual" class="form-control" value="<?php echo old('harga_jual') ?>">
                            </div>
                            <div class="form-group">
                                <label>Harga Beli</label>
                                <input type="text" name="hargajual" class="form-control" value="<?php echo old('harga_beli') ?>">
                            </div>
                            <div class="form-group">
                                <label>Stok</label>
                                <input type="number" name="stok" class="form-control" value="<?php echo old('stok') === null ? 0 : old('stok') ?>">
                            </div>
                            <div class="form-group">
                                <label>Satuan</label>
                                <select name="satuan" class="form-control">
                                    <?php $check = old('satuan') ?>
                                    <option value="">-- Pilih --</option>
                                    <?php foreach ($satuan as $item) {?>
                                        <option value="<?php echo $item->id ?>" <?php echo ($check == $item->id ? 'selected' : '' ) ?>><?php echo $item->nama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kategori Produk</label>
                                <select name="kategoriproduk" class="form-control">
                                    <?php $check = old('kategoriproduk')  ?>
                                    <option value="">-- Pilih --</option>
                                    <?php if($kategoriproduk !== false) {?>
                                        <?php foreach ($kategoriproduk as $item) {?>
                                            <option value="<?php echo $item->id ?>" <?php echo ($check == $item->id ? 'selected' : '' ) ?>><?php echo $item->nama ?></option>
                                        <?php } ?>
                                    <?php } ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Thumbnail Foto</label><br>
                                <div class="text-foto">
                                    <b>Nama File:</b> <span id="namaFoto"></span>
                                </div>
                                <div class="upload-btn-wrapper">
                                    <button class="btn btn-info btn-xs" id="labelFoto">Tambahkan foto</button>
                                    <input type="file" id="inputFoto" name="foto" accept=".png, .jpg, .jpeg" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Gallery Foto</label><br>
                                <div class="text-foto2">
                                    <b>Nama File:</b> <span id="namaFoto2"></span>
                                </div>
                                <div class="upload-btn-wrapper">
                                    <button class="btn btn-info btn-xs" id="labelFoto2">Tambahkan foto</button>
                                    <input type="file" id="inputFoto2" name="foto[]" accept=".png, .jpg, .jpeg" multiple=""  />
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
        });

        $('#inputFoto2').change(function(event){
            var total_file=document.getElementById("inputFoto2").files.length;
            var url = '';
            var label = $('#labelFoto2');
            var nama  = $('#namaFoto2');
            for(var i=0;i<total_file;i++)
            {
            // $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'><br>");
                url += ', '+event.target.files[i].name;
            }
            if(total_file != 0){
                label.text('Ganti foto');
                label.removeClass('btn-info');
                label.addClass('btn-warning');
                nama.text(url.substring(2));
                $('.text-foto2').show();
                
            }else{
                label.text('Tambahkan foto');
                label.addClass('btn-info');
                label.removeClass('btn-warning');
                nama.text('');
                $('.text-foto2').hide();
            }
        });
    });
</script>
