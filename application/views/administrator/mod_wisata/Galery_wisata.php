<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="card">
		<div class="header">
			<h2>
				UPLOAD FOTO WISATA <?=$wisata['nama_wisata']?>
			</h2>
			<ul class="header-dropdown m-r--5">
				<li class="dropdown">
					<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						<i class="material-icons">more_vert</i>
					</a>
					<ul class="dropdown-menu pull-right">
						<li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
						<li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
						<li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="body">
			<div class="dropzone">

				<div class="dz-message">
					<h3> Klik atau Drop gambar disini</h3>
				</div>

			</div>
		</div>
	</div>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="card">
		<div class="header">
			<h2>
				GALLERY FOTO <?=$wisata['nama_wisata']?>
			</h2>
			<ul class="header-dropdown m-r--5">
				<li class="dropdown">
					<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						<i class="material-icons">more_vert</i>
					</a>
					<ul class="dropdown-menu pull-right">
						<li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
						<li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
						<li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="body">
			<div id="aniimated-thumbnials" class="list-unstyled row clearfix">
				<?php foreach ($gal_wis as $g) { ?>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<a href="<?=base_url()?>assets/foto/galery/wisata/<?=$g['filename']?>" data-sub-html="Demo Description">
							<img class="img-responsive thumbnail" src="<?=base_url()?>assets/foto/galery/wisata/<?=$g['filename']?>">
						</a>
					</div>	
				<?php } ?>					
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url(); ?>assets/adminBSB/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminBSB/plugins/dropzone/dropzone.js"></script>
<script src="<?php echo base_url(); ?>assets/adminBSB/plugins/light-gallery/js/lightgallery-all.js"></script>
<script src="<?php echo base_url(); ?>assets/adminBSB/js/pages/medias/image-gallery.js"></script>


<script>
	Dropzone.autoDiscover = false;
	
	var id = <?=$this->uri->segment(3)?>;

	var foto_upload= new Dropzone(".dropzone",{
		url: `<?php echo base_url('administrator/simpan_galery_wisata/${id}') ?>`,
		maxFilesize: 2,
		method:"post",
		acceptedFiles:"image/*",
		paramName:"userfile",
		dictInvalidFileType:"Type file ini tidak dizinkan",
		addRemoveLinks:true,
	});

	foto_upload.on("sending",function(a,b,c){
		a.token=Math.random();
		c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
	});

	foto_upload.on("removedfile",function(a){
		var token=a.token;
		$.ajax({
			type:"post",
			data:{token:token},
			url:"<?php echo base_url('administrator/hapus_galery_wisata/') ?>",
			cache:false,
			dataType: 'json',
			success: function(){
				console.log("Foto terhapus");
			},
			error: function(){
				console.log("Error");

			}
		});
	});

</script>