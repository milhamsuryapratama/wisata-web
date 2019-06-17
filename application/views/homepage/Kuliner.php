
<section class="section-header-single">
	<img src="<?=base_url()?>assets/homepage/img/bg-destination.jpg">
	<div class="overlay">
		<div class="header-title">
			<h3>Tourism Destinations</h3>
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
		<h3 class="section-title">KULINER PROBOLINGGO</h3>
		<p class="section-subtitle">Probolinggo selain kaya dengan keindahan alamnya juga kaya akan cita rasa kulinernya. Simak dibawah ini daftar kuliner khas Probolinggo.</p>
	</div>
	<div class="section-discover-body slide">
		<?php foreach ($kuliner as $k) { ?>
			<div class="col">
				<a href="destination.html">
					<img src="<?=base_url()?>assets/foto/kuliner/<?=$k['foto_kuliner']?>" alt="Destination">
					<div class="caption">
						<p><?=$k['nama_kuliner']?></p>
						<div class="line"></div>
						<div class="caption-text">
							<p><?=$k['deskripsi_kuliner']?></p>
							<!-- <button class="btn-login" id="openLogin">LOGIN</button> -->						
						</div>
					</div>
				</a>
			</div>
		<?php } ?>
				
	</div>
</section>

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
