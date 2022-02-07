<?php 
    require "function.php";
    $object = new apotek();
    $object->koneksi("localhost","root","","apotek");
    $kode = $_GET['kode'];
    $obat=$object->ubahobat($kode);
    foreach ($obat as $obat) {
    	# code...
    
    $nama=$obat['nama'];
    $jenis=$obat['jenis'];
    $berat=$obat['berat'];
    $kadaluwarsa=$obat['kadaluwarsa'];
    $harga=$obat['harga'];
    $stok=$obat['stok'];
}
 ?>
<html>
<head>
	<title>Form Ubah HTML</title>
</head>
<body>
	<form action="?module=simpanubah" method="POST">
	<input type="hidden" name="kode" value="<?php echo $kode; ?>" />
<table>

                                            <label>Merek Obat</label>
                                            <input class="form-control" name="nama" value="<?php echo $nama;?>" />
                                            <label>Jenis Obat</label>
                                            <input class="form-control" name="jenis" value="<?php echo $jenis;?>"/>
                                            <label>Berat</label>
                                            <input class="form-control" name="berat" value="<?php echo $berat;?>"/>
                                            <label>Tanggal Kadaluwars</label>
                                            <input class="form-control" name="kadaluwarsa" value="<?php echo $kadaluwarsa;?>"/>
                                            <label>Harga</label>
                                            <input class="form-control" name="harga" value="<?php echo $harga;?>" />
                                            <label>Stok</label>
                                            <input class="form-control" name="stok" value="<?php echo $stok;?>"/>
                                            <input type="reset" name="" value="Batal" class="btn btn-primary">
                                            <input type="submit" name="" value="Simpan" class="btn btn-primary">
                                            
</table>   
	</form>
</body></html>