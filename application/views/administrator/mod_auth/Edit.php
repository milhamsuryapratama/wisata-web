<div class="container-fluid">
    <!-- Input -->
    <div class="row clearfix">
        
        <form method="post" action="<?=base_url()?>administrator/edit_users/<?=$user['id']?>" enctype="multipart/form-data">
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Form Data Users
                        </h2>                    
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" placeholder="Username" value="<?=$user['username']?>">
                                    </div>
                                </div>                            
                            </div> 

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Update Password (Jika Perlu)</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                </div>                            
                            </div>    

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Role</label>
                                        <select class="form-control" name="role">
                                            <?php if ($user['role'] == 'admin') { ?>
                                                <option value="admin" selected>Admin</option>
                                                <option value="user">User</option>
                                            <?php } else { ?>
                                                <option value="admin">Admin</option>
                                                <option value="user" selected>User</option>
                                            <?php } ?>                                            
                                        </select>
                                    </div>
                                </div>                            
                            </div> 
                            
                            <button class="btn btn-danger waves-effect" name="update" onclick="return confirm('Anda Yakin Ingin Memperbarui Data Ini ?')">Update</button>
                            <button class="btn btn-danger waves-effect" type="button" onclick="self.history.back()">Cancle</button>                        
                        </div>

                    </div>
                </div>
            </div>          

        </form>

    </div>
</div>

<script src="<?php echo base_url(); ?>assets/adminBSB/plugins/jquery/jquery.min.js"></script>
