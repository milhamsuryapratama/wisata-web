<!-- Section -->

	<section class="section-ticket">
		<div class="header">
			<img src="<?=base_url()?>assets/foto/budaya/<?=$budaya['foto_budaya']?>">
			<div class="overlay">
				<div class="desc">
					<h3><?=$budaya['nama_budaya']?></h3>
					<!-- <span class="ion-ios-star checked"></span>
					<span class="ion-ios-star checked"></span>
					<span class="ion-ios-star checked"></span>
					<span class="ion-ios-star checked"></span>
					<span class="ion-ios-star"></span> -->
				</div>
			</div>
		</div>
		<div class="body">
			<!-- <div class="panel">
				<div class="panel-header">
					<span class="ion-android-clipboard"></span>&nbsp; Detail Ticket
				</div>
				<div class="panel-body">
					<div class="detail">
						<div class="col-1">
							<div class="col">
								<span class="ion-clock"></span> 08.00 - 16.000
							</div>
							<div class="col">
								<span class="ion-person-stalker"></span> Min 1 | Max 15 Pax
							</div>
							<div class="col">
								<span class="ion-model-s"></span> Transport
							</div>
							<div class="col">
								<span class="ion-pizza"></span> Breakfast
							</div>
						</div>
						<div class="col-2">
							<b>Star From</b>
							<h2><b style="color: #f25601">Rp. 120.000 </b><small>/ Pax</small></h2> <br>
							<a href="" data-slide="slide" data-slide-target="#find" class="btn-ticket btn-orange">Find
								Ticket</a>
						</div>
					</div>
				</div>
			</div> -->
			<div class="panel">
				<div class="panel-header">
					<span class="ion-ios-bookmarks"></span>&nbsp; Deskripsi
				</div>
				<div class="panel-body" align="justify">
					<p><?=$budaya['deskripsi']?></p>
				</div>
			</div>
			<!-- <div class="panel">
				<div class="panel-header">
					<span class="ion-ios-bookmarks"></span>&nbsp; Higlight
				</div>
				<div class="panel-body">
					<ul>
						<li>Visit to Elephant Safari Park, to learn about the diversity and ancestry of the elephants
						</li>
						<li>Museum and Elephant Discovery Information Centre, to see over 1000 fossils such as skulls,
							horns, and tusks</li>
						<li>Feed the adult and baby elephants</li>
						<li>A chance to watch the animal show, which features stunts, sports, and audience interaction
						</li>
						<li>Admission fee, insurance, and transfer service included</li>
						<li>Buffet lunch at Taro Restaurant included</li>
					</ul>
				</div>
			</div> -->
			<div class="panel">
				<div class="panel-header">
					<span class="ion-map"></span>&nbsp; Location
				</div>
				<div class="panel-body">
					<div class="col-1">
						<?=$budaya['peta_budaya']?>
					</div>
					<div class="col-2">
						<h3>Alamat</h3>
						<p><?=$budaya['alamat_budaya']?></p>
					</div>
				</div>
			</div>				

			<div class="panel">
				<div class="panel-header">
					<span class="ion-ios-bookmarks"></span>&nbsp; Galery <?=$budaya['nama_budaya']?>
				</div>
				<div class="panel-body">
					<div id="aniimated-thumbnials" class="list-unstyled row clearfix">
						
						<?php foreach ($galery as $g) { ?>
							<div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
								<a href="<?=base_url()?>assets/foto/galery/budaya/<?=$g['filename']?>" data-sub-html="Galery Budaya">
									<img class="img-responsive thumbnail" src="<?=base_url()?>assets/foto/galery/budaya/<?=$g['filename']?>">
								</a>
							</div>	
						<?php } ?>					
						
					</div>
				</div>
			</div>

		</div>
	</section>		

