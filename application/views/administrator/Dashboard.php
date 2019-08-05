<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>

    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">local_airport</i>
                </div>
                <div class="content">
                    <div class="text">WISATA</div>   
                    <?php $wisata = $this->db->query("SELECT * FROM tb_wisata")->num_rows(); ?>
                    <div class="number count-to" data-from="0" data-to="<?=$wisata?>" data-speed="15" data-fresh-interval="20"><?=$wisata?></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">hotel</i>
                </div>
                <div class="content">
                    <div class="text">HOTELS</div>
                    <?php $hotel = $this->db->query("SELECT * FROM tb_hotel")->num_rows(); ?>
                    <div class="number count-to" data-from="0" data-to="<?=$hotel?>" data-speed="1000" data-fresh-interval="20"><?=$hotel?></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">restaurant</i>
                </div>
                <div class="content">
                    <div class="text">KULINER</div>
                    <?php $kuliner = $this->db->query("SELECT * FROM tb_kuliner")->num_rows(); ?>
                    <div class="number count-to" data-from="0" data-to="<?=$kuliner?>" data-speed="1000" data-fresh-interval="20"><?=$kuliner?></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">dvr</i>
                </div>
                <div class="content">
                    <div class="text">ARTIKELS</div>
                    <?php $artikel = $this->db->query("SELECT * FROM tb_blog")->num_rows(); ?>
                    <div class="number count-to" data-from="0" data-to="<?=$artikel?>" data-speed="1000" data-fresh-interval="20"><?=$artikel?></div>
                </div>
            </div>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7906.529468994517!2d113.416205!3d-7.761724!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4b033c7ae3a4880e!2sKantor+Bupati+Probolinggo!5e0!3m2!1sid!2sid!4v1560474459832!5m2!1sid!2sid" height="450" frameborder="0" style="border:0; width: 100%" allowfullscreen></iframe>
    </div>
    <!-- #END# Widgets -->
    
</div>

<script src="<?php echo base_url(); ?>assets/adminBSB/plugins/jquery/jquery.min.js"></script>