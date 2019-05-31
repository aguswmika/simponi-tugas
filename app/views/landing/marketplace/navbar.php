<header>
    <section class="header-main shadow-sm">
        <div class="container-fluid">
            <div class="row-sm align-items-center">
                <div class="col-lg-4-24 col-sm-3">
                    <div class="category-wrap dropdown py-1">
                        <button type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Kategori</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Alat Tanam </a>
                            <a class="dropdown-item" href="#">Bahan Tanam </a>
                            <a class="dropdown-item" href="#">Bibit </a>
                            <a class="dropdown-item" href="#">Buku Pedoman </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-11-24 col-sm-8">
                    <form action="#" class="py-1">
                        <div class="input-group w-100">
                            <select class="custom-select"  name="category_name">
                                <option value="">All type</option>
                                <option value="">Special</option>
                                <option value="">Only best</option>
                                <option value="">Latest</option>
                            </select>
                            <input type="text" class="form-control" style="width:50%;" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit" style="margin-top: 0px">
                                    <i class="fa fa-search"></i> Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-9-24 col-sm-12">
                    <div class="widgets-wrap float-right row no-gutters py-1">
                        <div class="col-auto">
                            <a href="<?php echo base_url('keranjang') ?>" class="widget-header">
                                <div class="icontext">
                                    <div class="icon-wrap"><i class="text-success icon-sm fa fa-shopping-cart"></i></div>
                                    <div class="text-wrap text-dark">
                                        <span class="small round badge badge-secondary"><?php echo $jml_keranjang ?></span><br>
                                        Keranjang
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="#" class="widget-header">
                                <div class="icontext">
                                    <div class="icon-wrap"><i class="text-success icon-sm  fa fa-heart"></i></div>
                                    <div class="text-wrap text-dark">
                                        <span class="small round badge badge-secondary">0</span><br>
                                        <div>Wishlist</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</header>