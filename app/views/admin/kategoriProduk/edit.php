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
            Kategori Produk
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('control-panel/kategori-produk') ?>"><i class="fa fa-tag"></i> Kategori Produk</a></li>
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
                        <form action="<?php echo base_url('control-panel/kategori-produk/create') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" value="<?php echo old('nama') ?>">
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

