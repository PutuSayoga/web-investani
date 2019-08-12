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
while ($doing = mysqli_fetch_array($set))
{
$saldo = $doing['saldo'];
echo $nama;
echo $doing;
echo $saldo;
echo "aaaa";
}
?>