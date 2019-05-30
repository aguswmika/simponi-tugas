<section id="navbar" class="no-pad">
	<nav id="sticky-navbar" class="navbar navbar-expand-lg navbar-light navbar-fixed-top">
		<a class="navbar-brand" href="<?php echo base_url()?>"><img src="<?php echo base_url('img/logo.png') ?>" alt="logo simponi."></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav">
				<li class="nav-item <?php echo (Input::url(0) === '' ? 'active' : '') ?>">
					<a class="nav-link" href="<?php echo base_url()?>">beranda</a>
				</li>
				<li class="nav-item <?php echo (Input::url(0) === 'edukasi' ? 'active' : '') ?>">
					<a class="nav-link" href="<?php echo base_url('edukasi') ?>">edukasi</a>
				</li>
				<li class="nav-item <?php echo (Input::url(0) === 'why-simponi' ? 'active' : '') ?>">
					<a class="nav-link" href="<?php echo base_url('why-simponi') ?>">kenapa simponi?</a>
				</li>
				<li class="nav-item <?php echo (Input::url(0) === 'marketplace' ? 'active' : '') ?>">
					<a class="nav-link" href="<?php echo base_url('marketplace') ?>">marketplace</a>
				</li>
				<li class="nav-item <?php echo (Input::url(0) === 'blog' ? 'active' : '') ?>">
					<a class="nav-link" href="<?php echo base_url('blog') ?>">blog</a>
				</li>
				<li class="nav-item <?php echo (Input::url(0) === 'contact-us' ? 'active' : '') ?>">
					<a class="nav-link" href="<?php echo base_url('contact-us') ?>">kontak kami</a>
				</li>
				<li class="nav-item">
					<?php if(Session::sess('loggedIn') == false || Session::sess('loggedIn') == null){ ?>
						<a class="nav-link" href="<?php echo base_url('login') ?>"><i class="fa fa-user" style="color: #9fbd12"></i> Login</a>
					<?php }else{ ?>
						<div class="nav-item dropdown" style="cursor: pointer;">
							<span class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" style="color: #9fbd12"></i> <?php echo Akun::getLogin()->username ?></span>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="nav-link dropdown-item" href="<?php echo base_url('logout') ?>"> Logout</a>
								<a class="nav-link dropdown-item" href="<?php echo base_url('profile') ?>"> Profile</a>
							</div>
						</div>
					<?php } ?>
				</li>
			</ul>
		</div>
	</nav>
</section>