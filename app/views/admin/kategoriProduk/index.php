<?php view('admin/partial/header', $data) ?>
    <section class="content-header">
        <h1>
            Kategori Produk
        </h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-tag"></i> Kategori Produk</a></li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="box">
            <div class="box-header">
                <h1 class="box-title">List</h1>
            </div>
            <div class="box-body">
              <?php echo $tabel; ?>
            </div>
        </div>
        <!-- disini taruh kontennya anjing  -->
    </section>
<?php view('admin/partial/footer', $data) ?>