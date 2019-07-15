
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin Panel - Lupa Password</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url(); ?>assets/adminBSB/favicon.ico" type="image/x-icon">

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

<body class="fp-page" style="background: url('https://i.ytimg.com/vi/G0KilBhGSYc/maxresdefault.jpg');">
    <div class="fp-box">
        <div class="logo">
            <center><img src="https://upload.wikimedia.org/wikipedia/commons/e/e6/Logo_Kabupaten_Probolinggo_-_Seal_of_Probolinggo_Regency.svg" style="width: 100px"></center>
        </div>
        <div class="card">
            <div class="body">
                <form id="forgot_password" method="POST" action="<?=base_url()?>auth/kirim_email"> 
                    <div class="msg">
                        Masukkan Username Anda Untuk Mendapatkan Password.
                    </div>
                    <div class="msg">
                        Jika anda lupa dengan akses login akun anda (username dan password), silahkan menghubungi administrator untuk mereset akun anda.
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Dapatkan Password</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="<?=base_url()?>auth" style="font-weight: bold;">Login ?</a>
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
    <script src="<?php echo base_url(); ?>assets/adminBSB/js/pages/examples/forgot-password.js"></script>
</body>

</html>