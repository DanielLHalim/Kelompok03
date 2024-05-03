
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

    <title>UAS - Admin</title>

    <!-- Meta SEO -->
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <!-- Favicon ================== -->
      <!-- Standard -->
      <link rel="shortcut icon" href="assets/img/f157.png">
    <!-- FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- CSS CORE -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-reset.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/table-responsive.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css"/>
    <link rel="stylesheet" href="assets/css/daterangepicker.css"/>
    <link rel="stylesheet" href="assets/datatables/css/dataTables.bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/datatables/css/responsive.bootstrap.min.css"/>
    <!--<link rel="stylesheet" href="assets/datatables/css/buttons.bootstrap.min.css"/>-->
    <link rel="stylesheet" href="assets/datatables/css/buttons.dataTables.min.css"/>
    

    
    
</head>
<body>

    <!-- awal:wrapper -->
    <div id="wrapper">
        <div class="header-top">
            <!-- awal:navbar -->
            <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="container">
                    <!-- awal:navbar-header -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="beranda"><img src="assets/img/f157.png" width="25px" style="float: left;"><strong>John</strong>Riady<strong>.</strong></a>
                    </div>
                    <!-- akhir:navbar-header -->
            
                    <ul class="nav navbar-nav navbar-right top-menu">
                       
                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <img alt="" src="assets/img/f157.png" width="25px">
                                <span class="username">Admin</span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <div class="log-arraow-up"></div>
                                <!--<li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>-->
                                <li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- akhir:navbar -->
        </div>
        <!-- awal:header -->
        <div id="header">
            <div class="overlay">
                <nav class="navbar" role="navigation">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="btn-block btn-drop navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                <strong>MENU</strong>
                            </button>
                        </div>
                    
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <ul class="nav navbar-nav">
                             <?php 
                             if (isset($_GET['page'])){
                                if($_GET['page'] == 'beranda'){ ?>
                                <li class="active">
                                <?php }  else { ?> 
                                <li>
                                <?php } }else { ?> 
                                <li>   
                                <?php } ?>
                                    <a href="beranda">
                                        <div class="text-center">
                                            <i class="fa fa-dashboard fa-3x"></i><br>
                                            Beranda
                                        </div>
                                    </a>
                                </li>
                                <?php 
                             if (isset($_GET['page'])){
                                if($_GET['page'] == 'bahan' or
                                   $_GET['page'] == 'addbahan' or
                                   $_GET['page'] == 'editbahan'){ ?>
                                <li class="active">
                                <?php }  else { ?> 
                                <li>
                                <?php } }else { ?> 
                                <li>   
                                <?php } ?>
                                    <a href="bahan">
                                        <div class="text-center">
                                            <i class="fa fa-cubes fa-3x"></i><br>
                                            Bahan </span>
                                        </div>
                                    </a>
                                </li>
                                <?php 
                             if (isset($_GET['page'])){
                                if($_GET['page'] == 'produk' or
                                   $_GET['page'] == 'addproduk' or
                                   $_GET['page'] == 'editproduk'){ ?>
                                <li class="active">
                                <?php }  else { ?> 
                                <li>
                                <?php } }else { ?> 
                                <li>   
                                <?php } ?>
                                    <a href="produk">
                                        <div class="text-center">
                                             <i class="fa fa-cart-plus fa-3x"></i><br>
                                            Produk </span>
                                        </div>
                                    </a>
                                </li>
                                 <?php 
                             if (isset($_GET['page'])){
                                if($_GET['page'] == 'pembuatan' or
                                   $_GET['page'] == 'addpembuatan' or
                                   $_GET['page'] == 'editpembuatan'){ ?>
                                <li class="active">
                                <?php }  else { ?> 
                                <li>
                                <?php } }else { ?> 
                                <li>   
                                <?php } ?>
                                    <a href="pembuatan">
                                        <div class="text-center">
                                            <i class="fa fa-shopping-bag fa-3x"></i><br>
                                            Produksi </span>
                                        </div>
                                    </a>
                                </li>
                                <?php 
                             if (isset($_GET['page'])){
                                if($_GET['page'] == 'pekerja' or
                                   $_GET['page'] == 'addpekerja' or
                                   $_GET['page'] == 'editpekerja'){ ?>
                                <li class="active">
                                <?php }  else { ?> 
                                <li>
                                <?php } }else { ?> 
                                <li>   
                                <?php } ?>
                                    <a href="pekerja">
                                        <div class="text-center">
                                            <i class="fa fa-users fa-3x"></i><br>
                                            Pekerja </span>
                                        </div>
                                    </a>
                                </li>
                                <?php 
                              if (isset($_GET['page'])){
                                if($_GET['page'] == 'laporan'){ ?>
                                <li class="active">
                                <?php }  else { ?> 
                                <li>
                                <?php } }else { ?> 
                                <li>   
                                <?php } ?>
                                    <a href="laporan">
                                        <div class="text-center">
                                            <i class="fa fa-bar-chart-o fa-3x"></i><br>
                                            Laporan
                                        </div>
                                    </a>
                                </li>
                             <!--   
                                 <?php 
                             if (isset($_GET['page'])){
                                if($_GET['page'] == 'pengguna' or
                                   $_GET['page'] == 'addpengguna' or
                                   $_GET['page'] == 'editpengguna'){ ?>
                                <li class="active">
                                <?php }  else { ?> 
                                <li>
                                <?php } }else { ?> 
                                <li>   
                                <?php } ?>
                                    <a href="pengguna">
                                        <div class="text-center">
                                            <i class="fa fa-user fa-3x"></i><br>
                                            Pengguna</span>
                                        </div>
                                    </a>
                                </li> -->
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div>
                </nav>
            </div>
        </div>
        <!-- akhir:header -->