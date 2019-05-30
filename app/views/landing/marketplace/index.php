<?php view('partial/header', $data) ?>
<link href="<?php echo base_url('plugins/fancybox/fancybox.min.css') ?>" type="text/css" rel="stylesheet">
<link href="<?php echo base_url('plugins/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('plugins/owlcarousel/assets/owl.theme.default.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('css/responsive.css') ?>" rel="stylesheet" media="only screen and (max-width: 1200px)" />

<?php view('landing/marketplace/navbar', $data) ?>
<section>
	<div class="container">
		<div class="row">
            <?php if($produk === false) {?>
                <h3>Belum ada produk</h3>
            <?php }else{ ?>
            <?php foreach($produk as $item){ ?>
                <div class="col-md-4">
                    <figure class="card card-product">
                        <div class="img-wrap"><img src="<?php echo base_url($item->thumbnail_foto) ?>"></div>
                        <figcaption class="info-wrap">
                            <h4 class=""><?php echo $item->nama ?></h4>
                            <p class="desc"><?php echo $item->deskripsi ?></p>
                            <div class="rating-wrap">
                                <ul class="rating-stars">
                                    <li style="width: <?php echo rand(0, 100) ?>%" class="stars-active">
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    </li>
                                </ul>
                                <div class="label-rating"><?php echo rand(1, 500) ?> reviews</div>
                                <div class="label-rating"><?php echo rand(1, 100) ?> orders </div>
                            </div>
                        </figcaption>
                        <div class="bottom-wrap">
                            <a href="<?php echo base_url('produk/'.$item->slug) ?>" class="btn btn-sm btn-success float-right">Pesan Sekarang</a>
                            <div class="price-wrap h5">
                                <span class="price-new">Rp <?php echo number_format($item->harga_jual, 2, ',', '.')?></span> <!-- <del class="price-old">$1980</del> -->
                            </div>
                        </div>
                    </figure>
                </div>
            <?php }} ?>

        </div>
	</div>
</section>
<?php view('partial/footer') ?>
<script src="<?php echo base_url('plugins/fancybox/fancybox.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('plugins/owlcarousel/owl.carousel.min.js') ?>"></script>