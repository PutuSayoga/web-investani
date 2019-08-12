<?php
session_start();

include_once 'Koneksi.php';

if(!isset($_SESSION['username'])){
    die("Anda belum terdaftar");
}

$id = $_GET["id"];
$ket = $_GET["ket"];
$status = $_GET["status"];

if ($ket="Pembukaan Proyek" and $status="true") {
    $sql = "UPDATE kegiatan
            SET status = 'Berlangsung', keterangan= 'Penggalangan Dana'
            WHERE id = '$id'";
}elseif ($ket="Pembukaan Proyek" and $status="cancel") {
    $sql = "DELETE FROM kegiatan
            WHERE id = '$id'";
}

$query = mysqli_query($koneksi, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($koneksi));
}

if($query){
    header("location:dashboard-cf-adm.php");
}


?>

