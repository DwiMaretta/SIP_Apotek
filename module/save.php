<?php
require "function.php";
$object = new apotek();
$k=$object->koneksi("localhost","root","","apotek");
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$berat =$_POST['berat'];
$kadaluwarsa= $_POST['kadaluwarsa'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];


$query = "INSERT INTO `obat` (`kode`,`nama`, `jenis`, `berat`, `kadaluwarsa`, `harga` , `stok`) VALUES ('$kode','$nama','$jenis', '$berat', '$kadaluwarsa', '$harga', '$stok')";
$hasil = mysqli_query($k, $query);
		if (!$hasil) {
   		printf("Error: %s\n", mysqli_error($k));
    	exit();
		}

if (!$hasil)
	die("Penyimpanan gagal!!!");


 if($hasil)
        echo"<script>alert('Data Berhasil Disimpan'); document.location='?module=obat';</script>";
?>

