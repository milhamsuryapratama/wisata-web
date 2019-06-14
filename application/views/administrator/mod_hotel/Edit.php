<div class="container-fluid">
    <!-- Input -->
    <div class="row clearfix">
        
        <form method="post" action="<?=base_url()?>administrator/update_hotel" enctype="multipart/form-data">
            
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Form Data Wisata
                        </h2>                    
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="hidden" name="id_hotel" value="<?=$hotel['id_hotel']?>">
                                        <input type="text" name="nama_hotel" class="form-control" placeholder="Nama Hotel" value="<?=$hotel['nama_hotel']?>">
                                    </div>
                                </div>                            
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="alamat_hotel" class="form-control" placeholder="Alamat Hotel" value="<?=$hotel['alamat_hotel']?>">
                                    </div>
                                </div>  
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea id="deskripsi" name="deskripsi" class="form-control"><?=$hotel['deskripsi_hotel']?></textarea>
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
                            Longitude & Latitude <small></small>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="long" class="form-control" placeholder="Longitude" value="<?=$hotel['long_hotel']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="lat" class="form-control" placeholder="Latitude" value="<?=$hotel['lat_hotel']?>">
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
                            Thumbnail <small></small>
                        </h2>
                    </div>
                    <div class="body">
                        <input type="file" name="thumbnail" class="form-control">
                        <br/>
                        <center><img src="<?=base_url()?>assets/foto/hotel/<?=$hotel['foto_hotel']?>"></center>
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

<script src="<?php echo base_url(); ?>assets/adminBSB/plugins/jquery/jquery.min.js"></script>
<script src="<?=base_url()?>assets/ckeditor/ckeditor.js"></script>

<script>
    $(function() {
        CKEDITOR.replace('deskripsi', {
            height: '300px'
        });
    })
</script>
