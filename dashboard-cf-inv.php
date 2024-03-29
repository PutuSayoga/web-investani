<?php
session_start();

include_once 'Koneksi.php';

if(!isset($_SESSION['username'])){
    die();
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
        <title>Dashboard | Investani</title>
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
                            <li><a class="is-active" href="dashboard-cf-inv.php">Dashboard</a></li>
                            <li><a href="profil-cf-inv.php">Profil</a></li>
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
                <h1 class="page-title">Dashboard Investor<span class="title-under"></span></h1>
                <p class="page-description">
                    Platform Pengumpulan Dana Untuk Pengolahan Lahan
                </p>
            </div>
        </div>
        <div class="container">
            <!--  page-wrapper -->
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <!--Simple table example -->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <i class="fa fa-credit-card fa-fw"></i>&nbsp; Daftar Proyek
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Proyek</th>
                                                        <th>Durasi Pendanaan</th>
                                                        <th>Durasi Pengerjaan</th>
                                                        <th>Total Saham(Rp)</th>
                                                        <th>Proposal</th>
                                                        <th>Laporan</th>
                                                        <th>Keterangan</th>
                                                        <th>Lain-lain</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $user = $_SESSION['username'];
                                                    $sql = "select * from dana where investor='$user' order by id desc";

                                                    $query = mysqli_query($koneksi, $sql);
                                                    while ($row = mysqli_fetch_array($query))
                                                    {

                                                            echo '<tr>
                                                                <td>'.$row['namaProyek'].'</td>
                                                                <td>'.$row['kumpul'],' hari'.'</td>
                                                                <td>'.$row['kerja'],' bulan'.'</td>
                                                                <td>'.number_format($row['jumlahUang'],0,',','.').'</td>
                                                                <td><button class="btn" style="width:100%"><i class="fa fa-download"></i> </b>proposal.pdf</b></button></td>
                                                                <td><button class="btn" style="width:100%"><i class="fa fa-download"></i> </b>laporan-1.pdf</b></button></td>
                                                                <td>'.$row['statusDana'].'</td>
                                                                <td><button class="btn" class="is-active" data-toggle="modal" data-target="#more" data-id='.$row["id"].'>Selengkapnya</button></td>
                                                            </tr>';                                                        
                                                    }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!--End simple table example -->
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="more" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><b>Selengkapnya</b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="modal-data"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page-wrapper -->
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
        <!--  Scripts
            ================================================== -->
        <!-- jQuery -->
        <script src="https://investani.s3.amazonaws.com/assets/js/jquery-2.2.3.min.js"></script>
        <script src="https://investani.s3.amazonaws.com/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
        $('#more').on('show.bs.modal', function (e) {
            var getDetail = $(e.relatedTarget).data('id');
            /* fungsi AJAX untuk melakukan fetch data */
            $.ajax({
                type : 'post',
                url : './more.php',
                /* detail per identifier ditampung pada berkas detail.php yang berada di folder application/view */
                data :  'getDetail='+ getDetail,
                /* memanggil fungsi getDetail dan mengirimkannya */
                success : function(data){
                $('.modal-data').html(data);
                /* menampilkan data dalam bentuk dokumen HTML */
                }
            });
        });
        });
        </script>
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