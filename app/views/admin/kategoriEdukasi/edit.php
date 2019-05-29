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
            Kategori Pembelajaran
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('control-panel/kategori-edukasi') ?>"><i class="fa fa-tag"></i> Kategori Pembelajaran</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header">
                        <h1 class="box-title">Edit</h1>
                    </div>
                    <div class="box-body">
                        <?php echo Session::flash('error'); ?>
                        <form action="<?php echo base_url('control-panel/kategori-edukasi/update/'.Input::url(3)) ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" value="<?php echo old('nama') === null ? $item->nama : old('nama') ?>">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Kategori</label>
                                <textarea name="deskripsi" class="form-control" rows ="3" value="<?php echo old('deskripsi') === null ? $item->deskripsi : old('deskripsi') ?>"></textarea>
                            </div>
                             <div class="form-group">
                                <label>Foto</label><br>
                                <?php echo (!empty($item->icon) ? '<img style="max-width: 250px;" src="'.base_url($item->icon).'" alt=""><br>' : '') ?>
                                <div class="text-foto">
                                    <b>Nama File:</b> <span id="namaFoto"></span>
                                </div>
                                <div class="upload-btn-wrapper">
                                    <button class="btn btn-info btn-xs" id="labelFoto">Tambahkan icon</button>
                                    <input type="file" id="inputFoto" name="icon" accept=".png, .jpg, .jpeg" />
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

