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

?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Home | Crowdfunding Investani</title>
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
                                echo "<li><a class=\"is-active\" href=\"saldo-cf-in.php\">Rp $formattedNum</a></li>";
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
                                <li><a class="is-active" href="home-cf-in.php">Beranda</a></li>
                                <li><a href="dashboard-cf-in.php">Dashboard</a></li>
                                <li><a href="profil-cf-in.php">Profil</a></li>
                                <li><a href="buka-proyek-cf-in.php">Galang Dana</a></li>
                                <li><a href="faq-cf-in.php">FAQ</a></li>
                            </ul>
                        </div>
                        <!-- /#navbar -->
                    </div>
                    <!-- /.container -->
                </div>
                <!-- /.navbar-main -->
            </nav>
        </header>
        <!-- /. main-header -->
        <!-- Carousel
            ================================================== -->
        <div id="homeCarousel" class="carousel slide carousel-home" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#homeCarousel" data-slide-to="1"></li>
                <li data-target="#homeCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="https://investani.s3.amazonaws.com/assets/images/slider/home-slider-1.jpg" alt="" >
                    <div class="container">
                        <div class="carousel-caption">
                            <h2 class="carousel-title bounceInDown animated slow">SELAMAT DATANG INISIATOR</h2>
                            <h4 class="carousel-subtitle bounceInUp animated slow ">AYO BANTU PETANI INDONESIA DENGAN MEMULAI PENGUMPULAN DANA UNTUK PENGOLAHAN LAHAN</h4>
                            <a href="buka-proyek-cf-in.php" class="btn btn-lg btn-secondary hidden-xs bounceInUp animated slow" >GALANG DANA</a>
                        </div>
                        <!-- /.carousel-caption -->
                    </div>
                </div>
                <!-- /.item -->
                <div class="item ">
                    <img src="https://investani.s3.amazonaws.com/assets/images/slider/home-slider-2.jpg" alt="">
                    <div class="container">
                        <div class="carousel-caption">
                            <h2 class="carousel-title bounceInDown animated slow">CROWDFUNDING</h2>
                            <h4 class="carousel-subtitle bounceInUp animated slow">DAPATKAN KEUNTUNGAN BESAR PADA INVESTASI ANDA</h4>
                            <a href="buka-proyek-cf-in.php" class="btn btn-lg btn-secondary hidden-xs bounceInUp animated slow" >GALANG DANA</a>
                        </div>
                        <!-- /.carousel-caption -->
                    </div>
                </div>
                <!-- /.item -->
                <div class="item ">
                    <img src="https://investani.s3.amazonaws.com/assets/images/slider/home-slider-3.jpg" alt="">
                    <div class="container">
                        <div class="carousel-caption">
                            <h2 class="carousel-title bounceInDown animated slow" >SEMUA ORANG BISA BERINVESTASI</h2>
                            <h4 class="carousel-subtitle bounceInUp animated slow">Investasi Untuk Mendapatkan Keuntungan Dengan Memilih Berbagai Proyek Yang Sesuai Dengan Kebutuhan Anda</h4>
                            <a href="buka-proyek-cf-in.php" class="btn btn-lg btn-secondary hidden-xs bounceInUp animated slow" >SELENGKAPNYA</a>
                        </div>
                        <!-- /.carousel-caption -->
                    </div>
                </div>
                <!-- /.item -->
            </div>
            <a class="left carousel-control" href="#homeCarousel" role="button" data-slide="prev">
            <span class="fa fa-angle-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#homeCarousel" role="button" data-slide="next">
            <span class="fa fa-angle-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- /.carousel -->
        <div class="section-home our-causes animate-onscroll fadeIn">
            <div class="container">
                <h2 class="title-style-1">PENDANAAN YANG TELAH SELESAI<span class="title-under"></span></h2>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="cause">
                            <img src="https://investani.s3.amazonaws.com/assets/images/causes/proyek-1.jpg" alt="" class="cause-img">
                            <div class="progress cause-progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                    100%
                                </div>
                            </div>
                            <h4 class="cause-title"><a href="#">PROYEK 1 </a></h4>
                            <div class="cause-details">
                                <p> Lokasi          :   Malang</p>
                                <p> Waktu Pengerjaan    :   30 hari</p>
                                <p> Dana Terkumpul      :   Rp.100.000.000;</p>
                                <p> Kebutuhan Dana      :     Rp.100.000.000;</p>
                            </div>
                        </div>
                        <!-- /.cause -->
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="cause">
                            <img src="https://investani.s3.amazonaws.com/assets/images/causes/proyek-2.jpg" alt="" class="cause-img">
                            <div class="progress cause-progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                    100%
                                </div>
                            </div>
                            <h4 class="cause-title"><a href="#">PROYEK 2</a></h4>
                            <div class="cause-details">
                                <p> Lokasi          :   Surabaya</p>
                                <p> Waktu Pengerjaan    :   30 hari</p>
                                <p> Dana Terkumpul      :   Rp.100.000.000;</p>
                                <p> Kebutuhan Dana      :     Rp.100.000.000;</p>
                            </div>
                        </div>
                        <!-- /.cause -->
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="cause">
                            <img src="https://investani.s3.amazonaws.com/assets/images/causes/proyek-3.jpg" alt="" class="cause-img">
                            <div class="progress cause-progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                    100%
                                </div>
                            </div>
                            <h4 class="cause-title"><a href="#">PROYEK 3</a></h4>
                            <div class="cause-details">
                                <p> Lokasi          :   Malang</p>
                                <p> Waktu Pengerjaan    :   30 hari</p>
                                <p> Dana Terkumpul      :   Rp.100.000.000;</p>
                                <p> Kebutuhan Dana      :     Rp.100.000.000;</p>
                            </div>
                        </div>
                        <!-- /.cause -->
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="cause">
                            <img src="https://investani.s3.amazonaws.com/assets/images/causes/proyek-1.jpg" alt="" class="cause-img">
                            <div class="progress cause-progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                    100%
                                </div>
                            </div>
                            <h4 class="cause-title"><a href="#">PROYEK 4 </a></h4>
                            <div class="cause-details">
                                <p> Lokasi          :   Malang</p>
                                <p> Waktu Pengerjaan    :   30 hari</p>
                                <p> Dana Terkumpul      :   Rp.100.000.000;</p>
                                <p> Kebutuhan Dana      :     Rp.100.000.000;</p>
                            </div>
                        </div>
                        <!-- /.cause -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.our-causes -->
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
                                    </form>
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
        <!-- Donate Modal -->
        <div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="donateModalLabel">INVESTASI</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-donation">
                            <h3 class="title-style-1 text-center">Silahkan Isi Form Dibawah<span class="title-under"></span>  </h3>
                            <div class="row">
                                <div class="form-group col-md-12 ">
                                    <input type="text" class="form-control" id="amount" placeholder="Jumlah">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="firstName" placeholder="Nama Depan">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="lastName" placeholder="Nama Belakang">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="phone" placeholder="Nomor Telepon">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control" name="address" placeholder="Alamat">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary pull-right" name="donateNow" >INVESTASI</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal -->
        <!-- jQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="https://investani.s3.amazonaws.com/assets/js/jquery-1.11.1.min.js"><\/script>')</script>
        <!-- Bootsrap javascript file -->
        <script src="https://investani.s3.amazonaws.com/assets/js/bootstrap.min.js"></script>
        <!-- PrettyPhoto javascript file -->
        <script src="https://investani.s3.amazonaws.com/assets/js/jquery.prettyPhoto.js"></script>
        <!-- Google map  -->
        <script src="http://maps.google.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
        <!-- Template main javascript -->
        <script src="https://investani.s3.amazonaws.com/assets/js/main.js"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>