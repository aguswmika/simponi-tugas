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
            Edukasi
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('control-panel/edukasi') ?>"><i class="fa fa-users"></i> Edukasi</a></li>
            <li class="active">Tambah</li>
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
                        <form action="<?php echo base_url('control-panel/edukasi/update/'.Input::url(3)) ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="judul" class="form-control" value="<?php echo old('judul')===null ? $item->judul : old('judul') ?>">
                            </div>
                            <div class="form-group">
                                <label>Urutan</label>
                                <input type="number" name="urutan" class="form-control" value="<?php echo old('urutan') === null ? $item->urutan : old('urutan') ?>">
                            </div>
                            <div class="form-group">
                                <label>Jenis Pembelajaran</label>
                                <?php $check = (old('jenis_pembelajaran') === null ? $item->tipe_pembelajaran :  old('jenis_pembelajaran'))
                                ?>
                                <div>
                                    <label style="font-weight: normal">
                                        <input type="radio" name="jenis_pembelajaran" value="text" <?php echo ($check === 'text' ? 'checked' : '' ) ?>> Text
                                    </label>
                                </div>
                                <div>
                                    <label style="font-weight: normal">
                                        <input type="radio" name="jenis_pembelajaran" value="video" <?php echo ($check === 'video' ? 'checked' : '' ) ?>> Video
                                    </label>
                                </div>

                            </div>
                            <div id="text" <?php echo ($check === 'video ' ? 'style="display: none"' : '' ) ?>>
                                <div class="form-group" >
                                    <label>Konten Text</label>
                                    <textarea name="konten" id="editor" cols="30" rows="10" maxlength="255" class="form-control"><?php echo old('konten') === null ? $item->konten : old('konten') ?></textarea>
                                </div>
                            </div>
                            <div id="video" <?php echo ($check === 'text' ? 'style="display: none"' : '' ) ?>>
                                <div class="form-group">
                                    <label>Konten Video</label>
                                    <input type="text" name="video" class="form-control" value="<?php echo old('video')===null ? $item->konten  : old('konten') ?>" placeholder="https://youtube.com/xHasjkn2">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="deskripsi" cols="30" rows="10" maxlength="255" class="form-control"><?php echo old('deskripsi')=== null ? $item->deskripsi : old('deskripsi') ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Kategori Pembelajaran</label>
                                <select name="kategori" class="form-control">
                                    <?php $check = old('kategori') === null ? $item->id_kategori_pembelajaran  : old('kategori') ?>
                                    <option value="">-- Pilih --</option>
                                    <?php foreach ($kategori as $k) {?>
                                        <option value="<?php echo $k->id ?>" <?php echo ($check == $k->id ? 'selected' : '' ) ?>><?php echo $k->nama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                           <div class="form-group">
                                <label>Status</label>
                                <?php $check = (old('status') === null ? $item->status :  old('status'))
                                ?>
                                <div>
                                    <label style="font-weight: normal">
                                        <input type="radio" name="status" value="aktif" <?php echo ($check === 'aktif' ? 'checked' : '' ) ?>> Aktif
                                    </label>
                                </div>
                                <div>
                                    <label style="font-weight: normal">
                                        <input type="radio" name="status" value="nonaktif" <?php echo ($check === 'nonaktif' ? 'checked' : '' ) ?>> nonaktif
                                    </label>
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
<script src="<?php echo base_url('bower_components/ckeditor/ckeditor.js') ?>"></script>
<script src="<?php echo base_url('ckfinder/ckfinder.js') ?>"></script>

<script>
    $(document).ready(function(){
        editor = CKEDITOR.replace('editor');
        CKFinder.setupCKEditor( editor );

        $('input[name="jenis_pembelajaran"]').change(function () {
            if($(this).val() === 'video'){
                $('#text').hide();
                $('#video').show();
            }else{
                $('#video').hide();
                $('#text').show();
            }
        });
    });
</script>
