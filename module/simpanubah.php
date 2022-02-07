<?php

    require "function.php";
    $object = new apotek();
    $koneksi=$object->koneksi("localhost","root","","apotek");
    $kode = $_POST['kode'];
$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$berat =$_POST['berat'];
$kadaluwarsa= $_POST['kadaluwarsa'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];




	$query = "UPDATE `obat` SET `nama`='$nama', `jenis`='$jenis',`berat`='$berat',`kadaluwarsa`='$kadaluwarsa', `harga`='$harga', `stok`='$stok' where `kode`=$kode";
	$hasil = mysqli_query($koneksi,$query);

	if(!$hasil)
		die("Pengubahan gagal!!!");

	 if($hasil)
        echo"<script>alert('Data Berhasil Disimpan'); document.location='?module=obat';</script>";
?>