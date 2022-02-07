<?php
// CONTENT

$year_options = array(2019 => 2019, 2018 => 2018, 2017 => 2017, 2016=>2016);		
$month_options = array(1=>'Januari','Februari','Maret','April','MeiMei','Juni','Juli','Agustus','Septembe','Oktober','November','Desember');

// SUBMIT
$hasil_query = false;
$error = $warning = array();
if (isset($_POST['submit'])) 
{
	// CEK APAKAH ADA TAHUN YANG DICETANG
	$form_error = '';
	$year_checked = false;
	foreach ($year_options as $year) {
		if (key_exists($year, $_POST)) {
			$year_checked = true;
			break;
		}
	}
	if (!$year_checked) {
		$error[] = 'Tahun harus dipilih';
	}
	
	// JIKA FORM ERROR
	if (!$error) {
		require_once('koneksi.php');
		// KONEKSI

		if (!$koneksi) {
			$error[] = 'MySQL ERROR : ' . mysqli_connect_error($koneksi);
		} else {
			// WHERE
			// Nama Barang
			$where = trim($_POST['nama']) ? 'nama LIKE "%'.$_POST['nama'].'%"' : '';
			
			// Tahun
			$periode = '( ';
			foreach ($year_options as $year) {
				if (key_exists($year, $_POST)) {
					$bln_awal = substr('0' . $_POST['bln_awal'], -2);
					$bln_akhir = substr('0' . $_POST['bln_akhir'], -2);
					$periode .= '( tanggal > "' . $year . '-' . $bln_awal . '-00"
								AND tanggal < "' . $year . '-' . $bln_akhir . '-99" ) OR';
				}
			}
			
			$where .= ' AND ' . rtrim($periode, ' OR') . ') ';
			$where = ltrim ($where, ' AND ');
			
			// QUERY
			$sql =  'SELECT * 
					FROM penjualan 
					LEFT JOIN obat USING(kode) 
					WHERE ' . $where . '
				ORDER BY ' . $_POST['order_by'] . ' ' . $_POST['sort'];
		
			$result = mysqli_query ($koneksi, $sql); 

			// RESULT
			if (!$result) {
				$error[] = mysqli_error($koneksi) . '<br/><strong>SQL Query</strong>: ' .  $sql;
			} else {
				$num_rows = mysqli_num_rows($result);
				if (!$num_rows) {
					$warning[] = 'Data tidak ditemukan';
				} else {
					$hasil_query = true;
				}
			}
		} // 
	}
}?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title>LAPORAN</title>
	<meta name="description" content="Tugas">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="css/site.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/icomoon/style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<script type="text/javascript" src="js/jquery-1.12.2.min.js"></script>
	<script type="text/javascript" src="js/html5.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<link rel="shortcut icon" href="img/favicon.png">
</head>
<body>
	<div class="main-wrapper">
	<header id="top">

	</header>
	<div class="content-wrapper">
		<div class="box-title">
			<h1 class="title">Data Penjualan</h1>
		</div>
		<div class="box-content">
			<?php 
			if ($error) {
				echo '<div class="danger">Error: ' . join($error, ', ') . '</div>';
			}

			if ($warning) {
				echo '<div class="warning">' . join($warning, ', ') . '</div>';
			}
			?>
			<form action="" method="post">
				<div class="row">
					<!--<label>Nama Barang</label>
					<div class="col-wrap">
						<input type="text" name="nama_barang" placeholder="Semua..." value="<?=@$_POST['nama_barang'] ?: ''?>"/>
						<p class="desc">Kosongkan isian untuk menampilkan semua data</p>
					</div>-->
				</div>
				<div class="row">
					<label>Urutkan</label>
					<div class="col-wrap">
						<select name="order_by">
							<?php $options = array('subtotal' => 'Total Bayar', 'tanggal' => 'Tanggal Transaksi');
							foreach ($options as $key => $val) {
								$selected = @$_POST['order_by'] == $key ? ' selected="selected"' : '';
								echo '<option value="' . $key . '"' . $selected . '>' . $val . '</option>';
							}?>
						</select>
						<select name="sort">
							<option value="DESC" <?= @$_POST['sort'] == 'DESC' ? 'selected="selected"' : ''?>>DESC</option>
							<option value="ASC" <?= @$_POST['sort'] == 'ASC' ? 'selected="selected"' : ''?>>ASC</option>
						</select>
					</div>
				</div>
				<div class="row">
					<label>Periode</label>
					<div class="col-wrap">
						<select name="bln_awal">
							<?php 
							foreach ($month_options as $key => $val) {
								$selected = @$_POST['bln_awal'] == $key ? ' selected="selected"' : '';
								echo '<option value="' . $key . '"' . $selected . '>' . $val . '</option>';
							}?>
						</select> s.d. 
						<select name="bln_akhir">
							<?php 
							$selected = '';
							foreach ($month_options as $key => $val) {
								if (isset($_POST['submit'])) {
									$selected = @$_POST['bln_akhir'] == $key ? ' selected="selected"' : '';
								} else {
									$selected = $key == date('n') ? ' selected="selected"' : '';
								}
								echo '<option value="' . $key . '"' . $selected . '>' . $val . '</option>';
							}?>
							?>
						</select>
					</div>
				</div>
				<div class="row">
					<label>Tahun</label>
					<div class="col-wrap options">
						<?php 
						foreach ($year_options as $key => $val) {
							if (isset($_POST['submit'])) {
								$checked = isset($_POST[$key]) ? ' checked="checked"' : '';
							} else {
								$checked = $key == 2017 ? ' checked="checked"' : '';
							}
							
							echo '<label class="checkbox">
									<input type="checkbox" name="' . $val . '"' . $checked . '>' . $val . 
								'</label>';
						}
						?>
					</div>
				</div>
				<div class="row">
					<input class="offset button" type="submit" name="submit" value="Submit"/>
				</div>
			</form>
		</div>
		<?php
		if (isset($_POST['submit'])) {
			
			if ($hasil_query) 
			{
				echo '<div class="success">Ditemukan <strong>' . $num_rows . '</strong> data</div>';
				$thead = '
					<tr>
						<th>No</th>
						<th>Nama Barang</th>
						<th>Tanggal</th>
						<th>Jenis</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Total</th>
						
					</tr>';
					
				echo '
				<div class="table-responsive">
				<table>
						<thead>' . $thead . '</thead>
						<tbody>';
				
				$no = 1;
				while($row = mysqli_fetch_array($result)) {
					echo '<tr>
						<td>' . $no . '</td> 
						<td>' . $row['nama'] . '</td> 
						<td>' . $row['tgl_trx'] . '</td> 
						<td class="right">' . $row['jenis'] . '</td> 
						<td class="right">' . number_format($row['harga'], 0, ',', '.') . '</td> 
						<td class="right">' . $row['jumlah'] . '</td> 
						<td class="right">' . number_format($row['subtotal'], 0, ',', '.') . '</td> 
					</tr>
					';
					$no++;
				}
				echo '<tfoot>' . $thead . '</tfoot></tbody>
				</table>
				</div>';
			}
		}?>
	</div>
	<footer></footer>
	<a id="to-top" href="#top" style="display: none;"><i class="icon-chevron-up"></i></a>
</body>
</html>