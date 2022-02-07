<?php
	require_once "function.php";
	$kode = $_GET['kode'];
	$object = new apotek();
	$object->koneksi("localhost","root","","apotek");
	$hapus=$object->hapusobat($kode);
	if($hapus>0){
			echo"<script>alert('Data Berhasil Dihapus'); document.location='?module=obat';</script>";
	}
	else{
		echo"<script>alert('Data Gagal Dihapus'); document.location='?module=obat';</script>";
	}



	 ?>