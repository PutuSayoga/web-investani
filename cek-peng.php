<?php
session_start();

include_once 'Koneksi.php';

if(!isset($_SESSION['username'])){
    die("Anda belum terdaftar");
}

$id = $_POST["id"];
$jumlah = $_POST["jumlah"];
$laporan = $_POST["laporan"];
$untung = str_replace('.', '', $jumlah);

$sql = "UPDATE kegiatan
            SET status = 'Selesai', keterangan= '', Untung = '$untung', laporan = '$laporan'
            WHERE id = '$id'";

$query = mysqli_query($koneksi, $sql);

if ($query) {
    header("location:dashboard-cf-pe.php");
}

?>

