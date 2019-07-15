<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="card">
		<div class="header">
			<h2>
				UPLOAD FOTO WISATA <?=$wisata['nama_wisata']?>
			</h2>
			<br>
			<div id="sukses"></div>
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

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="gal">
	<div class="card">
		<div class="header">
			<h2>
				GALLERY FOTO <?=$wisata['nama_wisata']?>
			</h2>
		</div>
		<div class="body">
			<div id="aniimated-thumbnials" class="list-unstyled row clearfix">
				<?php foreach ($gal_wis as $g) { ?>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<a href="<?=base_url()?>assets/foto/galery/wisata/<?=$g['filename']?>" data-sub-html="Demo Description">
							<img class="img-responsive thumbnail" src="<?=base_url()?>assets/foto/galery/wisata/<?=$g['filename']?>">
						</a>
						<button class="btn btn-danger waves-effect" onclick="hapus(<?=$g['token']?>)">Hapus</button>
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
		setTimeout(function() {
			$("#sukses").html(`<div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                Upload Foto Sukses
                            </div>`);
		}, 1000);
		setTimeout(function() {
			$("#sukses").html('');
			$( "#gal" ).load(`<?=base_url()?>administrator/galery_wisata/${id} #gal` );
		},3000);
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

	function hapus(token)
	{
		$.post("<?=base_url()?>administrator/hapus_galery_wisata", {token: token}, (result) => {
			setTimeout(function() {
				$("#sukses").html(`<div class="alert bg-green alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
					Hapus Foto Sukses
					</div>`);
				$( "#gal" ).load(`<?=base_url()?>administrator/galery_wisata/${id} #gal` );
			}, 1000);		
			setTimeout(function() {
				$("#sukses").html('');
			},3000);
		})
	}

</script>