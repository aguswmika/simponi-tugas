<section class="sidebar">
  	<ul class="sidebar-menu" data-widget="tree">
		<li class="header">HEADER</li>
        <?php $url = 'control-panel/' ?>
		<li <?php echo (Input::url(0) === 'control-panel' && Input::url(1) === null) ? 'class="active"' : '' ?>><a href="<?php echo base_url($url);  ?>"><i class="fa fa-dashboard"></i> <span>Beranda</span></a></li>
		<li class="treeview <?php echo (Input::url(0) === 'control-panel' && (Input::url(1) === 'edukasi' || Input::url(1) === 'pengguna' || Input::url(1) === 'produk')) ? 'active menu-open' : '' ?>">
			<a href="#">
				<i class="fa fa-database"></i>
				<span>Master</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
            	<li <?php echo (Input::url(0) === 'control-panel' && Input::url(1) === 'edukasi') ? 'class="active"' : '' ?>><a href="<?php echo base_url($url.'edukasi') ?>"><i class="fa fa-book"></i> <span>Edukasi</span></a></li>
		        <li <?php echo (Input::url(0) === 'control-panel' && Input::url(1) === 'produk') ? 'class="active"' : '' ?>><a href="<?php echo base_url($url.'produk') ?>"><i class="fa fa-shopping-cart"></i> <span>Produk</span></a></li>
                <li <?php echo (Input::url(0) === 'control-panel' && Input::url(1) === 'pengguna') ? 'class="active"' : '' ?>><a href="<?php echo base_url($url.'pengguna') ?>"><i class="fa fa-users"></i> <span>Pengguna</span></a></li>
         	</ul>
		</li>
        <li class="treeview <?php echo (Input::url(0) === 'control-panel' && (Input::url(1) === 'kategori-edukasi' || Input::url(1) === 'kategori-produk')) ? 'active menu-open' : '' ?>">
            <a href="#">
                <i class="fa fa-tags"></i>
                <span>Kategori</span>
                <span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
            </a>
            <ul class="treeview-menu">
                <li <?php echo (Input::url(0) === 'control-panel' && Input::url(1) === 'kategori-edukasi') ? 'class="active"' : '' ?>><a href="<?php echo base_url($url.'kategori-edukasi') ?>"><i class="fa fa-tag"></i> <span>Kategori Edukasi</span></a></li>
                <li <?php echo (Input::url(0) === 'control-panel' && Input::url(1) === 'kategori-produk') ? 'class="active"' : '' ?>><a href="<?php echo base_url($url.'kategori-produk') ?>"><i class="fa fa-tag"></i> <span>Kategori Produk</span></a></li>
            </ul>
        </li>
		
		

		<!-- <li class="treeview">
	  		<a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
		  		</span>
	  		</a>
		  	<ul class="treeview-menu">
				<li><a href="#">Link in level 2</a></li>
				<li><a href="#">Link in level 2</a></li>
		  	</ul>
		</li> -->
  	</ul>
</section>