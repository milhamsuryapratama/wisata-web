<div class="container-fluid">
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        DATA WISATA
                    </h2>
                    <br>
                    <?php if ($this->session->userdata('tambahDataSukses')) { ?>
                        <div class="alert bg-green alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <?=$this->session->userdata('tambahDataSukses')?>
                        </div>
                    <?php } elseif ($this->session->userdata('updateDataSukses')) { ?>
                        <div class="alert bg-green alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <?=$this->session->userdata('updateDataSukses')?>
                        </div>
                    <?php } elseif ($this->session->userdata('hapusDataSukses')) { ?>
                        <div class="alert bg-green alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <?=$this->session->userdata('updateDataSukses')?>
                        </div>
                    <?php } ?>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">                            
                            <thead>
                                <tr>
                                    <td colspan="4">
                                        <a href="tambah_wisata" class="btn btn-primary waves-effect">Tambah Data</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Wisata</th>
                                    <th>Alamat Wisata</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama_kriteria</th>
                                    <th>Alamat Wisata</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php  
                                $no = 1;
                                foreach ($wisata as $k) { ?>
                                    <tr>
                                        <td><?=$no?></td>
                                        <td><?=$k['nama_wisata']?></td>
                                        <td><?=$k['alamat_wisata']?></td>
                                        <td>
                                            <a href="<?=base_url()?>administrator/edit_wisata/<?=$k['id_wisata']?>" class="btn btn-primary waves-effect">Edit</a>

                                            <a href="<?=base_url()?>administrator/hapus_wisata/<?=$k['id_wisata']?>" class="btn btn-danger waves-effect" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a>

                                            <a href="<?=base_url()?>administrator/galery_wisata/<?=$k['id_wisata']?>" class="btn btn-primary waves-effect">Isi Galery Wisata</a>
                                        </td>
                                    </tr>
                                <?php $no++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/adminBSB/plugins/jquery/jquery.min.js"></script>