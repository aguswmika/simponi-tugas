<?php view('partial/header', $data) ?>

<section id="hero" class="no-pad">
	<div href="#" class="btn btn-primary btn-sign-up content-center">lihat apa yang kita punya</div>
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
				<a href="<?php echo base_url('forum') ?>">
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

<section id="blog" class="py-5 text-center">
	<h1 class="title why-mid-tittle"><span style="color: #9fbd12">Kami </span> Menawarkan</h1>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-lg-4 mb-3">
				<svg class="lnr text-primary services-icon">
					<use xlink:href="#lnr-leaf"></use>
				</svg>
				<h6>Dengan sedikit magic, kamu mengerti hidroponic</h6>
				<p class="text-muted">Kami akan mengajarkan sedatail mungkin mengenai hidroponik</p>
			</div>
			<div class="col-sm-6 col-lg-4 mb-3">
				<svg class="lnr text-primary services-icon">
					<use xlink:href="#lnr-heart"></use>
				</svg>
				<h6>Cara menjaga lingkungan</h6>
				<p class="text-muted">Mari bersama kembangkan hidroponik demi kelestarian alam</p>
			</div>
			<div class="col-sm-6 col-lg-4 mb-3">
				<svg class="lnr text-primary services-icon">
					<use xlink:href="#lnr-book"></use>
				</svg>
				<h6>Pelajari dengan cepat</h6>
				<p class="text-muted">Kamu akan mendapatkan informasi terbaru seputar Hidroponik dengan sangat cepat</p>
			</div>
			<div class="col-sm-6 col-lg-4 mb-3">
				<svg class="lnr text-primary services-icon">
					<use xlink:href="#lnr-store"></use>
				</svg>
				<h6>Langsung belanja disini</h6>
				<p class="text-muted">Tidak punya alat dan bahan? tenang kami punya segalanya</p>
			</div>
			<div class="col-sm-6 col-lg-4 mb-3">
				<svg class="lnr text-primary services-icon">
					<use xlink:href="#lnr-laptop-phone"></use>
				</svg>
				<h6>Pelajari dimanapun, kapanpun</h6>
				<p class="text-muted">Di rumah, di kantor, di sekolah, dimanapun kapanpun kamu bisa belajar</p>
			</div>
			<div class="col-sm-6 col-lg-4 mb-3">
				<svg class="lnr text-primary services-icon">
					<use xlink:href="#lnr-users"></use>
				</svg>
				<h6>Buat status, dan blog tentang hidroponik</h6>
				<p class="text-muted">Sebarkan pengalamanmu pada blog kami ! orang lain membutuhkannya </p>
			</div>
		</div>
	</div>
</section>
<section class="text-center py-5 mb-4" style="background-color: #9fbd12">
	<div class="container">
		<h1 class="font-weight-light text-white why-mid-tittle">Tim <span style="color: black"> Pengembang </span></h1>
	</div>
</section>
<div class="container">
	<div class="row">
		<!-- Team Member 1 -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-0 shadow">
				<img src="<?php echo base_url('img/member1.png') ?>" class="card-img-top" alt="...">
				<div class="card-body text-center">
					<h5 class="card-title mb-0">Giri Kusuma</h5>
					<div class="card-text text-black-50">Menteri Perhubungan</div>
				</div>
			</div>
		</div>
		<!-- Team Member 2 -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-0 shadow">
				<img src="<?php echo base_url('img/member2.png') ?>" class="card-img-top" alt="...">
				<div class="card-body text-center">
					<h5 class="card-title mb-0">Agus Wahyu</h5>
					<div class="card-text text-black-50">Menteri Pariwisata</div>
				</div>
			</div>
		</div>
		<!-- Team Member 3 -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-0 shadow">
				<img src="<?php echo base_url('img/member3.png') ?>" class="card-img-top" alt="...">
				<div class="card-body text-center">
					<h5 class="card-title mb-0">Dharma Putra</h5>
					<div class="card-text text-black-50">Menteri Pertahanan</div>
				</div>
			</div>
		</div>
		<!-- Team Member 4 -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-0 shadow">
				<img src="<?php echo base_url('img/member4.png') ?>" class="card-img-top" alt="...">
				<div class="card-body text-center">
					<h5 class="card-title mb-0">Bayu Wira</h5>
					<div class="card-text text-black-50">Menteri Dalam Negeri</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>
<?php view('partial/footer') ?>