<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin Panel Login - Probolinggo Destinations</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url(); ?>adminBSB/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/adminBSB/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/adminBSB/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/adminBSB/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/adminBSB/css/style.css" rel="stylesheet">
</head>

<body class="login-page" style="background: url('https://i.ytimg.com/vi/G0KilBhGSYc/maxresdefault.jpg');">
    <div class="login-box">
        <div class="logo">
            <center><img src="https://upload.wikimedia.org/wikipedia/commons/e/e6/Logo_Kabupaten_Probolinggo_-_Seal_of_Probolinggo_Regency.svg" style="width: 100px"></center>
        </div>
        <div class="card">
            <div class="body">
                <?php if ($this->session->userdata('resetPassword')) { ?>
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <?=$this->session->userdata('resetPassword')?>
                    </div>
                <?php } elseif ($this->session->userdata('loginError')) { ?>
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <?=$this->session->userdata('loginError')?>
                    </div>
                <?php }  ?>
                <form id="sign_in" method="POST" action="<?=base_url()?>auth/login">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink" onclick="lihatPassword()">
                            <label for="rememberme">Lihat Password</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20" align="center">
                        <div class="col-xs-12">
                            <a href="<?=base_url()?>auth/lupa_password" style="font-weight: bold;">Lupa Password ?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/adminBSB/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>assets/adminBSB/js/pages/examples/sign-in.js"></script>
    <script>
        function lihatPassword()
        {
            var temp = document.getElementById("password"); 
            if (temp.type === "password") { 
              temp.type = "text"; 
            } else { 
              temp.type = "password"; 
            } 
        }
  </script>
</body>

</html>