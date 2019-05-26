<?php view('partial/header', $data) ?>
<link href="<?php echo base_url('plugins/fancybox/fancybox.min.css') ?>" type="text/css" rel="stylesheet">
<link href="<?php echo base_url('plugins/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('plugins/owlcarousel/assets/owl.theme.default.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('css/ui.css') ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('css/responsive.css') ?>" rel="stylesheet" media="only screen and (max-width: 1200px)" />

<section class="section-content bg padding-y border-top">
		<div class="container">

			<div class="row">
				<main class="col-sm-9">

					<div class="card">
						<table class="table table-hover shopping-cart-wrap">
							<thead class="text-muted">
								<tr>
									<th scope="col">Product</th>
									<th scope="col" width="120">Quantity</th>
									<th scope="col" width="120">Price</th>
									<th scope="col" class="text-right" width="200">Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<figure class="media">
											<div class="img-wrap"><img src="<?php echo base_url('img/1.jpg') ?>" class="img-thumbnail img-sm"></div>
											<figcaption class="media-body">
												<h6 class="dlist-inline" style="margin: 0px">Barang #</h6>
												<dl class="dlist-inline small">
												</dl>
												<dl class="dlist-inline small">
													<dt>Warna : </dt>
													<dd>#</dd>
												</dl>
											</figcaption>
										</figure> 
									</td>
									<td> 
										<select class="form-control">
											<option>1</option>
											<option>2</option>	
											<option>3</option>	
											<option>4</option>	
										</select> 
									</td>
									<td> 
										<div class="price-wrap"> 
											<var class="price">Rp 15.000</var> 
											<small class="text-muted">(Rp 15.000each)</small> 
										</div> <!-- price-wrap .// -->
									</td>
									<td class="text-right"> 
										<a data-original-title="Save to Wishlist" title="" href="" class="btn btn-outline-success" data-toggle="tooltip"> <i class="fa fa-heart"></i></a> 
										<a href="" class="btn btn-danger"><i class="fa fa-times"></i></a>
									</td>
								</tr>
							</tbody>
						</table>
					</div> <!-- card.// -->

				</main> <!-- col.// -->
				<aside class="col-sm-3">
					<p class="alert alert-success">Belanja minimal 100.000.000 dapatkan free ongkir 2000. </p>
					<dl class="dlist-align">
						<dt>Total price: </dt>
						<dd class="text-right">?</dd>
					</dl>
					<dl class="dlist-align">
						<dt>Discount:</dt>
						<dd class="text-right">?</dd>
					</dl>
					<dl class="dlist-align h4">
						<dt>Total:</dt>
						<dd class="text-right"><strong>?</strong></dd>
					</dl>
					<hr>
				</aside> <!-- col.// -->
			</div>
		</div> <!-- container .//  -->
	</section>
<script src="<?php echo base_url('plugins/fancybox/fancybox.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('plugins/owlcarousel/owl.carousel.min.js') ?>"></script>
<?php view('partial/footer') ?>