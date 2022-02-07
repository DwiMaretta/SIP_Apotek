<?php
require "function.php";
$object = new apotek();
$k=$object->koneksi("localhost","root","","apotek");
$id = $_POST['user'];
$pwd = $_POST['pwd'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$nohp =$_POST['nohp'];


$query="INSERT INTO `user` (`id_user`,`pwd`,`nama`,`alamat`,`no.hp`) VALUES ('$id',`pwd`,'$nama','$alamat','$nohp')";
$hasil = mysqli_query($k, $query);
		if (!$hasil) {
   		printf("Error: %s\n", mysqli_error($k));
    	exit();
		}

if (!$hasil)
	die("Penyimpanan gagal!!!");


 if($hasil)
        echo"<script>alert('Data Berhasil Disimpan'); document.location='index.php';</script>";
?>

