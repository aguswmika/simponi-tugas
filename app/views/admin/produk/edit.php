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
            Produk
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('control-panel/produk') ?>"><i class="fa fa-shopping-cart"></i> Produk</a></li>
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
                        <form action="<?php echo base_url('control-panel/produk/update/'.Input::url(3)) ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" value="<?php echo (old('nama') === null ? $item->nama : old('nama')) ?>">
                            </div>
                            <div class="form-group">
                                <label>Harga Jual</label>
                                <input type="number" name="harga_jual" class="form-control" value="<?php echo (old('harga_jual') === null ? $item->harga_jual : old('harga_jual')) ?>">
                            </div>
                            <div class="form-group">
                                <label>Harga Beli</label>
                                <input type="number" name="harga_beli" class="form-control" value="<?php echo (old('harga_beli') === null ? $item->harga_jual : old('harga_beli')) ?>">
                            </div>
                            <div class="form-group">
                                <label>Stok</label>
                                <input type="number" name="stok" class="form-control" value="<?php echo (old('stok') === null ? $item->stok : old('stok')) ?>">
                            </div>
                            <div class="form-group">
                                <label>Satuan</label>
                                <select name="satuan" class="form-control">
                                    <?php $check = old('satuan') === null ? $item->id_satuan  : old('satuan') ?>
                                    <option value="">-- Pilih --</option>
                                    <?php foreach ($satuan as $k) {?>
                                        <option value="<?php echo $k->id ?>" <?php echo ($check == $k->id ? 'selected' : '' ) ?>><?php echo $k->nama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kategori Produk</label>

                                <select name="kategoriproduk" class="form-control">
                                    <?php $check = old('kategoriproduk') === null ? $item->id_kategori_produk  : old('satuan') ?>
                                    <option value="">-- Pilih --</option>
                                    <?php foreach ($kategoriproduk as $k) {?>
                                        <option value="<?php echo $k->id ?>" <?php echo ($check == $k->id ? 'selected' : '' ) ?>><?php echo $k->nama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Foto</label><br>
                                <?php echo (!empty($item->thumbnail_foto) ? '<img style="max-width: 250px;" src="'.base_url($item->thumbnail_foto).'" alt=""><br>' : '') ?>
                                <div class="text-foto">
                                    <b>Nama File:</b> <span id="namaFoto"></span>
                                </div>
                                <div class="upload-btn-wrapper">
                                    <button class="btn btn-info btn-xs" id="labelFoto">Tambahkan foto</button>
                                    <input type="file" id="inputFoto" name="foto" accept=".png, .jpg, .jpeg" />
                                </div>
                            </div>
                             <div class="form-group">
                                <label>Gallery</label>
                                <?php echo (!empty($item->gallery_foto) ? '<img style="max-width: 250px;" src="'.base_url($item->gallery_foto).'" alt=""><br>' : '') ?>
                                <div class="text-foto">
                                    <b>Nama File:</b> <span id="namaFoto2"></span>
                                </div>
                                <div class="upload-btn-wrapper">
                                    <button class="btn btn-info btn-xs" id="labelFoto2">Tambahkan foto</button>
                                    <input type="file" id="inputFoto2" name="gallery[]" accept=".png, .jpg, .jpeg" multiple="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Edit</button>
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