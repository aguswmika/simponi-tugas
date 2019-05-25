<?php view('partial/header', $data) ?>
<div class="bdy" style="background-color: #ebebe0; padding-bottom: 5rem;">
	<div class="container">
		<br>
		<center><h1>Blog Card</h1></center>
		<br>
		<br>
		<div class="row">
		    <div class="col-8" style="margin-left: -2rem;">
		      	<div class="container">
				  	<div class="row">
					    <div class="col" align="center">
					    	<div class="card" style="width: 18rem;">
								<img src="../public/img/3.jpg" class="card-img-top" alt="...">
								<div class="card-body"  align="left">
									<div class="blog-card-title">
										<small class="form-text text-muted">-Giri Kusuma</small>
										<br>
									</div>
									<div class="blog-card-content">
										<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
										<br>
									</div>
									<div class="blog-card-foot">
										<small class="form-text text-muted">By Giri Kusuma</small>
									</div>
								</div>
							</div>
					    </div>
					    <div class="col" align="center">
					    	<div class="card" style="width: 18rem;">
								<img src="../public/img/3.jpg" class="card-img-top" alt="...">
								<div class="card-body"  align="left">
									<div class="blog-card-title">
										<small class="form-text text-muted">-Giri Kusuma</small>
										<br>
									</div>
									<div class="blog-card-content">
										<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
										<br>
									</div>
									<div class="blog-card-foot">
										<small class="form-text text-muted">By Giri Kusuma</small>
									</div>
								</div>
							</div>
					    </div>
					  </div>
					</div>
			    </div>
		    <div class="col-4">
		    	<div class="container kotakb">
		    		<small class="form-text text-muted">-Serch Site</small>
		    		<br>
				</div>
				<br>
				   <form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="search" placeholder="Search">
					   <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
					   <br>
				</form>
				<br>
		    	<div class="container kotakb">
			    	<small class="form-text text-muted">-Category</small>
			    	<br>
				</div>
				<br>
				<div class="dropdown kotak">
					<a class="dropdown-item fontt" href="#">Enviroment</a>
					<a class="dropdown-item fontt" href="#">Food dan Travel</a>
					<a class="dropdown-item fontt" href="#">Lifestyle</a>
					<a class="dropdown-item fontt" href="#">Marketing</a>
					<a class="dropdown-item fontt" href="#">Technology</a>
					<br>
				</div>
				<div class="container kotakb">
					<br>
			    	<small class="form-text text-muted">-Tags</small>
			    	<br>
				</div>
				<br>
				<div class="contain">
					<button type="button" class="btn btn-light">BUSSINES</button>
					<button type="button" class="btn btn-light">TOURISM</button>
					<button type="button" class="btn btn-light">LIFE</button>
					<button type="button" class="btn btn-light">STARTUP</button>
					<button type="button" class="btn btn-light">DESIGN</button>
					<button type="button" class="btn btn-light">TECH</button>
					<button type="button" class="btn btn-light">STYLE</button>
					<button type="button" class="btn btn-light">ENVIROMENT</button>	
					<br>
				</div>
				<div class="container kotakb">
					<br>
			    	<small class="form-text text-muted">-About Us</small>
			    	<br>
				</div>
				<br>
				<div class="contain kotak">
					<h6 class="card-subtitle mb-2 text-muted">Bali, Indonesia</h6>
				    <h6 class="card-subtitle mb-2 text-muted">80652</h6>
				    <br>
				    <h6 class="card-subtitle mb-2 text-muted">Telp. : 087654453324</h6>
				    <h6 class="card-subtitle mb-2 text-muted">Facebook : simponi bali</h6>
				    <h6 class="card-subtitle mb-2 text-muted">Email : simponi@gmail.com</h6>
				</div>
		    </div>
		</div>
	</div>
</div>
<br>

<?php view('partial/footer', $data) ?>