<?php 

class apotek{

	public $conn;

	function koneksi($host,$username,$password,$dbname){
		$this->conn = mysqli_connect($host,$username,$password,$dbname);
            return ($this->conn);
	}


	function query($query){

		$hasil=mysqli_query($this->conn,$query);
		if (!$hasil) {
   		printf("Error: %s\n", mysqli_error($this->conn));
    	exit();
		}
		$rows = [];
		while ($row  = mysqli_fetch_array($hasil)){
			$rows[] = $row;
		}
		return $rows;
		
	}


		function lihatobat(){

		$query="SELECT `kode`,`nama`,`jenis`,`berat`,`kadaluwarsa`,`harga`,`stok` FROM obat";
		return $this->query($query);

		}

		function hapusobat($kode){

		$query="DELETE FROM `obat` where `kode`=$kode";
		return $this->query($query);

		}

		function ubahobat($kode){

		$query="SELECT `nama`,`jenis`,`berat`,`kadaluwarsa`,`harga`,`stok` FROM `obat` where `kode`=$kode";
		return $this->query($query);

		}

		function simpanobat(){
		$query = "INSERT INTO `obat` (`kode`,`nama`, `jenis`, `berat`, `kadaluwarsa`, `harga` , `stok`) VALUES ('$kode',$nama','$jenis', '$berat', '$kadaluwarsa', '$harga', '$stok')";
		return $this->query($query);
		}

		function simpanuser(){
		$query="INSERT INTO `user` (`id_user`,`nama`,`alamat`,`no.hp`) VALUES ('$id','$nama','$alamat','$nohp')";
		return $this->query($query);
		}

	//	function simpanubah($kode){
	//	$query = "UPDATE `obat` SET `nama`='$nama', `jenis`='$jenis',`berat`='$berat',`kadaluwarsa`='$kadaluwarsa', `harga`='$harga', `stok`='$stok' where `kode`=$kode";
	//	}

		function lihatpenjualan(){

		$query="SELECT `kode`,`nama`,`jenis`,`berat`,`kadaluwarsa`,`harga`,`jumlah`,`subtotal`,`tanggal`,`waktu` FROM penjualan";
		return $this->query($query);

		}


}

?>