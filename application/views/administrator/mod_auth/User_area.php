<div class="container-fluid">
    <!-- Input -->
    <div class="row clearfix">
        
        <form method="post" action="<?=base_url()?>administrator/edit_users_area/<?=$user['id']?>" enctype="multipart/form-data">
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Edit Data Kamu
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
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?=$user['nama']?>">
                                    </div>
                                </div>                            
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Update Password (Jika Perlu)</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">                                        
                                    </div>
                                </div>                            
                                <div class="demo-checkbox">
                                    <input type="checkbox" id="basic_checkbox_2" class="filled-in" onclick="lihatPassword()">
                                    <label for="basic_checkbox_2">Lihat Password</label>
                                </div>
                            </div>    

                            <!-- <div class="col-sm-12">
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
                            </div>  -->
                            
                            <button class="btn btn-danger waves-effect" name="update">Update</button>                        
                        </div>

                    </div>
                </div>
            </div>          

        </form>

    </div>
</div>

<script src="<?php echo base_url(); ?>assets/adminBSB/plugins/jquery/jquery.min.js"></script>
<script>
    function lihatPassword()
    {
        var temp = document.getElementById("password"); 
        if (temp.type === "password") { 
          temp.type = "text"; 
      } 
      else { 
          temp.type = "password"; 
      } 
  }
</script>