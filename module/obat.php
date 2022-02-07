<?php 
    require "function.php";
    $object = new apotek();
    $object->koneksi("localhost","root","","apotek");
    
    $obat=$object->lihatobat();
 ?>
                
                <div class="row">
                    <div class="col-md-12">
                    
                       <button>  <a href="?module=inputobat">Input Data Obat</a></button>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />

            <h2>Daftar Obat</h2> 
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href=""></a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Nama Obat</th>
                                            <th>Jenis</th>
                                            <th>Berat</th>
                                            <th>Tanggal Kadaluwarsa</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Pilihan</th>
                                        </tr>
<?php 
    foreach ($obat as $obat){
    ?>
    <tr>
    <th><?php echo $obat['kode']; ?></th>
    <th><?php echo $obat['nama']; ?></th>
    <th><?php echo $obat['jenis']; ?></th>
    <th><?php echo $obat['berat']; ?></th>
    <th><?php echo $obat['kadaluwarsa']; ?></th>
    <th><?php echo $obat['harga']; ?></th>
    <th><?php echo $obat['stok']; ?></th>
    <th><a href="?module=edit&kode=<?php echo $obat['kode']; ?>">Ubah</a> || <a href="?module=hapus&kode=<?php echo $obat['kode']; ?>">Hapus</a></th>
    </tr>


    <?php }; ?>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                