<?php view('partial/header', $data) ?>

<section id="educate">
    <div class="middle">
        <h1 style="text-align: center;color: #fafafa">Perjalanan Edukasi</h1>
    </div>
</section>
<section>
	<div class="container">
		<div class="row">
            <?php foreach ($kategori as $item) { ?>
                <div class="col-md-4">
                    <a href="<?php echo base_url('edukasi/'.$item->slug) ?>">
                        <div class="content-container">
                            <div class="picture-container feature-card">
                                <img src="<?php echo base_url($item->icon) ?> " alt="" class="img-fluid">
                            </div>
                            <div class="caption-container">
                                <h4><?php echo $item->nama ?></h4>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
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