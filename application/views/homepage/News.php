

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
		<img src="<?=base_url()?>assets/homepage/img/bg-news.jpg">
		<div class="overlay">
			<div class="header-title">
				<h3>Any question?</h3>
				<span class="ion-record"></span>&nbsp;
				<span class="ion-record"></span>&nbsp;
				<span class="ion-record"></span>
			</div>
	</section>
	</section>

	<ul class="breadcrumb">
		<li><a href="index.html">Home</a></li>
		<li>News</li>
	</ul>

	<section class="section section-archive">
		<div class="container">
			<div class="row">
				<div class="content">
					<?php foreach ($news as $n) { ?>
						<div class="col">
							<div class="content-img">
								<img src="<?=base_url()?>assets/foto/artikel/<?=$n['thumbnail']?>">
								<span class="label-img"> News</span>
							</div>
							<div class="content-desc">
								<div class="content-desc-title">
									<a href="single-news.html">
										<h3> <?=$n['judul']?></h3>
									</a>
								</div>
								<div class="content-desc-text" align="justify">
									<ul class="breadcrumb-post">
										<li><i class="ion-calendar"></i> <?=date('d F Y', strtotime($n['tgl_post']))?></li>
										<li><i class="ion-person"></i> Admin</li>
									</ul>
									<p>
										<?=substr($n['isi'],0,300);?>
									</p>
									<a href="<?=base_url()?>news/detail/<?=$n['slug_blog']?>" class="btn btn-md btn-orange" style="margin-top: 10px;">Read More</a>
								</div>
							</div>
						</div>
					<?php } ?>					

					<?php echo $halaman; ?>	
					
				</div>				

				<div class="aside">
					<div class="row">
						<div class="aside-content">
							<form method="POST">
								<div class="content-input">
									<input type="text" name="cari" class="form-control" placeholder="Search ...">
								</div>
								<div class="content-btn">
									<button type="submit" class="btn-search"><i class="ion-search"></i></button>
								</div>
							</form>
						</div>
						<div class="aside-content">
							<div class="content-title">
								<b>KATEGORI</b>
							</div>
							<div class="content-body">
								<ul style="padding: 0;list-style: none;">
									<a href="<?=base_url()?>destinasi"><li>Destinasi</li></a>
									<a href="<?=base_url()?>akomodasi"><li>Akomodasi</li></a>
									<a href="<?=base_url()?>kuliner"><li>Kuliner</li></a>
									<a href="<?=base_url()?>news"><li>News</li></a>
								</ul>
							</div>
						</div>
						<!-- <div class="aside-content">
							<div class="content-title">
								<b>REKOMENDASI</b>
							</div>
							<div class="content-body">
								<ul style="padding: 0;list-style: none;">
									<li>Lorem Ipsum Dolor</li>
									<li>Lorem Ipsum Dolor</li>
									<li>Lorem Ipsum Dolor</li>
									<li>Lorem Ipsum Dolor</li>
								</ul>
							</div>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</section>
