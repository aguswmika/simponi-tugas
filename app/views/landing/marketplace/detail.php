<?php view('partial/header', $data) ?>
<link href="<?php echo base_url('plugins/fancybox/fancybox.min.css') ?>" type="text/css" rel="stylesheet">
<link href="<?php echo base_url('plugins/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('plugins/owlcarousel/assets/owl.theme.default.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('css/ui.css') ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('css/responsive.css') ?>" rel="stylesheet" media="only screen and (max-width: 1200px)" />

<?php view('landing/marketplace/navbar', $data) ?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-xl-10 col-md-9 col-sm-12">
				<div class="card">
					<div class="row no-gutters">
						<aside class="col-sm-5 border-right">
							<article class="gallery-wrap"> 
								<div class="img-big-wrap">
									<div> <a href="<?php echo base_url('img/2.jpg') ?>" data-fancybox=""><img src="<?php echo base_url('img/2.jpg') ?>"></a></div>
								</div>
								<div class="img-small-wrap">
                                    <div class="item-gallery"> <a href="<?php echo base_url('img/2.jpg') ?>" data-fancybox=""><img src="<?php echo base_url('img/2.jpg') ?>"></a></div>
                                    <div class="item-gallery"> <a href="<?php echo base_url('img/3.jpg') ?>" data-fancybox=""><img src="<?php echo base_url('img/3.jpg') ?>"></a></div>
                                    <div class="item-gallery"> <a href="<?php echo base_url('img/1.jpg') ?>" data-fancybox=""><img src="<?php echo base_url('img/1.jpg') ?>"></a></div>
                                    <div class="item-gallery"> <a href="<?php echo base_url('img/1.jpg') ?>" data-fancybox=""><img src="<?php echo base_url('img/1.jpg') ?>"></a></div>
								</div> 
							</article>
						</aside>
						<aside class="col-sm-7">
							<article class="p-5">
								<h3 class="">nama Produk</h3>

								<div class="mb-3"> 
									<var class="price h3 text-warning"> 
										<span class="currency">Rp </span><span class="num">15.000,00</span>
									</var> 
									<span>/per bijik</span> 
								</div> <!-- price-detail-wrap .// -->
								<dl>
									<dt>Deskripsi Barang</dt>
									<dd><p>Here goes description consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco </p></dd>
								</dl>
								<dl class="row">
									<dt class="col-sm-3">KodeBarang#</dt>
									<dd class="col-sm-9">12345611</dd>

									<dt class="col-sm-3">Warna</dt>
									<dd class="col-sm-9">Black and white </dd>

									<dt class="col-sm-3">Dikirim dari</dt>
									<dd class="col-sm-9">Russia, USA, and Europe </dd>
								</dl>
								<div class="rating-wrap">

									<ul class="rating-stars">
										<li style="width:80%" class="stars-active"> 
											<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
											<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
											<i class="fa fa-star"></i> 
										</li>
										<li>
											<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
											<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
											<i class="fa fa-star"></i> 
										</li>
									</ul>
									<div class="label-rating">132 reviews</div>
									<div class="label-rating">154 orders </div>
								</div> <!-- rating-wrap.// -->
								<hr>
								<div class="row">
									<div class="col-sm-5">
										<dl class="dlist-inline">
											<dt>Jumlah: </dt>
											<dd> 
												<select class="form-control form-control-sm" style="width:70px;">
													<option> 1 </option>
													<option> 2 </option>
													<option> 3 </option>
												</select>
											</dd>
										</dl> 
									</div>
								</div>
								<hr>
								<a href="<?php echo base_url('shopping-cart') ?>" class="btn  btn-success">Beli sekarang</a>
								<a href="#" class="btn  btn-outline-success"> <i class="fas fa-shopping-cart text-dark"></i> Add to cart </a>
							</article> 
						</aside>
					</div>
				</div>
			</div>
			<aside class="col-xl-2 col-md-3 col-sm-12">
				<div class="card">
					<div class="card-header">
						Lihat ini juga
					</div>
					<div class="card-body row" style="">
						<div class="col-md-12 col-sm-3">
							<figure class="item border-bottom">
								<a href="#" class="img-wrap mb-2"> <img src="<?php echo base_url('img/2.jpg') ?>" class="img-md"></a>
								<figcaption class="info-wrap">
									<a href="#" class="">Nama Produk</a>
									<div class="price-wrap mb-4">
										<span class="price-new">Rp 12.000</span>
									</div> <!-- price-wrap.// -->
								</figcaption>
							</figure> <!-- card-product // -->
						</div> <!-- col.// -->
						<div class="col-md-12 col-sm-3">
							<figure class="item border-bottom">
								<a class="img-wrap mb-1"> <img src="<?php echo base_url('img/3.jpg') ?>" class="img-md"></a>
								<figcaption class="info-wrap">
									<a href="#" href="#" class="">Nama Produk</a>
									<div class="price-wrap mb-4">
										<span class="price-new">Rp 15.000</span>
									</div> <!-- price-wrap.// -->
								</figcaption>
							</figure> <!-- card-product // -->
						</div> <!-- col.// -->
					</div> <!-- card-body.// -->
				</div> <!-- card.// -->
			</aside> <!-- col // -->
		</div>
	</div>
</div>
<div class="container">
	<article class="card mt-3">
		<div class="card-body">
			<h4>Detail Barang</h4>
			<p>	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi deserunt mollit anim id est laborum.</p>
			<p>	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteurididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<p>	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<p>	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
	</article>
</div>
</section>
<?php view('partial/footer') ?>
<script src="<?php echo base_url('plugins/fancybox/fancybox.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('plugins/owlcarousel/owl.carousel.min.js') ?>"></script>
