<?php view('partial/header', $data) ?>
<link href="<?php echo base_url('plugins/fancybox/fancybox.min.css') ?>" type="text/css" rel="stylesheet">
<link href="<?php echo base_url('plugins/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('plugins/owlcarousel/assets/owl.theme.default.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('css/ui.css') ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('css/responsive.css') ?>" rel="stylesheet" media="only screen and (max-width: 1200px)" />

<?php view('landing/marketplace/navbar', $data) ?>
<?php echo Session::flash('error') ?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-xl-10 col-md-9 col-sm-12">
				<div class="card">
					<div class="row no-gutters">
						<aside class="col-sm-5 border-right">
							<article class="gallery-wrap"> 
								<div class="img-big-wrap">
									<div> <a href="<?php echo base_url($produk->thumbnail_foto) ?>" data-fancybox=""><img src="<?php echo base_url($produk->thumbnail_foto) ?>"></a></div>
								</div>
								<div class="img-small-wrap">
                                    <?php foreach (json_decode($produk->gallery_foto) as $g) { ?>
                                        <div class="item-gallery"> <a href="<?php echo base_url($g) ?>" data-fancybox=""><img src="<?php echo base_url($g) ?>"></a></div>
                                    <?php } ?>
								</div> 
							</article>
						</aside>
						<aside class="col-sm-7">
							<article class="p-5">
								<h3 class=""><?php echo $produk->nama ?></h3>

								<div class="mb-3"> 
									<var class="price h3 text-warning"> 
										<span class="currency">Rp </span><span class="num"><?php echo number_format($produk->harga_jual, 2, ',', '.') ?></span>
									</var> 
									<span>/per <?php echo $produk->satuan ?></span>
								</div> <!-- price-detail-wrap .// -->
								<dl>
									<dt>Deskripsi Barang</dt>
									<dd><p><?php echo $produk->deskripsi ?></p></dd>
								</dl>
								<dl class="row">
									<dt class="col-sm-3">Dikirim dari</dt>
									<dd class="col-sm-9">Kampus Teknik Informatika, Udayana</dd>
								</dl>
								<div class="rating-wrap">

									<ul class="rating-stars">
                                        <li style="width: <?php echo rand(0, 100) ?>%" class="stars-active">
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
                                    <div class="label-rating"><?php echo rand(1, 500) ?> reviews</div>
                                    <div class="label-rating"><?php echo rand(1, 100) ?> orders </div>
								</div> <!-- rating-wrap.// -->
								<hr>
                                <form action="<?php echo base_url('cart/add/'.$produk->slug) ?>" method="post">
								<div class="row">
									<div class="col-sm-5">
										<dl class="dlist-inline">
											<dt>Jumlah: </dt>
											<dd> 
												<select class="form-control form-control-sm" style="width:70px;" name="jumlah">
													<?php for ($i=1;$i<=($produk->stok > 10 ? 10 : $produk->stok);$i++) {?>
                                                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                    <?php } ?>
												</select>
											</dd>
										</dl> 
									</div>
								</div>
								<hr>

<!--                                <button type="submit" class="btn btn-success" style="margin: 0px" name="beli_sekarang">Beli sekarang</button>-->
                                <button type="submit" class="btn btn-info" style="margin: 0px" name="tamba_keranjang"><i class="fa fa-shopping-cart"></i> Tambah ke keranjang</button>
                                </form>
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
                        <?php foreach ($produk_rekomen as $item){ ?>
                            <div class="col-md-12 col-sm-3">
                                <figure class="item border-bottom">
                                    <a href="<?php echo base_url('produk/'.$item->slug) ?>" class="img-wrap mb-2"> <img src="<?php echo base_url($item->thumbnail_foto) ?>" class="img-md"></a>
                                    <figcaption class="info-wrap">
                                        <a href="#" class=""><?php echo $item->nama ?></a>
                                        <div class="price-wrap mb-4">
                                            <span class="price-new">Rp <?php echo number_format($item->harga_jual, 2, ',', '.') ?></span>
                                        </div> <!-- price-wrap.// -->
                                    </figcaption>
                                </figure> <!-- card-product // -->
                            </div> <!-- col.// -->
                        <?php } ?>
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
			<?php echo $produk->konten ?>
		</div>
	</article>
</div>
</section>
<?php view('partial/footer') ?>
<script src="<?php echo base_url('plugins/fancybox/fancybox.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('plugins/owlcarousel/owl.carousel.min.js') ?>"></script>
