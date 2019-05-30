<?php view('admin/partial/header', $data) ?>
    <section class="content-header">
        <h1>
            Produk
        </h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-shopping-cart"></i>Produk</a></li>
        </ol>
    </section>
    <section class="container-fluid">
        <?php echo Session::flash('error'); ?>
    </section>
    <section class="content container-fluid">
        <div class="box">
            <div class="box-header">
                <h1 class="box-title">List</h1>
            </div>
            <div class="box-body">
              <a href="<?php echo base_url('control-panel/produk/add') ?>" class="btn btn-info" style="margin-bottom: 25px;">Tambah</a>
               <?php echo $tabel; ?>
            </div>
        </div>
        <!-- disini taruh kontennya anjing  -->
    </section>
<?php view('admin/partial/footer', $data) ?>