
<section class="section-header-single">
	<img src="<?=base_url()?>assets/homepage/img/bg-destination.jpg">
	<div class="overlay">
		<div class="header-title">
			<h3>Kuliner</h3>
			<span class="ion-record"></span>&nbsp;
			<span class="ion-record"></span>&nbsp;
			<span class="ion-record"></span>
		</div>
</section>

<ul class="breadcrumb">
	<li><a href="index.html">Home</a></li>
	<li>Destination</li>
</ul>



<!-- Section Discover -->

<section class="section section-discover" id="discover">
	<div class="section-head">
		<div class="section-line"></div>
		<h3 class="section-title">KULINER KABUPATEN PROBOLINGGO</h3>
		<p class="section-subtitle">Kabupaten Probolinggo selain kaya dengan keindahan alamnya juga kaya akan cita rasa kulinernya. Simak dibawah ini daftar kuliner khas <b>Kabupaten Probolinggo</b>.</p>
	</div>
	<div class="section-discover-body slide">
		<?php $m = 1; foreach ($kuliner as $k) { ?>
			<div class="col">
				<img src="<?=base_url()?>assets/foto/kuliner/<?=$k['foto_kuliner']?>" alt="Destination">
				<div class="caption">
					<p><?=$k['nama_kuliner']?></p>
					<div class="line"></div>
					<div class="caption-text">
						<!-- <p><?=$k['deskripsi_kuliner']?></p> -->
						<button type="button" class="btn-login" id="openLogin" data-toggle="modal" data-target="#largeModal<?=$m?>" style="border: 2px solid white; color: white; border-radius: 50px; padding: 10px 32px; background: transparent; font-weight: bold; font-size: 14px; cursor: pointer;">See Detail</button>						
					</div>
				</div>
			</div>
		<?php $m++; } ?>
				
	</div>	
</section>

<?php 
$n = 1; foreach ($kuliner as $k) { ?>
	<div class="modal fade" id="largeModal<?=$n?>" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="largeModalLabel"><?=$k['nama_kuliner']?></h4>
				</div>
				<div class="modal-body" id="detail">
					<section class="section-ticket">
						<div class="header">
							<img src="<?=base_url()?>assets/foto/kuliner/<?=$k['foto_kuliner']?>">
						</div>
						<div class="body">
							<div class="panel">
								<div class="panel-header">
									<span class="ion-ios-bookmarks"></span>&nbsp; Deskripsi
								</div>
								<div class="panel-body" align="justify">
									<p><?=$k['deskripsi_kuliner']?></p>
								</div>
							</div>

							<div class="panel">
								<div class="panel-header">
									<span class="ion-ios-bookmarks"></span>&nbsp; GALERY
								</div>
								<div class="panel-body" align="justify">
									<div id="aniimated-thumbnials" class="list-unstyled row clearfix">

										<?php 
										$q = $this->db->query("SELECT filename FROM tb_galery_kuliner WHERE id_kuliner = '".$k['id_kuliner']."' ")->result_array();
										foreach ($q as $g) { ?>
											<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
												<a href="<?=base_url()?>assets/foto/galery/kuliner/<?=$g['filename']?>" data-sub-html="Galery Wisata">
													<img class="img-responsive thumbnail" src="<?=base_url()?>assets/foto/galery/kuliner/<?=$g['filename']?>">
												</a>
											</div>	
										<?php } ?>					

									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link waves-effect" data-dismiss="modal" style="border: 2px solid white; color: white; border-radius: 50px; padding: 10px 32px; background: transparent; font-weight: bold; font-size: 14px; cursor: pointer;">CLOSE</button>
			</div>
		</div>
	</div>
<?php $n++; } ?>

<!-- <ul class="pagination">
	<a href="#" class="pagination-arrow arrow-left">
		<span class="ion-ios-arrow-back"></span>
	</a>
	<a class="pagin-number active">1</a>
	<a href="#" class="pagin-number">2</a>
	<a href="#" class="pagin-number">3</li>
		<a href="#" class="pagin-number">4</a>
		<a href="#" class="pagin-number">5</a>
		<a href="#" class="pagin-arrow arrow-right">
			<span class="ion-ios-arrow-forward"></span>
		</a>
</ul> -->
