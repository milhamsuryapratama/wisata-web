<div class="container-fluid">
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        DATA BLOG / ARTIKEL
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
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">                            
                            <thead>
                                <tr>
                                    <td colspan="5">
                                        <a href="<?=base_url()?>administrator/tambah_artikel" class="btn btn-primary waves-effect">Tambah Data</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Oleh</th>
                                    <th>Tanggal Posting</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Oleh</th>
                                    <th>Tanggal Posting</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php  
                                $no = 1;
                                foreach ($artikel as $k) { ?>
                                    <tr>
                                        <td><?=$no?></td>
                                        <td><?=$k['judul']?></td>
                                        <td><?=$k['username']?></td>
                                        <td><?=date('d F Y', strtotime($k['tgl_post']))?></td>
                                        <td>
                                            <a href="<?=base_url()?>administrator/edit_artikel/<?=$k['id_blog']?>" class="btn btn-primary waves-effect">Edit</a>

                                            <a href="<?=base_url()?>administrator/hapus_artikel/<?=$k['id_blog']?>" class="btn btn-danger waves-effect" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a>
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