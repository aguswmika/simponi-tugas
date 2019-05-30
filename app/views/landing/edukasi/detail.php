<?php view('partial/header', $data) ?>

<section id="educate" style="background-image: url(<?php echo base_url($kategori->icon) ?>)">
    <div class="middle">
        <h1 style="text-align: center;color: #fafafa;margin-bottom: 15px;">Kelas <?php echo $kategori->nama ?></h1>
        <p style="text-align: center;color: #fafafa;font-size: 18px;"><?php echo $kategori->deskripsi ?></p>
        <?php if(!empty($edukasi[0]->slug)) { ?>
            <div style="margin: 0 auto;display: flex;justify-content: center;"><a href="<?php echo base_url('pembelajaran/'.$edukasi[0]->slug) ?>" class="btn btn-warning">Mulai belajar</a></div>
        <?php } ?>
    </div>
</section>
<section id="list-educate">
	<div class="container">
		<div class="row">
            <div class="col-md-8">
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
            </div>

            <div class="col-md-4">
                <?php if($edukasi !== false){ ?>
                    <h5>Progress belajar</h5>
                    <div class="progress mb-4" style="height: 30px">
                        <?php $jml_progress = ceil((count($progres)/count($edukasi)) * 100) ?>
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="<?php echo $jml_progress ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $jml_progress ?>%"><?php echo $jml_progress ?>%</div>
                    </div>
                <?php } ?>
<!--                <div class="content-container">-->
<!--                    <div class="caption-container">-->
<!--                        <h4>--><?php //echo $view->judul ?><!--</h4>-->
<!--                    </div>-->
<!--                    <div>-->
<!--                        --><?php //if($view->tipe_pembelajaran === 'video'){ ?>
<!--                            <iframe style="width: 100%; height: 500px;"  src="--><?php //echo $view->konten  ?><!--" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
<!--                        --><?php //}else{ ?>
<!--                            --><?php //echo $view->konten ?>
<!--                        --><?php //} ?>
<!--                    </div>-->
<!--                </div>-->
                <a href="<?php echo base_url('edukasi') ?>" class="btn btn-info btn-block">< Kembali ke daftar Perjalanan</a>
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