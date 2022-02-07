
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<title>FORM PENJUALAN</title>
<style type='text/css'>
.wrapper{
   position: relative;
   float: left;
   left: 0px;
   width: 100%;
   margin-bottom: 10px;
   background-color: #ffffff
}
.left1{
   position: relative;
   float: left;
   left: 5px;
   width: 700px;
   height: 600px;
   background-color: #ffffff
}
.left2{
   position: relative;
   float: left;
   left: 15px;
   width: 300px;
   height: 600px;
   background-color: #ffffff
}
body {
   border-width: 0px;
   padding: 0px;
   margin: 0px;
   font-size: 90%;
   background-color: #e7e7de
}
</style>


  <style type="text/css"> 
  
  h1 {
    font-family: Verdana;
  }
  
  body {
    font-family: Verdana;
    font-size: 12px;
  } 
  
  td {
    font-size: 12px;
  }
  
  </style> 
<style type="text/css">
table.tftable {table-layout:fixed; width:100%; word-break:break-all; font-size:12px;color:#333333;border-width: 1px;border-color: #729ea5;border-collapse: collapse;}
table.tftable th {font-size:12px;background-color:#acc8cc;border-width: 1px;padding: 8px; border-style: solid;border-color: #729ea5;}
table.tftable tr {background-color:#d4e3e5;}
table.tftable td {font-size:12px;border-width: 1px;padding: 4px;border-style: solid;border-color: #729ea5; text-align:right; }
</style>

<script><!-- 


function startCalc(){
interval = setInterval("calc()",1);}
function calc(){

two = document.autoSumForm.bayar.value; 
three = document.autoSumForm.subtotal.value; 
document.autoSumForm.kembali.value = (two * 1) - (three * 1);}
function stopCalc(){
clearInterval(interval);}
</script>


</head>
<body>
  <div class="wrapper">
       <div class="left1">


<?php
include "koneksi.php";

  if (isset($_GET['op']))
  {
    if ($_GET['op'] == 'send')
    {
      date_default_timezone_set('Asia/Jakarta');
      $dmy = date('Ymd');
      $time1 = date('H:i:s');
      $kode= $_POST['kode'] ;
      $jumlah   = $_POST['jumlah'] ;
      
      $select = "select nama,jenis,harga,berat,kadaluwarsa from obat where kode='$kode' or nama='$kode'";
      $select_query = mysqli_query($koneksi,$select);
 

      while($select_result = mysqli_fetch_array($select_query))
      {

      $nama   = $select_result ['nama'];
      $jenis = $select_result ['jenis'];
      $harga = $select_result ['harga'];
      $berat = $select_result ['berat'];
      $kadaluwarsa = $select_result ['kadaluwarsa'];
      $query_insert = "INSERT INTO temp (nama,jenis,harga,jumlah,tanggal,waktu,kode,berat,kadaluwarsa) VALUES ('$nama','$jenis','$harga','$jumlah','$dmy','$time1','$kode','$berat','$kadaluwarsa')";
      $query_update = "UPDATE temp SET subtotal = harga * jumlah WHERE nama='$nama' and jumlah='$jumlah'";

      $insert = mysqli_query($koneksi,$query_insert);


      if ($insert) 
      {
      $update = mysqli_query($koneksi,$query_update);
      }
      else 
      {
      echo "<p>GAGAL DITAMBAHKAN</p>";
      }
      }
    }
  }
  
  ?>



<table id='tfhover'  class='tftable' border='1' align='center'> <col width='250'><col width='100'><col width='100'><col width='100'><col width='50'>

<tr>

<th style="text-align:center;">Nama</th>
<th style="text-align:center;">Harga</th>
<th style="text-align:center;">Jumlah</th>
<th style="text-align:center;">Sub Total</th>

<th></th>
</tr>



  
<?php
$select = "SELECT id,subtotal,nama,harga,jumlah FROM temp";
$select_query = mysqli_query($koneksi,$select);


while($select_result = mysqli_fetch_array($select_query))
{

$id           = $select_result['id'] ;
$nama         = $select_result['nama'] ;
$harga      = $select_result['harga'] ;
$jumlah         = $select_result['jumlah'] ;
$subtotal        = $select_result['subtotal'] ;

echo "
<tr>

<td style='text-align:left;'>$nama</td>
<td style='text-align:right;'>$harga</td>
<td style='text-align:center;'>$jumlah</td>
<td style='text-align:right;'>$subtotal</td>
<td>
<a href='delete-temp.php?id=$id'><img src='bin.png'></img></a>

</td>

</tr>

";
}

?>
</table>
<?php

$select1 = "SELECT SUM(jumlah) AS alljumlah,SUM(subtotal) AS total FROM temp";
$select_query1 = mysqli_query($koneksi,$select1);
while($select_result = mysqli_fetch_array($select_query1))
{
$alljumlah        = $select_result['alljumlah'] ;
$total          = $select_result['total'] ;
echo"
<table id='tfhover'  class='tftable' border='1' align='center'> <col width='250'><col width='100'><col width='100'><col width='100'><col width='50'>
<tr>

<th style='text-align:center;'><br/></th>
<th style='text-align:center;'></th>
<th style='text-align:center;'>$alljumlah</th>
<th style='text-align:right;'>$total</th>

<th><a href='deletetemp.php'><img src='bin.png'></img></a></th>
</tr>
</table>
";}?>

       </div>
       <div class="left2">
     <div class="message warning">
<div class="contact-form">
  <div class="logo">
    <h1>Transaksi Penjualan</h1>
  </div>



<!--- form --->
<a href='?module=obat' target='_blank'>Cari barang</a><br/>

<form class="form" action="?module=transaksi&op=send" method="post" name="contact_form">
  <ul>
    <li>
       <label></label>
       
       <input type="text"  name="jumlah"  placeholder="jumlah barang" required /> 
                           
     </li>
    <li>
       <label></label>
       <input type="text" id  name="kode"  placeholder="kode atau nama barang" required />  
                           
     </li>
     <li class="style">
         <input type="Submit" value="<<< TAMBAHKAN" >
     </li>
  </ul> 
  <div class="clear"></div> 
</form>

Pembayaran
<form name='autoSumForm' class="form" action="?module=bawa" method="post">
<?php
$hitung = "SELECT SUM(subtotal) AS total1 FROM temp";
$select_hitung = mysqli_query($koneksi,$hitung);
while($select_result = mysqli_fetch_array($select_hitung))
{
$total1         = $select_result['total1'] ;
echo"
";}?>

<ul>
  <li>
   <label></label>
   <input type='text' name='bayar' required placeholder="Uang Pembayaran ?" style="text-align:right;" value='' size='23' maxlength='300'  onFocus="startCalc();" onBlur="stopCalc();" />
    </li>
<li>
<label></label>
<input type='text' name="subtotal"  style="text-align:right;" readonly value='<?php echo $total1 ;?>' size='23' maxlength='300' onFocus="startCalc();" onBlur="stopCalc();"  />
</li>
<li>
<label></label>
<input readonly type=text value='0' style="text-align:right;" name="kembali" readonly onchange='tryNumberFormat(this.form.thirdBox);'> 
</li>
 <li class="style">
<input type="Submit" value="SIMPAN" >
</li>
</ul>
<div class="clear"></div> 
</form>

    


</div>

</div>
<div class="clear"></div>

       </div>
   </div> 
</body>
</html>
