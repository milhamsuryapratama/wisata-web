	<section class="section-header-single">
		<img src="<?=base_url()?>assets/homepage/img/bg-news.jpg">
		<div class="overlay">
			<div class="header-title">
				<h3>What's Happen</h3>
				<span class="ion-record"></span>&nbsp;
				<span class="ion-record"></span>&nbsp;
				<span class="ion-record"></span>
			</div>
	</section>

	<ul class="breadcrumb">
		<li><a href="index.html">Home</a></li>
		<li>Detail News</li>
	</ul>

	<section class="section section-archive">
		<div class="container" >
			<div class="row">
				<div class="content">
					<div class="content-single">
						<div class="content-single-title">
							<h3><?=$news['judul']?></h3>
							<img src="<?=base_url()?>assets/foto/artikel/<?=$news['thumbnail']?>" class="image">
						</div>
						<div class="content-single-body" align="justify">
							<p><?=$news['isi']?></p>

							<!-- <div class="label">
								<a href=""><span class="ion-pricetags"></span> &nbsp; News</a>
								<a href=""><span class="ion-android-share-alt"></span> &nbsp; Share</a>
								<a href=""><span class="ion-heart"></span> &nbsp; Like</a>
							</div> -->
						</div>
						<div class="content-single-footer">
							<h3 class="text-center">Artikel Baru</h3>
							<div class="terkait">
								<?php $newest = $this->db->query("SELECT * FROM tb_blog ORDER BY id_blog DESC LIMIT 3")->result_array(); ?>
								<?php foreach ($newest as $n) { ?>
									<div class="col">
										<img src="<?=base_url()?>assets/foto/artikel/<?=$n['thumbnail']?>"> <br><br>
										<a href="#">
											<h3>
												<?=$n['judul']?>
											</h3>
										</a>
									</div>
								<?php } ?>
								
							</div>
						</div>
					</div>
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

	<!-- <script type="text/javascript" src="<?=base_url()?>assets/homepage/js/jquery.js"></script>
