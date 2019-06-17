<div class="container-fluid">
    <!-- Input -->
    <div class="row clearfix">
        
        <form method="post" action="<?=base_url()?>administrator/tambah_hotel" enctype="multipart/form-data">
            
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Form Data Hotel
                        </h2>                    
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label> Nama Hotel</label>
                                        <input type="text" name="nama_hotel" class="form-control" placeholder="Nama Hotel">
                                    </div>
                                </div>                            
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label> Alamat Hotel</label>
                                        <input type="text" name="alamat_hotel" class="form-control" placeholder="Alamat Hotel">
                                    </div>
                                </div>  
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label> Deskripsi</label>
                                        <textarea id="deskripsi" name="deskripsi" class="form-control"></textarea>
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
                                        <input type="text" name="long" class="form-control" placeholder="Longitude">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="lat" class="form-control" placeholder="Latitude">
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Sematkan Peta</label>
                                        <input type="text" name="iframe" id="iframe" class="form-control" placeholder="Sematkan Kode Peta">
                                    </div>          
                                    <br>                      
                                    <div id="lihat_peta" align="center"></div>
                                    <br>
                                    <center><button type="button" class="btn bg-red waves-effect" data-toggle="modal" data-target="#cara">Lihat Cara Menyematkan Peta</button></center>
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
                            Harga Per Malam <small></small>
                        </h2>
                    </div>
                    <div class="body">
                        <label>Harga Sewa Per-Malam (Rp)</label>
                        <input type="text" name="harga" class="form-control" id="harga">
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
                        <label> Foto</label>
                        <input type="file" name="thumbnail" class="form-control">
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="card" style="background-color: none">
                    <div class="body" align="center">
                        <button class="btn btn-danger waves-effect" name="submit">Submit</button>
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
                $("#lihat_peta").html(`<button type="button" class="btn bg-red waves-effect" data-toggle="modal" data-target="#largeModal">Lihat Peta</button>`);
                $("#peta").html('<center>'+iframe+'</center>');
            }            
        })

        var rupiah = document.getElementById('harga');
        rupiah.addEventListener('keyup', function(e){
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

    })

    function formatRupiah(angka, prefix){        

        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split           = number_string.split(','),
        sisa            = split[0].length % 3,
        rupiah          = split[0].substr(0, sisa),
        ribuan          = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
    }

</script>
