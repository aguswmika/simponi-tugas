<?php view('partial/header', $data) ?>
<link href="<?php echo base_url('plugins/fancybox/fancybox.min.css') ?>" type="text/css" rel="stylesheet">
<link href="<?php echo base_url('plugins/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('plugins/owlcarousel/assets/owl.theme.default.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('css/responsive.css') ?>" rel="stylesheet" media="only screen and (max-width: 1200px)" />

<?php view('landing/marketplace/navbar', $data) ?>
<section class="section-content bg padding-y-md">
	<div class="container">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-3-24"> <strong>Filter by:</strong> </div> <!-- col.// -->
					<div class="col-md-21-24"> 
						<ul class="list-inline">
							<li class="list-inline-item dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Tipe Supplier</a>
								<div class="dropdown-menu p-3" style="max-width:400px;"">	
								<label class="form-check">
									<a href="#">
										<input type="checkbox" class="form-check-input">Supplier Terbaik
									</a>
								</label>
								<label class="form-check">
									<a href="#">
										<input type="checkbox" class="form-check-input">Supplier Terlaris
								</label>
								<label class="form-check">
									<a href="#">
										<input type="checkbox" class="form-check-input">Supplier Terbaru
									</a>
								</label>
							</div>
						</li>
						<li class="list-inline-item dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Kota</a>
							<div class="dropdown-menu p-3" style="max-width:400px;"">	
							<label class="form-check">
								<a href="#">
									<input type="checkbox" class="form-check-input"> China
								</a>
							</label>
							<label class="form-check">
								<a href="#">
									<input type="checkbox" class="form-check-input"> Japan
								</a>
							</label>
							<label class="form-check">
								<a href="#">
									<input type="checkbox" class="form-check-input"> Uzbekistan
								</a>
							</label>
							<label class="form-check">
								<a href="#">
									<input type="checkbox" class="form-check-input"> Russia
								</a>
							</label>
						</div> <!-- dropdown-menu.// -->
					</li>
					<li class="list-inline-item"><a href="#">Tipe Produk</a></li>
					<li class="list-inline-item">
						<div class="form-inline">
							<label class="mr-2">Price</label>
							<input class="form-control form-control-sm" placeholder="Min" type="number">
							<span class="px-2"> - </span>
							<input class="form-control form-control-sm" placeholder="Max" type="number">
							<button type="submit" class="btn btn-sm ml-2 btn-success" type="submit" style="margin-top: 0px">GO</button>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
</div>
</section>

<section>
	<div class="container">
		<div class="row">
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
            <?php } ?>
        </div>
	</div>
</section>
<?php view('partial/footer') ?>
<script src="<?php echo base_url('plugins/fancybox/fancybox.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('plugins/owlcarousel/owl.carousel.min.js') ?>"></script>