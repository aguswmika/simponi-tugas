<?php view('partial/header', $data) ?>
<link href="<?php echo base_url('plugins/fancybox/fancybox.min.css') ?>" type="text/css" rel="stylesheet">
<link href="<?php echo base_url('plugins/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('plugins/owlcarousel/assets/owl.theme.default.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('css/responsive.css') ?>" rel="stylesheet" media="only screen and (max-width: 1200px)" />

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
						<div class="widget-header dropdown">
							<a href="#" data-toggle="dropdown" data-offset="20,10">
								<div class="icontext">
									<div class="icon-wrap"><i class="text-success icon-sm fa fa-user"></i></div>
									<div class="text-wrap text-dark">
										Sign in <br>
										My account <i class="fa fa-caret-down"></i>
									</div>
								</div>
							</a>
							<div class="dropdown-menu">
								<form class="px-4 py-3">
									<div class="form-group">
										<label>Email address</label>
										<input type="email" class="form-control" placeholder="email@example.com">
									</div>
									<div class="form-group">
										<label>Password</label>
										<input type="password" class="form-control" placeholder="Password">
									</div>
									<button type="submit" class="btn btn-primary">Sign in</button>
								</form>
								<hr class="dropdown-divider">
								<a class="dropdown-item" href="#">Have account? Sign up</a>
								<a class="dropdown-item" href="#">Forgot password?</a>
							</div>
						</div> 
					</div>
					<div class="col-auto">
						<a href="#" class="widget-header">
							<div class="icontext">
								<div class="icon-wrap"><i class="text-success icon-sm fa fa-shopping-cart"></i></div>
								<div class="text-wrap text-dark">
									Order <br> Protection 
								</div>
							</div>
						</a>
					</div>
					<div class="col-auto">
						<a href="#" class="widget-header">
							<div class="icontext">
								<div class="icon-wrap"><i class="text-success icon-sm  fa fa-heart"></i></div>
								<div class="text-wrap text-dark">
									<span class="small round badge badge-secondary">0</span>
									<div>Favorites</div>
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
<section class="section-content bg padding-y-md">
	<div class="container">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-3-24"> <strong>Your are here:</strong> </div> <!-- col.// -->
					<nav class="col-md-18-24"> 
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item"><a href="#">Category name</a></li>
							<li class="breadcrumb-item"><a href="#">Sub category</a></li>
							<li class="breadcrumb-item active" aria-current="page">Items</li>
						</ol>  
					</nav> <!-- col.// -->
					<div class="col-md-3-24 text-right"> 
						<a href="#" data-toggle="tooltip" title="Belanja"> <i class="text-success fa fa-shopping-cart"></i></a>
					</div> <!-- col.// -->
				</div> <!-- row.// -->
				<hr>
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
			<div class="col-md-4">
				<figure class="card card-product">
					<div class="img-wrap"><img src="<?php echo base_url('img/1.jpg') ?>"></div>
					<figcaption class="info-wrap">
						<h4 class="">Another name of item</h4>
						<p class="desc">Some small description goes here</p>
						<div class="rating-wrap">
							<ul class="rating-stars">
								<li style="width:80%" class="stars-active"> 
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
								</li>
								<li>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 
								</li>
							</ul>
							<div class="label-rating">132 reviews</div>
							<div class="label-rating">154 orders </div>
						</div>
					</figcaption>
					<div class="bottom-wrap">
						<a href="<?php echo base_url('product-detail') ?>" class="btn btn-sm btn-success float-right">Pesan Sekarang</a>	
						<div class="price-wrap h5">
							<span class="price-new">$1280</span> <del class="price-old">$1980</del>
						</div>
					</div>
				</figure>
			</div>
			<div class="col-md-4">
				<figure class="card card-product">
					<div class="img-wrap"><img src="<?php echo base_url('img/1.jpg') ?>"></div>
					<figcaption class="info-wrap">
						<h4 class="">Another name of item</h4>
						<p class="desc">Some small description goes here</p>
						<div class="rating-wrap">
							<ul class="rating-stars">
								<li style="width:80%" class="stars-active"> 
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
								</li>
								<li>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 
								</li>
							</ul>
							<div class="label-rating">132 reviews</div>
							<div class="label-rating">154 orders </div>
						</div>
					</figcaption>
					<div class="bottom-wrap">
						<a href="<?php echo base_url('product-detail') ?>" class="btn btn-sm btn-success float-right">Pesan Sekarang</a>	
						<div class="price-wrap h5">
							<span class="price-new">$1280</span> <del class="price-old">$1980</del>
						</div>
					</div>
				</figure>
			</div><div class="col-md-4">
				<figure class="card card-product"> 
					<div class="img-wrap"><img src="<?php echo base_url('img/1.jpg') ?>"></div>
					<figcaption class="info-wrap">
						<h4 class="">Another name of item</h4>
						<p class="desc">Some small description goes here</p>
						<div class="rating-wrap">
							<ul class="rating-stars">
								<li style="width:80%" class="stars-active"> 
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
								</li>
								<li>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 
								</li>
							</ul>
							<div class="label-rating">132 reviews</div>
							<div class="label-rating">154 orders </div>
						</div>
					</figcaption>
					<div class="bottom-wrap">
						<a href="<?php echo base_url('product-detail') ?>" class="btn btn-sm btn-success float-right">Pesan Sekarang</a>	
						<div class="price-wrap h5">
							<span class="price-new">$1280</span> <del class="price-old">$1980</del>
						</div>
					</div>
				</figure>
			</div><div class="col-md-4">
				<figure class="card card-product">
					<div class="img-wrap"><img src="<?php echo base_url('img/1.jpg') ?>"></div>
					<figcaption class="info-wrap">
						<h4 class="">Another name of item</h4>
						<p class="desc">Some small description goes here</p>
						<div class="rating-wrap">
							<ul class="rating-stars">
								<li style="width:80%" class="stars-active"> 
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
								</li>
								<li>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 
								</li>
							</ul>
							<div class="label-rating">132 reviews</div>
							<div class="label-rating">154 orders </div>
						</div>
					</figcaption>
					<div class="bottom-wrap">
						<a href="<?php echo base_url('product-detail') ?>" class="btn btn-sm btn-success float-right">Pesan Sekarang</a>	
						<div class="price-wrap h5">
							<span class="price-new">$1280</span> <del class="price-old">$1980</del>
						</div>
					</div>
				</figure>
			</div><div class="col-md-4">
				<figure class="card card-product">
					<div class="img-wrap"><img src="<?php echo base_url('img/1.jpg') ?>"></div>
					<figcaption class="info-wrap">
						<h4 class="">Another name of item</h4>
						<p class="desc">Some small description goes here</p>
						<div class="rating-wrap">
							<ul class="rating-stars">
								<li style="width:80%" class="stars-active"> 
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
								</li>
								<li>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 
								</li>
							</ul>
							<div class="label-rating">132 reviews</div>
							<div class="label-rating">154 orders </div>
						</div>
					</figcaption>
					<div class="bottom-wrap">
						<a href="<?php echo base_url('product-detail') ?>" class="btn btn-sm btn-success float-right">Pesan Sekarang</a>	
						<div class="price-wrap h5">
							<span class="price-new">$1280</span> <del class="price-old">$1980</del>
						</div>
					</div>
				</figure>
			</div><div class="col-md-4">
				<figure class="card card-product">
					<div class="img-wrap"><img src="<?php echo base_url('img/1.jpg') ?>"></div>
					<figcaption class="info-wrap">
						<h4 class="">Another name of item</h4>
						<p class="desc">Some small description goes here</p>
						<div class="rating-wrap">
							<ul class="rating-stars">
								<li style="width:80%" class="stars-active"> 
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
								</li>
								<li>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 
								</li>
							</ul>
							<div class="label-rating">132 reviews</div>
							<div class="label-rating">154 orders </div>
						</div>
					</figcaption>
					<div class="bottom-wrap">
						<a href="<?php echo base_url('product-detail') ?>" class="btn btn-sm btn-success float-right">Pesan Sekarang</a>	
						<div class="price-wrap h5">
							<span class="price-new">$1280</span> <del class="price-old">$1980</del>
						</div>
					</div>
				</figure>
			</div>
		</div>
	</div>
</section>
<?php view('partial/footer') ?>
<script src="<?php echo base_url('plugins/fancybox/fancybox.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('plugins/owlcarousel/owl.carousel.min.js') ?>"></script>