<div class="container-fluid">
    <!-- Input -->
    <div class="row clearfix">
        
        <form method="post" action="<?=base_url()?>administrator/edit_budaya/<?=$budaya['id_budaya']?>" enctype="multipart/form-data">
            
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Form Data Budaya
                        </h2>                    
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Nama Budaya</label>
                                        <input type="text" name="nama_budaya" class="form-control" placeholder="Nama Budaya" value="<?=$budaya['nama_budaya']?>">
                                    </div>
                                </div>                            
                            </div>
                            <!-- <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Alamat Budaya</label>
                                        <input type="text" name="alamat_budaya" class="form-control" placeholder="Alamat Budaya" value="<?=$budaya['alamat_budaya']?>">
                                    </div>
                                </div>  
                            </div> -->
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea id="deskripsi" name="deskripsi" class="form-control"><?=$budaya['deskripsi']?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="header bg-red">
                        <h2>
                            Peta <small></small>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <!-- <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="long" class="form-control" placeholder="Longitude" value="<?=$wisata['lang_wisata']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="lat" class="form-control" placeholder="Latitude" value="<?=$wisata['lat_wisata']?>">
                                    </div>
                                </div>
                            
                            </div> -->     

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Perbarui Peta (Jika Perlu)</label>
                                        <input type="text" name="iframe" id="iframe" class="form-control" placeholder="Sematkan Kode Peta">
                                    </div>          
                                    <br>                      
                                    <div id="lihat_peta"></div>
                                    <br>
                                    <center><span><button type="button" id="btn_peta" class="btn bg-red waves-effect" data-toggle="modal" data-target="#largeModal">Lihat Peta Saat Ini</button> <button type="button" class="btn bg-red waves-effect" data-toggle="modal" data-target="#cara">Lihat Cara Menyematkan Peta</button></span></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="header bg-red">
                        <h2>
                            Thumbnail <small></small>
                        </h2>
                    </div>
                    <div class="body">
                        <label>Perbarui Foto (Jika Perlu)</label>
                        <input type="file" name="thumbnail" class="form-control">
                        <br/>
                        <center><img src="<?=base_url()?>assets/foto/budaya/<?=$budaya['foto_budaya']?>" height="100" width="250"></center>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="card" style="background-color: none">
                    <div class="body" align="center">
                        <button class="btn btn-danger waves-effect" name="update" onclick="return confirm('Anda Yakin Ingin Memperbarui Data Ini ?')">Update</button>
                        <button class="btn btn-danger waves-effect" type="button" onclick="self.history.back()">Cancle</button>
                    </div>
                </div>
            </div>

        </form>

    </div>
</div>

<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">PETA</h4>
            </div>
            <div class="modal-body" id="peta">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cara" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">Cara Menyematkan Peta</h4>
            </div>
            <div class="modal-body">
                1. Kunjungi <a href="https://maps.google.co.id/" target="blank">Google Maps</a>
                <br>                
                2. Cari tempat
                <br>
                <img src="<?=base_url()?>assets/semat_peta/2.png" width="500">
                <br>
                <br>
                3. Pilih Bagikan
                <br>
                <img src="<?=base_url()?>assets/semat_peta/3.png" width="500">
                <br>
                <br>
                4. Pilih Sematkan Peta
                <br>
                <img src="<?=base_url()?>assets/semat_peta/4.png" width="500">
                <br>
                <br>
                5. Klik Salin HTML
                <br>
                <img src="<?=base_url()?>assets/semat_peta/5.png" width="500">
                <br>
                <br>
                6. Paste kode peta pada form semat peta pada admin panel
                <br>
                <img src="<?=base_url()?>assets/semat_peta/6.png" width="500">
                <br>
                <br>
                7. Klik tombol lihat peta untuk melihat peta
                <br>
                <img src="<?=base_url()?>assets/semat_peta/7.png" width="500">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/adminBSB/plugins/jquery/jquery.min.js"></script>
<script src="<?=base_url()?>assets/ckeditor/ckeditor.js"></script>

<script>
    $(function() {
        CKEDITOR.replace('deskripsi', {
            height: '500px'
        });        

        $("#iframe").on('input', function() {    

            var iframe = $("#iframe").val();

            if (iframe == '') {
                $("#lihat_peta").html('');
            } else {
                $("#lihat_peta").html(`<center><button type="button" class="btn bg-red waves-effect" data-toggle="modal" data-target="#largeModal">Lihat Peta Baru</button></center>`);
                $("#peta").html('<center>'+iframe+'</center>');
            }            
        })

        $("#btn_peta").click(function() {
            $.get("<?=base_url()?>administrator/ambil_budaya/<?=$this->uri->segment(3)?>", {}, (result) => {
                $("#peta").html("<center>"+result+"</center>");
            })
        })                

        // if (iframe != '') {
        //     $("#lihat_peta").html(`<button type="button" class="btn bg-red waves-effect" data-toggle="modal" data-target="#largeModal">Lihat Peta</button>`);
        //     $("#peta").html('<center>'+iframe+'</center>');
        // }

        
    })
</script>
