<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title><?=$title?></title>
        <!-- Favicon-->
        <link rel="icon" href="<?php echo base_url(); ?>assets/adminBSB/favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="<?php echo base_url(); ?>assets/adminBSB/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">        

        <link href="<?php echo base_url(); ?>assets/adminBSB/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/adminBSB/plugins/node-waves/waves.css" rel="stylesheet" />

        <link href="<?php echo base_url(); ?>assets/adminBSB/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/adminBSB/plugins/dropzone/dropzone.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/adminBSB/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />


        <link href="<?php echo base_url(); ?>assets/adminBSB/plugins/morrisjs/morris.css" rel="stylesheet" />
        <!-- Animation Css -->
        <link href="<?php echo base_url(); ?>assets/adminBSB/plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="<?php echo base_url(); ?>assets/adminBSB/css/style.css" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="<?php echo base_url(); ?>assets/adminBSB/css/themes/all-themes.css" rel="stylesheet" />
    </head>

    <body class="theme-red">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->
        <!-- Search Bar -->
        <div class="search-bar">
            <div class="search-icon">
                <i class="material-icons">search</i>
            </div>
            <input type="text" placeholder="START TYPING...">
            <div class="close-search">
                <i class="material-icons">close</i>
            </div>
        </div>
        <!-- #END# Search Bar -->
        <!-- Top Bar -->
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                    <a href="javascript:void(0);" class="bars"></a>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>" target="_blank">ADMIN PANEL</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Call Search -->
                        <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                        <!-- #END# Call Search -->                                            
                    </ul>
                </div>
            </div>
        </nav>
        <!-- #Top Bar -->
        <section>
            <!-- Left Sidebar -->
            <aside id="leftsidebar" class="sidebar">
                <!-- User Info -->
                <div class="user-info">
                    <div class="image">
                        <?php $f = $this->db->query("SELECT foto FROM tb_auth WHERE id = '".$this->session->userdata('id')."' ")->row_array();
                            if ($f['foto'] == '') { ?>
                                <img src="<?=base_url()?>assets/homepage/img/kabupaten-probolinggo.png" alt="User" style="width: 20%; border-radius: 0"/>
                            <?php } else { ?>
                                <img src="<?=base_url()?>assets/foto/user/<?=$f['foto']?>" width="48" height="48" alt="Foto Profile" />
                            <?php } ?>
                    </div>
                    <div class="info-container">
                        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black; font-weight: bold;">Halo <?=$this->session->userdata('username')?></div>
                        <!-- <div class="email">john.doe@example.com</div> -->
                        <div class="btn-group user-helper-dropdown">
                            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                                <li role="seperator" class="divider"></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                                <li role="seperator" class="divider"></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #User Info -->
                <!-- Menu -->
                <div class="menu">
                    <ul class="list">
                        <li class="header">MAIN NAVIGATION</li>
                        <li <?php if ($this->uri->segment(2) == 'dashboard') {
                            echo "class='active'";
                        } ?>>
                            <a href="<?=base_url()?>administrator/dashboard">
                                <i class="material-icons">home</i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li <?php if ($this->uri->segment(2) == 'wisata' OR $this->uri->segment(2) == 'tambah_wisata' OR $this->uri->segment(2) == 'edit_wisata' OR $this->uri->segment(2) == 'galery_wisata') {
                            echo "class='active'";
                        } ?>>
                            <a href="<?=base_url()?>administrator/wisata" class=" waves-effect waves-block">
                                <i class="material-icons">text_fields</i>
                                <span>Wisata</span>
                            </a>
                        </li>
                        <li <?php if ($this->uri->segment(2) == 'hotel' OR $this->uri->segment(2) == 'tambah_hotel' OR $this->uri->segment(2) == 'edit_hotel' OR $this->uri->segment(2) == 'galery_hotel') {
                            echo "class='active'";
                        } ?>>
                            <a href="<?=base_url()?>administrator/hotel" class=" waves-effect waves-block">
                                <i class="material-icons">text_fields</i>
                                <span>Hotel</span>
                            </a>
                        </li>
                        <li <?php if ($this->uri->segment(2) == 'kuliner' OR $this->uri->segment(2) == 'tambah_kuliner' OR $this->uri->segment(2) == 'edit_kuliner' OR $this->uri->segment(2) == 'galery_kuliner') {
                            echo "class='active'";
                        } ?>>
                            <a href="<?=base_url()?>administrator/kuliner" class=" waves-effect waves-block">
                                <i class="material-icons">text_fields</i>
                                <span>Kuliner</span>
                            </a>
                        </li>
                        <li <?php if ($this->uri->segment(2) == 'budaya' OR $this->uri->segment(2) == 'tambah_budaya' OR $this->uri->segment(2) == 'edit_budaya' OR $this->uri->segment(2) == 'galery_budaya') {
                            echo "class='active'";
                        } ?>>
                            <a href="<?=base_url()?>administrator/budaya" class=" waves-effect waves-block">
                                <i class="material-icons">text_fields</i>
                                <span>Budaya</span>
                            </a>
                        </li>
                        <li <?php if ($this->uri->segment(2) == 'blog' OR $this->uri->segment(2) == 'tambah_artikel' OR $this->uri->segment(2) == 'edit_artikel') {
                            echo "class='active'";
                        } ?>>
                            <a href="<?=base_url()?>administrator/blog" class=" waves-effect waves-block">
                                <i class="material-icons">text_fields</i>
                                <span>Blog / Artikel</span>
                            </a>
                        </li>
                        <?php if ($this->session->userdata('role') == 'admin') { ?>
                            <li <?php if ($this->uri->segment(2) == 'users' OR $this->uri->segment(2) == 'tambah_users' OR $this->uri->segment(2) == 'edit_users') {
                            echo "class='active'";
                        } ?>>
                                <a href="<?=base_url()?>administrator/users" class=" waves-effect waves-block">
                                    <i class="material-icons">text_fields</i>
                                    <span>Users</span>
                                </a>
                            </li>
                            <li <?php if ($this->uri->segment(2) == 'admin_area') {
                            echo "class='active'";
                        } ?>>
                                <a href="<?=base_url()?>administrator/admin_area/<?=$this->session->userdata('id')?>" class=" waves-effect waves-block">
                                    <i class="material-icons">text_fields</i>
                                    <span>Admin Area</span>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li <?php if ($this->uri->segment(2) == 'user_area') {
                            echo "class='active'";
                        } ?>>
                                <a href="<?=base_url()?>administrator/user_area/<?=$this->session->userdata('id')?>" class=" waves-effect waves-block">
                                    <i class="material-icons">text_fields</i>
                                    <span>User Area</span>
                                </a>
                            </li>
                        <?php } ?>
                        <li>
                            <a href="<?=base_url()?>auth/keluar" class=" waves-effect waves-block">
                                <i class="material-icons">text_fields</i>
                                <span>Keluar</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- #Menu -->
                <!-- Footer -->
                <div class="legal">
                    <div class="copyright">
                        <small><strong>Copyright © <script>document.write(new Date().getFullYear());</script> <a href="<?=base_url()?>">Diskominfo Kab. Probolinggo</a>.</strong> </strong></small>
                    </div>
                </div>
                <!-- #Footer -->
            </aside>
            <!-- #END# Left Sidebar -->
            <!-- Right Sidebar -->
            <aside id="rightsidebar" class="right-sidebar">
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                    <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                        <ul class="demo-choose-skin">
                            <li data-theme="red" class="active">
                                <div class="red"></div>
                                <span>Red</span>
                            </li>
                            <li data-theme="pink">
                                <div class="pink"></div>
                                <span>Pink</span>
                            </li>
                            <li data-theme="purple">
                                <div class="purple"></div>
                                <span>Purple</span>
                            </li>
                            <li data-theme="deep-purple">
                                <div class="deep-purple"></div>
                                <span>Deep Purple</span>
                            </li>
                            <li data-theme="indigo">
                                <div class="indigo"></div>
                                <span>Indigo</span>
                            </li>
                            <li data-theme="blue">
                                <div class="blue"></div>
                                <span>Blue</span>
                            </li>
                            <li data-theme="light-blue">
                                <div class="light-blue"></div>
                                <span>Light Blue</span>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan"></div>
                                <span>Cyan</span>
                            </li>
                            <li data-theme="teal">
                                <div class="teal"></div>
                                <span>Teal</span>
                            </li>
                            <li data-theme="green">
                                <div class="green"></div>
                                <span>Green</span>
                            </li>
                            <li data-theme="light-green">
                                <div class="light-green"></div>
                                <span>Light Green</span>
                            </li>
                            <li data-theme="lime">
                                <div class="lime"></div>
                                <span>Lime</span>
                            </li>
                            <li data-theme="yellow">
                                <div class="yellow"></div>
                                <span>Yellow</span>
                            </li>
                            <li data-theme="amber">
                                <div class="amber"></div>
                                <span>Amber</span>
                            </li>
                            <li data-theme="orange">
                                <div class="orange"></div>
                                <span>Orange</span>
                            </li>
                            <li data-theme="deep-orange">
                                <div class="deep-orange"></div>
                                <span>Deep Orange</span>
                            </li>
                            <li data-theme="brown">
                                <div class="brown"></div>
                                <span>Brown</span>
                            </li>
                            <li data-theme="grey">
                                <div class="grey"></div>
                                <span>Grey</span>
                            </li>
                            <li data-theme="blue-grey">
                                <div class="blue-grey"></div>
                                <span>Blue Grey</span>
                            </li>
                            <li data-theme="black">
                                <div class="black"></div>
                                <span>Black</span>
                            </li>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="settings">
                        <div class="demo-settings">
                            <p>GENERAL SETTINGS</p>
                            <ul class="setting-list">
                                <li>
                                    <span>Report Panel Usage</span>
                                    <div class="switch">
                                        <label><input type="checkbox" checked><span class="lever"></span></label>
                                    </div>
                                </li>
                                <li>
                                    <span>Email Redirect</span>
                                    <div class="switch">
                                        <label><input type="checkbox"><span class="lever"></span></label>
                                    </div>
                                </li>
                            </ul>
                            <p>SYSTEM SETTINGS</p>
                            <ul class="setting-list">
                                <li>
                                    <span>Notifications</span>
                                    <div class="switch">
                                        <label><input type="checkbox" checked><span class="lever"></span></label>
                                    </div>
                                </li>
                                <li>
                                    <span>Auto Updates</span>
                                    <div class="switch">
                                        <label><input type="checkbox" checked><span class="lever"></span></label>
                                    </div>
                                </li>
                            </ul>
                            <p>ACCOUNT SETTINGS</p>
                            <ul class="setting-list">
                                <li>
                                    <span>Offline</span>
                                    <div class="switch">
                                        <label><input type="checkbox"><span class="lever"></span></label>
                                    </div>
                                </li>
                                <li>
                                    <span>Location Permission</span>
                                    <div class="switch">
                                        <label><input type="checkbox" checked><span class="lever"></span></label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
            <!-- #END# Right Sidebar -->
        </section>

        <section class="content">
            <?php
            echo $contents;
            ?>
        </section>

        <!-- Jquery Core Js -->
        <!-- <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/jquery/jquery.min.js"></script> -->

        <!-- Bootstrap Core Js -->
        <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/bootstrap/js/bootstrap.js"></script>

        <!-- Select Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/bootstrap-select/js/bootstrap-select.js"></script>

        <!-- Slimscroll Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/node-waves/waves.js"></script>

        <!-- Jquery CountTo Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/jquery-countto/jquery.countTo.js"></script>

        <!-- Morris Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/raphael/raphael.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/morrisjs/morris.js"></script>

        <!-- ChartJs -->
        <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/chartjs/Chart.bundle.js"></script>

        <!-- Flot Charts Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/flot-charts/jquery.flot.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/flot-charts/jquery.flot.resize.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/flot-charts/jquery.flot.pie.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/flot-charts/jquery.flot.categories.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/flot-charts/jquery.flot.time.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/js/pages/charts/chartjs.js"></script>

        <!-- Jquery DataTable Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/jquery-datatable/jquery.dataTables.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminBSB/js/pages/tables/jquery-datatable.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminBSB/js/pages/ui/modals.js"></script>        

        <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/jquery-validation/jquery.validate.js"></script>


        <!-- Sparkline Chart Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/adminBSB/plugins/jquery-sparkline/jquery.sparkline.js"></script>

        <!-- Custom Js -->
        <script src="<?php echo base_url(); ?>assets/adminBSB/js/pages/forms/form-validation.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminBSB/js/admin.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminBSB/js/pages/index.js"></script>                


        <!-- Demo Js -->
        <script src="<?php echo base_url(); ?>assets/adminBSB/js/demo.js"></script>

    </body>

</html>