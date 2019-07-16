	<section class="section-header-single">
		<img src="<?=base_url()?>assets/foto/artikel/<?=$news['thumbnail']?>">
		<div class="overlay">
			<div class="header-title">
				<h3><?=$news['judul']?></h3>
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
							
							<div class="sharethis-inline-share-buttons"></div>
						
						</div>
						<div class="content-single-footer">
							<h3 class="text-center">Artikel Baru</h3>
							<div class="terkait">
								<?php $newest = $this->db->query("SELECT * FROM tb_blog ORDER BY id_blog DESC LIMIT 3")->result_array(); ?>
								<?php foreach ($newest as $n) { ?>
									<div class="col">
										<img src="<?=base_url()?>assets/foto/artikel/<?=$n['thumbnail']?>"> <br><br>
										<a href="<?=base_url()?>news/detail/<?=$n['slug_blog']?>">
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
							<form method="GET" action="<?=base_url()?>news/cari">
								<div class="content-input">
									<input type="text" name="s" class="form-control" placeholder="Search ...">
								</div>
								<div class="content-btn">
									<button type="submit" class="btn-search"><i class="ion-search"></i></button>
								</div>
							</form>
						</div>
						<div class="aside-content">
							<div class="content-title">
								<b>PAGES</b>
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
						<div class="aside-content">
							<div class="content-title">
								<b>ARTIKEL BARU</b>
							</div>
							<br>
							<div class="terkait">
								<?php $newest = $this->db->query("SELECT * FROM tb_blog ORDER BY id_blog DESC LIMIT 5")->result_array(); ?>
								<?php foreach ($newest as $n) { ?>
									<div class="col">
										<img src="<?=base_url()?>assets/foto/artikel/<?=$n['thumbnail']?>" width="300"> <br><br>
										<a href="<?=base_url()?>news/detail/<?=$n['slug_blog']?>">
											<h5 style="text-align: justify;">
												<?=$n['judul']?>
											</h5>
										</a>
									</div>
								<?php } ?>
								
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script type="text/javascript" src="<?=base_url()?>assets/homepage/js/jquery.js"></script>
	<!-- AddToAny BEGIN -->
	<script>
		var a2a_config = a2a_config || {};
		a2a_config.locale = "id";
	</script>
	<script type='text/javascript' src="https://platform-api.sharethis.com/js/sharethis.js#property=5d2f3dc34bd0b50012e2cfa2&product='inline-share-buttons'" async='async'></script>
<!-- AddToAny END -->
