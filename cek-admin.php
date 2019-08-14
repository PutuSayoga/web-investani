<?php
session_start();

include_once 'Koneksi.php';

if(!isset($_SESSION['username'])){
    die("Anda belum terdaftar");
}

$user = $_SESSION['username'];

$id = $_GET["id"];
$ket = $_GET["keterangan"];
$status = $_GET["status"];
$jumlahUang = $_GET["jumlahUang"];
$jumlahSaham = $_GET["jumlahSaham"];
$proyek = $_GET["proyek"];
$nama = $_GET["namaInv"];

$sqli = "SELECT * FROM kegiatan WHERE proyek='$proyek'";
$queryi = mysqli_query($koneksi, $sqli);
$doing = mysqli_fetch_array($queryi);
$tmp1 = $doing['sisasaham'];
$tmp2 = $doing['danakumpul'];
$tmp3 = $tmp1 + $jumlahSaham;
$tmp4 = $tmp2 - $jumlahUang;

$date = date("Y/m/d");

if ($ket="Top Up" AND $status="cancel") {
    $sqla = "UPDATE kegiatan
            SET danakumpul = '$tmp4', sisasaham= '$tmp3'
            WHERE proyek = '$proyek'";
    $go = mysqli_query($koneksi, $sqla);
    $sql = "DELETE FROM dana
            WHERE id = '$id'";
}
if ($ket="Top Up" AND $status="true") {
    $sqla = "INSERT INTO saldo (nama, jumlahMasuk, jumlahKeluar, keterangan, tanggal) 
            VALUES ('$nama', '$jumlahUang', '', 'Investasi proyek', '$date')";
    $go = mysqli_query($koneksi, $sqla);
    $sql = "UPDATE dana
            SET statusDana = 'Berlangsung', keterangan= ''
            WHERE id = '$id'";
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

