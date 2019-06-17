<div class="container-fluid">
    <!-- Input -->
    <div class="row clearfix">
        
        <form method="post" action="<?=base_url()?>administrator/edit_kuliner/<?=$kuliner['id_kuliner']?>" enctype="multipart/form-data">
            
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Form Data Kuliner
                        </h2>                    
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Nama Kuliner</label>
                                        <input type="text" name="nama_kuliner" class="form-control" placeholder="Nama Kuliner" value="<?=$kuliner['nama_kuliner']?>">
                                    </div>
                                </div>                            
                            </div>
                            <!-- <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="alamat_kuliner" class="form-control" placeholder="Alamat Kuliner" value="<?=$kuliner['alamat_kuliner']?>">
                                    </div>
                                </div>  
                            </div> -->
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Deskripsi Kuliner</label>
                                        <textarea id="deskripsi" name="deskripsi" class="form-control"><?=$kuliner['deskripsi_kuliner']?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
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
                                        <input type="text" name="long" class="form-control" placeholder="Longitude" value="<?=$kuliner['long_kuliner']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="lat" class="form-control" placeholder="Latitude" value="<?=$kuliner['lat_kuliner']?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="header bg-red">
                        <h2>
                            Thumbnail <small></small>
                        </h2>                        
                    </div>
                    <div class="body">
                        <label>Perbarui Foto (Bila Perlu)</label>
                        <input type="file" name="thumbnail" class="form-control">
                        <br/>
                        <center><img src="<?=base_url()?>assets/foto/kuliner/<?=$kuliner['foto_kuliner']?>"></center>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="card" style="background-color: none">
                    <div class="body" align="center">
                        <button class="btn btn-danger waves-effect" name="update" onclick="return confirm('Anda Yakin Ingin Memperbarui Data Ini ?')">Submit</button>
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
            height: '500px'
        });
    })
</script>
