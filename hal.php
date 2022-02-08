<?php
    include "pas.php";

    if((!isset($_COOKIE['cookie_user']) && !isset($_COOKIE['cookie_pass'])) || !password_valid($_COOKIE["cookie_user"],$_COOKIE["cookie_pass"]))
    {
        echo"<script>alert('Username atau Password anda salah, silakan login kembali'); document.location='index.php';</script>";
    }

?>
<?php 
if (!isset($_GET['module']) || $_GET['module']=='') {
    $_GET['module']='home';
     }
 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Apotek</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="hal.php">APOTEK <br>IBNU SINA</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <a href="#" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li <?php if ($_GET['module']=='home' || $_GET['module']=='') {
                     ?>  <?php } ?>><a href="?module=home"><i class="fa fa-home fa-3x"></i>Home</a></li>
                    <li <?php if ($_GET['module']=='obat' || $_GET['module']=='') {
                     ?>  <?php } ?>><a href="?module=obat"><i class="fa fa-desktop fa-3x"></i>Data Obat</a></li>
                    <li <?php if ($_GET['module']=='transaksi' || $_GET['module']=='') {
                     ?>  <?php } ?>><a href="?module=transaksi"><i class="fa fa-qrcode fa-3x"></i>Penjualan Obat</a></li>
                    <li <?php if ($_GET['module']=='laporan1' || $_GET['module']=='') {
                     ?>  <?php } ?>><a href="?module=laporan1"><i class="fa fa-book fa-3x"></i>Laporan</a></li>
					                   
                    
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
                        <h5>Welcome Admin , Love to see you back. </h5>
                    </div>
                </div>              
                 
                 <?php require_once('module/'.$_GET['module'].'.php'); ?>       
 
        
            </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
