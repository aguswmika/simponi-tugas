<?php view('partial/header', $data) ?>
<link href="<?php echo base_url('plugins/fancybox/fancybox.min.css') ?>" type="text/css" rel="stylesheet">
<link href="<?php echo base_url('plugins/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('plugins/owlcarousel/assets/owl.theme.default.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('css/ui.css') ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('css/responsive.css') ?>" rel="stylesheet" media="only screen and (max-width: 1200px)" />

<?php view('landing/marketplace/navbar', $data) ?>
<section class="section-content bg padding-y border-top">
		<div class="container">

			<div class="row">
				<main class="col-sm-9">

					<div class="card">
						<table class="table table-hover shopping-cart-wrap">
							<thead class="text-muted">
								<tr>
									<th scope="col" width="40%">Product</th>
									<th scope="col" width="15%">Quantity</th>
									<th scope="col" width="25%">Price</th>
									<th scope="col" class="text-right" width="20%">Action</th>
								</tr>
							</thead>
							<tbody>
                            <?php
                                $total_harga = 0;

                                foreach ($keranjang as $item) {
                                    $total_harga+= $item->harga_jual * $item->jumlah;
                            ?>
								<tr>
									<td>
										<figure class="media">
											<div class="img-wrap"><img src="<?php echo base_url($item->thumbnail_foto) ?>" class="img-thumbnail img-sm"></div>
											<figcaption class="media-body">
												<h6 class="dlist-inline" style="margin: 0px"><?php echo $item->nama ?></h6>
											</figcaption>
										</figure> 
									</td>
									<td> 
										<select class="form-control">
                                            <?php for ($i=1;$i<=($item->stok > 10 ? 10 : $item->stok);$i++) {?>
                                                <option value="<?php echo $i ?>" <?php echo (($item->jumlah == $i) ? 'selected=""' : '') ?>><?php echo $i ?></option>
                                            <?php } ?>
										</select> 
									</td>
									<td> 
										<div class="price-wrap"> 
											<var class="price">Rp <?php echo number_format($item->harga_jual*$item->jumlah, 2, ',', '.') ?></var>
											<small class="text-muted">(Rp <?php echo number_format($item->harga_jual, 0, ',', '.') ?>/<?php echo $item->satuan ?>)</small>
										</div> <!-- price-wrap .// -->
									</td>
									<td class="text-right"> 
										<a data-original-title="Save to Wishlist" title="" href="" class="btn btn-outline-success" data-toggle="tooltip"> <i class="fa fa-heart"></i></a> 
										<a href="" class="btn btn-danger"><i class="fa fa-times"></i></a>
									</td>
								</tr>
                            <?php } ?>
							</tbody>
						</table>
					</div> <!-- card.// -->

				</main> <!-- col.// -->
				<aside class="col-sm-3">
					<p class="alert alert-success">Belanja minimal 100.000 dapatkan free ongkir seluruh Bali. </p>
					<dl class="dlist-align">
						<dt>Total price: </dt>
						<dd class="text-right">Rp <?php echo number_format($total_harga, 0, ',', '.') ?></dd>
					</dl>
					<dl class="dlist-align">
						<dt>Discount:</dt>
						<dd class="text-right">0</dd>
					</dl>
					<dl class="dlist-align h4">
						<dt>Total:</dt>
						<dd class="text-right"><strong>Rp <?php echo number_format($total_harga, 2, ',', '.') ?></strong></dd>
					</dl>
					<hr>
					<div>
						<button class="btn btn-success"> <i class="fa fa-shopping-cart"></i> Bayar Sekarang</button>
					</div>
					</aside> <!-- col.// -->
				</div>
		</div> <!-- container .//  -->>
	</section>
<script src="<?php echo base_url('plugins/fancybox/fancybox.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('plugins/owlcarousel/owl.carousel.min.js') ?>"></script>
<?php view('partial/footer') ?>