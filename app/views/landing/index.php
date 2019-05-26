<?php view('partial/header', $data) ?>

<section id="hero" class="no-pad">
	<a href="#" class="btn btn-primary btn-sign-up content-center">lihat cara kerja</a>
</section>
<section id="feature" class="bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<a href="<?php echo base_url('edukasi') ?>">
					<div class="feature-card">
						<!-- <h3 class="feature-card-title">belajar</h3> -->
						<img src="<?php echo base_url('img/belajar.jpg') ?>" style="img-fluid" alt="">
					</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="<?php echo base_url('marketplace') ?>">
					<div class="feature-card">
						<!-- <h3 class="feature-card-title">jual/beli</h3> -->
						<img src="<?php echo base_url('img/jualbeli.jpg') ?>" style="img-fluid" alt="">
					</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="#">
					<div class="feature-card">
						<!-- <h3 class="feature-card-title">diskusi</h3> -->
						<img src="<?php echo base_url('img/diskusi.jpg') ?>" style="img-fluid" alt="">
					</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="#">
					<div class="feature-card">
						<!-- <h3 class="feature-card-title">tips n trik</h3> -->
						<img src="<?php echo base_url('img/tips.jpg') ?>" style="img-fluid" alt="">
					</div>
				</a>
			</div>
		</div>
	</div>
</section>
<section id="blog">
	<h1 class="title">Berita</h1>
	<?php foreach ($berita as $item) { ?>
		<div><?php echo $item->id ?></div>
		<div><?php echo $item->nama ?></div>
	<?php } ?>
</section>

<?php view('partial/footer') ?>