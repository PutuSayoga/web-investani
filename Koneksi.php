<?php 
$db_host = "dbprojekakhir.cc4suueshuwq.us-east-1.rds.amazonaws.com";
$db_user = "admin";
$db_pass = "12345678";
$db_name = "db_investani";
$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
