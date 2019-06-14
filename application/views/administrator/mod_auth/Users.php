<div class="container-fluid">
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        DATA USERS
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
                                    <td colspan="4">
                                        <a href="<?=base_url()?>administrator/tambah_users" class="btn btn-primary waves-effect">Tambah Data</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php  
                                $no = 1;
                                foreach ($user as $k) { ?>
                                    <tr>
                                        <td><?=$no?></td>
                                        <td><?=$k['username']?></td>
                                        <td><?=$k['role']?></td>
                                        <td>
                                            <a href="<?=base_url()?>administrator/edit_users/<?=$k['id']?>" class="btn btn-primary waves-effect">Edit</a>

                                            <a href="<?=base_url()?>administrator/hapus_users/<?=$k['id']?>" class="btn btn-danger waves-effect" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a>

                                            <!-- <a href="<?=base_url()?>administrator/reset_users/<?=$k['id']?>" class="btn btn-primary waves-effect">Reset Password</a> -->

                                            <!-- <button type="button" class="btn bg-light-blue waves-effect" data-toggle="modal" data-target="#defaultModal">Reset Password</button> -->
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

<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Reset Password Untuk </h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="new_password" class="form-control" placeholder="Masukkan Password Baru">
                        </div>
                    </div>                            
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/adminBSB/plugins/jquery/jquery.min.js"></script>