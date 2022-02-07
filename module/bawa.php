<?php
include "koneksi.php"; 
$bayar = $_POST['bayar'] ;
$kembali = $_POST['kembali'] ;
$query_insert ="INSERT INTO penjualan (nama,jenis,berat,kadaluwarsa,harga,jumlah,subtotal,tanggal,waktu,kode) SELECT nama,jenis,berat,kadaluwarsa,harga,jumlah,subtotal,tanggal,waktu,kode FROM temp";




$insert= mysqli_query ($koneksi,$query_insert);

$transaksi= mysqli_query ($koneksi,$query_transaksi);

if ($insert)
{

	$query = mysqli_query($koneksi,"delete from temp ") or die(mysql_error());
	$query2 = mysqli_query($koneksi,"delete from temp_bayar ") or die(mysql_error());
	 echo "<META HTTP-EQUIV=Refresh CONTENT='0; URL=?module=transaksi'>";
}	
else
{ echo "gagal ..."; }


?>