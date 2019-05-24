<?php view('partial/header', $data) ?>

<div class="">
	<div class="feature-card">
		<img src="<?php echo base_url('img/spinac.png') ?>" style="img-fluid" alt="">
	</div>
</div>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="content-container">
					<a href="#">
						<div class="picture-container feature-card">
							<img src="<?php echo base_url('img/1_seed.jpg') ?> " alt="" class="img-fluid">
						</a>
					</div>
					<div class="caption-container">
						<h4>Persiapan Alat dan Bahan</h4>
						<p></p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="content-container">
					<a href="#">
						<div class="picture-container feature-card">
							<img src="<?php echo base_url('img/2_media.jpg') ?> " alt="" class="img-fluid">
						</div>
					</a>
					<div class="caption-container">
						<h4>Penyiapan Media Tanam</h4>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="content-container">
					<a href="#">
						<div class="picture-container feature-card">
							<img src="<?php echo base_url('img/3_nutrition.jpg') ?> " alt="" class="img-fluid">
						</div>
					</a>
					<div class="caption-container">
						<h4>Pemberian Nutrisi</h4>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="content-container">
					<a href="#">
						<div class="picture-container feature-card">
							<img src="<?php echo base_url('img/4_love.jpg') ?> " alt="" class="img-fluid">
						</div>
					</a>
					<div class="caption-container">
						<h4>Perawatan</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<span class="education-title"><h5>Simak <span style="color: #03ad23">Video </span> Berikut</h5></span>
			</div>
			<div class="col-md-6">
				<iframe width="100%" height="300" src="https://www.youtube.com/embed/9l-ti-tT9xw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="col-md-6">
				<iframe width="100%" height="300" src="https://www.youtube.com/embed/Xs-ODDmopoA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="feature-card">
		<img src="<?php echo base_url('img/SwissChard_bg.jpg') ?> " alt="">
	</div>
</section>
<section>
	<div class="container  education-title">
		<h5><span style="color: #03ad23">Come </span>Join Us</h5>
	</div>
</section>

<?php view('partial/footer') ?>