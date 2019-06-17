<!-- Sidebar -->
<div class="sidebar">
	<ul class="sidebar-list">
		<li><a href="" class="close"><span class="ion-android-close"></span></a></li>
		<li class="sidebar-list-hover"><a href="index.html">Home</a></li>
		<li class="sidebar-list-hover"><a href="destination.html">Destination</a></li>
		<li class="sidebar-list-hover"><a href="gallery.html">Gallery</a></li>
		<li class="sidebar-list-hover"><a href="index.html#discover">Discover</a></li>
		<li class="sidebar-list-hover"><a href="news.html"> News</a></li>
		<li><a class="btn btn-orange btn-round" href="login.html"> Login</a></li>
	</ul>
</div>

<!-- Sidebar Overlay -->
<section class="sidebar-overlay"></section>

<!-- Login Form -->

<div class="login-form">
	<div class="login-top">
		<span class="close">&times;</span>
	</div>
	<div class="login">
		<h3 class="text-center">
			Bavel Log In
		</h3>
		<div class="form-input">
			<label>Email</label> <br>
			<input type="email" name="" class="form-control">
		</div>
		<div class="form-input">
			<label>Password</label> <br>
			<input type="password" name="" class="form-control">
		</div>
		<div class="form-input">
			<button type="submit" class="btn btn-login">Log In</button>
		</div>
		<a href="" class="text-center">Don't have account ? Register now</a>
	</div>
</div>

<div class="login-overlay"></div>

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
				<h3>find your destination right now !</h3>
				<p>Berikut adalah daftar destinasi yang dapat anda kunjung di Probolinggo.
				</p>
			</div>
			<div class="col-form">
				<form method="POST">

				</form>
			</div>
		</div>
		<div class="single-body">
			<?php foreach ($hotel as $w) { ?>
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
								<br>
								<b><?='Rp. '. number_format($w['harga'],0). ' /malam'?></b> 
								<!-- <br> -->
								<!-- <a href="single-destination.html" class="btn btn-orange btn-round">See Details</a> -->
							</div>
						</div>
					</div>
				</div>
			<?php } ?>			

		</div>
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
