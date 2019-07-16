
<section class="section-header-single">
	<img src="<?=base_url()?>assets/homepage/img/bg-destination.jpg">
	<div class="overlay">
		<div class="header-title">
			<h3>Akomodasi</h3>
			<span class="ion-record"></span>&nbsp;
			<span class="ion-record"></span>&nbsp;
			<span class="ion-record"></span>
		</div>
</section>
</section>

<ul class="breadcrumb">
	<li><a href="index.html">Home</a></li>
	<li>Destination</li>
</ul>



<section class="section section-single">
	<div class="container-fluid">
		<div class="single-head">
			<div class="col">
				<img src="<?=base_url()?>assets/homepage/img/icon/destination.png">
				<h3>Temukan Akomodasi Terbaikmu </h3>
				<p>Berikut adalah daftar akomodasi/hotel yang dapat anda temukan di Kabupaten Probolinggo.
				</p>
			</div>
			<div class="col-form">
				<form method="POST">

				</form>
			</div>
		</div>
		<div class="single-body">
			<?php $n = 1; foreach ($hotel as $w) { ?>
				<div class="col">
					<img src="<?=base_url()?>assets/foto/hotel/<?=$w['foto_hotel']?>">
					<div class="overlay">
						<div class="caption">
							<div class="caption-text">
								<p><?=$w['nama_hotel']?></p>
								<!-- <span class="ion-ios-star checked"></span>
								<span class="ion-ios-star checked"></span>
								<span class="ion-ios-star checked"></span>
								<span class="ion-ios-star checked"></span>
								<span class="ion-ios-star"></span> <br>
								<span class="ion-bag big"></span> &nbsp; -->
								<!-- <br> -->
								<!-- <b><?='Rp. '. number_format($w['harga'],0). ' /malam'?></b>  -->
								<br>
								<button class="btn btn-orange btn-round" data-toggle="modal" data-target="#largeModal<?=$n?>">See Detail</button>
							</div>
						</div>
					</div>
				</div>
			<?php $n++; } ?>			

		</div>
	</div>
</section>

<?php 
$m = 1; foreach ($hotel as $k) { ?>
	<div class="modal fade" id="largeModal<?=$m?>" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="largeModalLabel"><?=$k['nama_hotel']?></h4>
				</div>
				<div class="modal-body" id="detail">
					<section class="section-ticket">
						<div class="header">
							<img src="<?=base_url()?>assets/foto/hotel/<?=$k['foto_hotel']?>">
						</div>
						<div class="body">
							<div class="panel">
								<div class="panel-header">
									<span class="ion-ios-bookmarks"></span>&nbsp; Deskripsi
								</div>
								<div class="panel-body" align="justify">
									<p><?=$k['deskripsi_hotel']?></p>
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
<?php $m++; } ?>

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
