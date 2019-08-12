<?php
session_start();

include_once 'Koneksi.php';

if(!isset($_SESSION['username'])){
    die("Anda belum terdaftar");
}

$id = $_GET["id"];
$ket = $_GET["keterangan"];
$jumlahUang = $_GET["jumlah"];
$nama = $_GET["nama"];
$status = $_GET["status"];

$sqli = "SELECT * FROM kegiatan WHERE proyek='$nama'";
$queryi = mysqli_query($koneksi, $sqli);
$doing = mysqli_fetch_array($queryi);
$tmp1 = $doing['danasisa'];
$tmp3 = $tmp1 + $jumlahUang;


if ($status='true') {
    $sqla = "UPDATE proyek
            SET status = 'Berlangsung', keterangan = ''
            WHERE id = '$id'";
    $go = mysqli_query($koneksi, $sqla);
    $sql = "UPDATE kegiatan
            SET status = 'Berlangsung', keterangan = 'Pengerjaan Proyek'
            WHERE proyek = '$nama'";
}else{
    $sqla = "DELETE FROM proyek
            WHERE id = '$id'";
    $go = mysqli_query($koneksi, $sqla);
    $sql = "UPDATE kegiatan
            SET status = 'Berlangsung', keterangan = 'Pengerjaan Proyek', danasisa = '$tmp3'
            WHERE proyek = '$nama'";
}

$query = mysqli_query($koneksi, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($koneksi));
}

if($query){
    header("location:dashboard-cf-adm.php");
}else{
    header("location:buka-proyek-cf-adm.php");
}

?>

