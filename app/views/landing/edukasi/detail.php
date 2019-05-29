<?php view('partial/header', $data) ?>

<section id="educate" style="background-image: url(<?php echo base_url($kategori->icon) ?>)">
    <div class="middle">
        <h1 style="text-align: center;color: #fafafa">Kelas <?php echo $kategori->nama ?></h1>
    </div>
</section>
<section>
	<div class="container-fluid">
		<div class="row">
            <div class="col-md-4">
                <div class="list-group">

                    <?php
                        $first = null;
                        foreach ($edukasi as $i => $item) {
                            if($i === 0) $first = $item;
                    ?>
                            <a href="<?php echo base_url('edukasi/'.$kategori->slug.'/'.$item->slug) ?>" class="list-group-item list-group-item-action <?php echo ((Input::url(2) === $item->slug || (empty(Input::url(2)) && $i === 0)) ? 'active' : '') ?>"><?php echo $item->judul ?></a>
                    <?php } ?>
                </div>
            </div>

            <div class="col-md-8">
                <?php
                    $view = null;
                    if(empty(Input::url(2))){
                        $view = $first;
                    }else{
                        $view = $single;
                    }
                ?>
                <div class="content-container">
                    <div class="caption-container">
                        <h4><?php echo $view->judul ?></h4>
                    </div>
                    <div>
                        <?php if($view->tipe_pembelajaran === 'video'){ ?>
                            <iframe style="width: 100%; height: 500px;"  src="<?php echo $view->konten  ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <?php }else{ ?>
                            <?php echo $view->konten ?>
                        <?php } ?>
                    </div>
                </div>
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