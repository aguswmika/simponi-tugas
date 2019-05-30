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
            <li><a href="<?php echo base_url('control-panel/blog') ?>"><i class="fa fa-file"></i> Blog</a></li>
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
                        <form action="<?php echo base_url('control-panel/blog/update/'.Input::url(3)) ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="judul" class="form-control" value="<?php echo old('judul')===null ? $item->judul : old('judul') ?>">
                            </div>
                           
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" cols="30" rows="10" maxlength="255" class="form-control"><?php echo old('deskripsi')=== null ? $item->deskripsi : old('deskripsi') ?></textarea>
                            </div>
                            
                            <div class="form-group" id="text">
                                <label>Konten</label>
                                <textarea name="konten" id="editor" cols="30" rows="10" maxlength="255" class="form-control"><?php echo old('konten') === null ? $item->konten : old('konten') ?></textarea>
                            </div>
                           <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <?php $check = old('status') === null ? $item->status : old('status')  ?>
                                    <option value="">-- Pilih --</option>
                                    <?php foreach (getStatus() as $value => $name) {?>
                                        <option value="<?php echo $value ?>" <?php echo ($check == $value ? 'selected' : '' ) ?>><?php echo $name ?></option>
                                    <?php } ?>
                                </select>
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
        $('#text').show();
    });
</script>
