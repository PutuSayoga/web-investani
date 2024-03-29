<?php
session_start();

include_once 'Koneksi.php';

if(!isset($_SESSION['username'])){
    die("Anda belum terdaftar");
}

$nama = $_SESSION['username'];
$get = "SELECT * 
        FROM user
        WHERE username='$nama'";
$set = mysqli_query($koneksi, $get);
$doing = mysqli_fetch_array($set);
$saldo = $doing['saldo'];

$id = $_SESSION['username'];

$sql = "select * from user where username='$id'";
        
$query = mysqli_query($koneksi, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($koneksi));
}

$row = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Profil | Investani</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dosis:400,700' rel='stylesheet' type='text/css'>
        <!-- Bootsrap -->
        <link rel="stylesheet" href="https://investani.s3.amazonaws.com/assets/css/bootstrap.min.css">
        <!-- Font awesome -->
        <link rel="stylesheet" href="https://investani.s3.amazonaws.com/assets/css/font-awesome.min.css">
        <!-- Template main Css -->
        <link rel="stylesheet" href="https://investani.s3.amazonaws.com/assets/css/style.css">
        <!-- Modernizr -->
        <script src="https://investani.s3.amazonaws.com/assets/js/modernizr-2.6.2.min.js"></script>        
        <link href="https://investani.s3.amazonaws.com/assets/cs/morris-0.4.3.min.css" rel="stylesheet" />
        <link href="https://investani.s3.amazonaws.com/assets/css/main-style.css" rel="stylesheet" />
        <link href="https://investani.s3.amazonaws.com/assets/css/timeline.css" rel="stylesheet" />
        <link href="https://investani.s3.amazonaws.com/assets/css/morris-0.4.3.min.css" rel="stylesheet" />
    </head>
    <body>
        <!-- NAVBAR
            ================================================== -->
        <header class="main-header">
        <nav class="navbar navbar-static-top">
            <div class="navbar-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <ul class="list-unstyled list-inline header-contact">
                                <li> <i class="fa fa-phone"></i> <a href="tel:">(031) 3523143  </a> </li>
                                <li> <i class="fa fa-envelope"></i> <a href="mailto:contact@ptpn10.co.id">contact@ptpn10.co.id</a> </li>
                            </ul>
                            <!-- /.header-contact  -->
                        </div>
                        <?php
                                echo "<div class=\"col-sm-6 col-xs-12 text-right\">";
                                echo "<ul class=\"list-unstyled list-inline header-social\">";
                                echo "<li><img src=\"https://investani.s3.amazonaws.com/assets/images/icons/wallet.png\"></li>";
                                $formattedNum = number_format($saldo,0,',','.')."<br>";
                                echo "<li><a class=\"is-active\" href=\"saldo-cf-inv.php\">Rp $formattedNum</a></li>";
                                echo "<li><a class=\"is-active\" href=\"logout.php\">Keluar</a></li></ul></div>";
                            ?>
                        <div class="col-sm-6 col-xs-12 text-right">
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-main">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="home-cf-in.php"><img src="https://investani.s3.amazonaws.com/assets/images/ptpnx-logo.png" alt=""></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="home-cf-inv.php">Beranda</a></li>
                            <li><a href="dashboard-cf-inv.php">Dashboard</a></li>
                            <li><a class="is-active" href="profil-cf-inv.php">Profil</a></li>
                            <li><a href="proyek-cf-inv.php">Proyek</a></li>
                            <li><a href="faq-cf-inv.php">FAQ</a></li>
                        </ul>
                    </div>
                    <!-- /#navbar -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.navbar-main -->
        </nav>
        <div class="page-heading text-center">
            <div class="container zoomIn animated">
                <h1 class="page-title">Profil<span class="title-under"></span></h1>
                <p class="page-description">
                    Platform Pengumpulan Dana Untuk Pengolahan Lahan
                </p>
            </div>
        </div>
        <div class="main-container">
            <div class="container">
                <hr>
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-3">
                        <div class="text-center">
                            <img src="https://investani.s3.amazonaws.com/assets/images/team/team.png" alt="">
                        </div>
                    </div>
                    <!-- edit form column -->
                    <div class="col-md-9 personal-info">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Nama Lengkap:</label>
                                <div class="col-lg-8">
                                    <output class="form-control">
                                        <?php
                                            echo $row['nama'];
                                        ?>
                                    </output>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Email:</label>
                                <div class="col-lg-8">
                                    <output class="form-control">
                                        <?php
                                            echo $row['email'];
                                        ?>
                                    </output>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Alamat:</label>
                                <div class="col-lg-8">
                                    <output class="form-control">
                                        <?php
                                            echo $row['alamat'];
                                        ?>
                                    </output>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nomor Handphone:</label>
                                <div class="col-lg-8">
                                    <output class="form-control">
                                        <?php
                                            echo $row['nomorhp'];
                                        ?>
                                    </output>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nomor Rekening:</label>
                                <div class="col-lg-8">
                                    <output class="form-control">
                                        <?php
                                            echo $row['rekening'];
                                        ?>
                                    </output>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nomor Pokok Wajib Pajak:</label>
                                <div class="col-lg-8">
                                    <output class="form-control">
                                        <?php
                                            echo $row['npwk'];
                                        ?>
                                    </output>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nomor Induk Keluarga:</label>
                                <div class="col-lg-8">
                                    <output class="form-control">
                                        <?php
                                            echo $row['nik'];
                                        ?>
                                    </output>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-8">
                                    <a class="btn btn-primary" href="edit-profil-cf-inv.php">Edit</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <footer class="main-footer">
            <div class="footer-top">
            </div>
            <div class="footer-main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="footer-col">
                                <h4 class="footer-title">Tentang Kami <span class="title-under"></span></h4>
                                <div class="footer-content">
                                    <p>
                                        <strong>INVESTANI</strong> 
                                    </p>
                                    <p>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="footer-col">
                                <h4 class="footer-title"> Media Sosial <span class="title-under"></span></h4>
                                <div class="footer-content">
                                    <ul class="tweets list-unstyled">
                                        <li class="tweet"> 
                                            Twitter 
                                        </li>
                                        <li class="tweet"> 
                                            Twitter
                                        </li>
                                        <li class="tweet"> 
                                            Twitter
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="footer-col">
                                <h4 class="footer-title">Kontak Kami <span class="title-under"></span></h4>
                                <div class="footer-content">
                                    <div class="footer-form">
                                        <div class="footer-form" >
                                            <ul class="list-unstyled contact-items-list">
                                                <li class="contact-item"> <span class="contact-icon"> <i class="fa fa-map-marker"></i></span> Jl. Jembatan Merah No 3-11, Surabaya 60175 Jawa Timur, Indonesia</li>
                                                <li class="contact-item"> <span class="contact-icon"> <i class="fa fa-phone"></i></span> 031 3523143</li>
                                                <li class="contact-item"> <span class="contact-icon"> <i class="fa fa-envelope"></i></span> contact@ptpn10.co.id</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container text-right">
                    INVESTANI @ copyrights 2018 - by <a href="http://www.ptpn10.co.id" target="_blank">PTPN X</a>
                </div>
            </div>
        </footer>
        <!-- main-footer -->
        <!-- /.modal -->
        <!--  Scripts
            ================================================== -->
        <!-- jQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="https://investani.s3.amazonaws.com/assets/js/jquery-1.11.1.min.js"><\/script>')</script>
        <!-- Bootsrap javascript file -->
        <script src="https://investani.s3.amazonaws.com/assets/js/bootstrap.min.js"></script>
        <!-- owl carouseljavascript file -->
        <script src="https://investani.s3.amazonaws.com/assets/js/owl.carousel.min.js"></script>
        <!-- Template main javascript -->
        <script src="https://investani.s3.amazonaws.com/assets/js/main.js"></script>
    </body>
</html>