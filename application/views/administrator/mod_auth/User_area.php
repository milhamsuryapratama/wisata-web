<div class="container-fluid">
    <!-- Input -->
    <div class="row clearfix">
        
        <form method="post" action="<?=base_url()?>administrator/edit_users_area/<?=$user['id']?>" enctype="multipart/form-data">

            <div class="col-12">
                <?php if ($this->session->userdata('updateFotoProfile')) { ?>
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <?=$this->session->userdata('updateFotoProfile')?>
                    </div>
                <?php } elseif ($this->session->userdata('updateDataUser')) { ?>
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <?=$this->session->userdata('updateDataUser')?>
                    </div>
                <?php } ?>
            </div>
            
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">                

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

        <form action="<?=base_url()?>administrator/update_foto_profil_user/<?=$user['id']?>" method="post" enctype="multipart/form-data">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="row clearfix" id="pictures">
                            <?php if ($user['foto'] == '') { ?>
                                <center><img src="https://lh5.ggpht.com/_S0f-AWxKVdM/S5TpU6kRmUI/AAAAAAAAL4Y/wrjx3_23kw4/s72-c/d_silhouette%5B2%5D.jpg" width="300" height="400"></center>
                            <?php } else { ?>
                                <center><img src="<?=base_url()?>assets/foto/user/<?=$user['foto']?>"></center>
                            <?php } ?>
                        </div>
                        <br>
                        <div>
                            <input type="file" name="foto_user" id="foto_user" class="form-control">
                            <br>
                            <button class="btn btn-danger waves-effect" name="update_foto_profil">Update Foto Profil</button>                        
                        </div>

                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

<script src="<?php echo base_url(); ?>assets/adminBSB/plugins/jquery/jquery.min.js"></script>
<script>
    $(function() {
        $("#foto_user").on('change', function() {
            var total_file = document.getElementById('foto_user').files.length;
            for (var i = 0; i < total_file; i++) {
                $("#pictures").html("<center><img src='"+URL.createObjectURL(event.target.files[i])+"' style='width: 100%; height: 10%'></center>");
                //console.log(event.target.files[i])
            }
        });
    })

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