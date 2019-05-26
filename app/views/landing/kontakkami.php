<?php view('partial/header', $data) ?>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
	<div class="row">
	    <div class="col-7">
	       	<form>
			 	<div class="form-group">
			    	<label for="exampleInputEmail1">Nama</label>
			    	<input type="text" class="form-control" id="exampleInputNama" aria-describedby="namaPengunjung" placeholder="Nama Lengkap">
			  	</div>
			 	<div class="form-group">
				    <label for="exampleInputEmail1">Email</label>
				    <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailPengunjung" placeholder="Email">
				    <small id="emailHelp" class="form-text text-muted">Kami tidak akan pernah membagikan email Anda dengan orang lain.</small>
			  	</div>
			  	<div class="form-group">
				    <label for="exampleInputEmail1">Telepon</label>
				    <input type="text" class="form-control" id="exampleInputTelepon" aria-describedby="telpPengunjung" placeholder="No. Telepon">
			  	</div>
			  	<div class="form-group">
				    <label for="exampleInputEmail1">Kritik dan Saran</label>
				    <!-- <input type="text" class="form-control" id="exampleInputPesan" aria-describedby="kritikPengunjung" placeholder="Masukan Pesan" style="height: 10rem;"> -->
				    <textarea class="form-control" name="text" id=""style="height: 10rem" placeholder="Masukkan Pesan"></textarea>
			  	</div>
			  	<button type="button" class="btn btn-success">Kirim</button>
			</form>
	    </div>
	    <div class="col">
	    	<br>
	      	<div class="card" style="width: 22rem;">
				<div class="card-body">
				    <h5 class="card-title">Simponi</h5>
				    <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
				    <h6 class="card-subtitle mb-2 text-muted">Bali, Indonesia</h6>
				    <h6 class="card-subtitle mb-2 text-muted">80652</h6>
				    <br>
				    <h6 class="card-subtitle mb-2 text-muted">Telp. : 087654453324</h6>
				    <h6 class="card-subtitle mb-2 text-muted">Facebook : simponi bali</h6>
				    <h6 class="card-subtitle mb-2 text-muted">Email : simponi@gmail.com</h6>
				    <!-- <a href="#" class="card-link">Card link</a>
				    <a href="#" class="card-link">Another link</a> -->
			  	</div>
			</div>
	    </div>
	</div>
  </div>
</div>

<?php view('partial/footer', $data) ?>