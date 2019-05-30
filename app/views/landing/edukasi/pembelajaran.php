<?php view('partial/header', $data) ?>

<section id="educate" style="background-image: inherit; background: linear-gradient(to bottom, #d5e869 0%, #9fbd12 100%); min-height: 150px;">
    <div class="middle">
        <h1 style="text-align: center;color: #fafafa;margin-bottom: 15px;"><?php echo $single->judul ?></h1>
        <?php if($single->tipe_pembelajaran === 'video'){ ?>
            <p style="text-align: center;color: #fafafa;font-size: 18px;"><?php echo $single->deskripsi ?></p>
        <?php } ?>
    </div>
</section>
<section id="list-educate">
	<div class="container">
		<div class="row">
            <div class="col-md-12">
                <div class="content-container">
                    <div>
                        <?php if($single->tipe_pembelajaran === 'video'){ ?>
                            <iframe style="width: 100%; height: 500px;"  src="<?php echo $single->konten  ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <?php }else{ ?>
                            <?php echo $single->konten ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class= "col-md-12">
                <?php if($edukasi !== false){ ?>
                    <h5 style="margin-top: 40px;">Progress belajar</h5>
                    <div class="progress mb-4" style="height: 30px">
                        <?php $jml_progress = ceil((count($progres)/count($edukasi)) * 100) ?>
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="<?php echo $jml_progress ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $jml_progress ?>%"><?php echo $jml_progress ?>%</div>
                    </div>
                <?php } ?>
                <div class="list-group">
                    <?php
                    if($edukasi !== false){
                        foreach ($edukasi as $i => $item) {
                            $text = '';
                            foreach ($progres as $check){
                                if($check->id_pembelajaran == $item->id){
                                    $text = 'style="text-decoration: line-through"';
                                }
                            }
                            ?>
                            <a href="<?php echo base_url('pembelajaran/'.$item->slug) ?>" class="list-group-item list-group-item-action" <?php echo $text ?>><?php echo $item->judul ?></a>
                            <?php
                        }
                    }else{
                        echo '<h4 class="text-center">Materi belum tersedia</h4>';
                    }
                    ?>
                </div>
                <?php if($jml_progress === 100) {?>
                    <a href="<?php echo base_url('edukasi') ?>" class="btn btn-info btn-block">< Kembali ke daftar Perjalanan</a>
                <?php } ?>
            </div>
        </div>
	</div>
</section>

<!--<section>-->
<!--	<div class="container">-->
<!--		<div class="row">-->
<!--			<div class="col-md-12">-->
<!--				<span class="education-title"><h5>Simak <span style="color: #03ad23">Video </span> Berikut</h5></span>-->
<!--			</div>-->
<!--			<div class="col-md-6">-->
<!--				<iframe width="100%" height="300" src="https://www.youtube.com/embed/9l-ti-tT9xw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
<!--			</div>-->
<!--			<div class="col-md-6">-->
<!--				<iframe width="100%" height="300" src="https://www.youtube.com/embed/Xs-ODDmopoA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</section>-->
<!--<section>-->
<!--	<div class="feature-card">-->
<!--		<img src="--><?php //echo base_url('img/SwissChard_bg.jpg') ?><!-- " alt="">-->
<!--	</div>-->
<!--</section>-->
<!--<section>-->
<!--	<div class="container  education-title">-->
<!--		<h5><span style="color: #03ad23">Come </span>Join Us</h5>-->
<!--	</div>-->
<!--</section>-->

<?php view('partial/footer') ?>