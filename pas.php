<?php
	function password_valid($user,$pwd)
	{
		if(($user == "admin") && ($pwd == "admin"))
		return TRUE;

			include('koneksi.php');
	$query = "SELECT * FROM user where id_user='$user' && pwd='$pwd'";
	$hasil = mysqli_query($koneksi,$query);

	while ($tbl_pengguna=mysqli_fetch_array($hasil))
	
	{
		if (($user == $tbl_pengguna['id_user']) && ($tbl_pengguna['pwd']))
		{
		return TRUE;
		}
		else{
		return FALSE;
		}
	}
	}
?>