<section id="navbar" class="no-pad">
	<nav id="sticky-navbar" class="navbar navbar-expand-lg navbar-light navbar-fixed-top">
		<a class="navbar-brand" href="<?php echo base_url()?>"><img src="img/logo.png" alt="logo simponi."></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav">
				<li class="nav-item <?php echo (Input::url(0) === '' ? 'active' : '') ?>">
					<a class="nav-link" href="<?php echo base_url()?>">beranda</a>
				</li>
				<li class="nav-item <?php echo (Input::url(0) === 'edukasi' ? 'active' : '') ?>">
					<a class="nav-link" href="<?php echo base_url('edukasi') ?>">cara kerja</a>
				</li>
				<li class="nav-item <?php echo (Input::url(0) === 'why-simponi' ? 'active' : '') ?>">
					<a class="nav-link" href="<?php echo base_url('why-simponi') ?>">kenapa simponi?</a>
				</li>
				<li class="nav-item <?php echo (Input::url(0) === 'marketplace' ? 'active' : '') ?>">
					<a class="nav-link" href="<?php echo base_url('marketplace') ?>">produk kami</a>
				</li>
				<li class="nav-item <?php echo (Input::url(0) === 'blog' ? 'active' : '') ?>">
					<a class="nav-link" href="<?php echo base_url('blog') ?>">blog</a>
				</li>
				<li class="nav-item <?php echo (Input::url(0) === 'contact-us' ? 'active' : '') ?>">
					<a class="nav-link" href="<?php echo base_url('contact-us') ?>">kontak kami</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('login') ?>"><i class="fa fa-user" style="color: #9fbd12"></i> Login</a>
				</li>
			</ul>
		</div>
	</nav>
</section>