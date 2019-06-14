<div class="container-fluid">
    <!-- Input -->
    <div class="row clearfix">
        
        <form method="post" action="<?=base_url()?>administrator/tambah_users" enctype="multipart/form-data" id="form_advanced_validation" novalidate="novalidate">
            
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
                                        <input type="text" class="form-control" name="username" maxlength="10" minlength="3" aria-required="true" aria-invalid="true">
                                    </div>
                                </div>                            
                            </div> 

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Password</label>
                                        <input type="text" class="form-control" name="password" id="password" maxlength="10" minlength="3" aria-required="true" aria-invalid="true" onclick="lihatPassword()">
                                        <!-- <input type="password" name="password" id="password" class="form-control" placeholder="Password" onclick="lihatPassword()"> -->
                                    </div>
                                </div>    
                                <div class="demo-checkbox">
                                    <input type="checkbox" id="basic_checkbox_2" class="filled-in" onclick="lihatPassword()">
                                    <label for="basic_checkbox_2">Lihat Password</label>
                                </div>                        
                            </div>    

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Role</label>
                                        <select class="form-control" name="role">
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>
                                </div>                            
                            </div> 
                            
                            <button class="btn btn-danger waves-effect" name="submit">Submit</button>
                            <button class="btn btn-danger waves-effect" type="button" onclick="self.history.back()">Cancle</button>                        
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