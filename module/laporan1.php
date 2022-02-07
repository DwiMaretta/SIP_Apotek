<?php 
    require "function.php";
    $object = new apotek();
    $object->koneksi("localhost","root","","apotek");
    
    $obat=$object->lihatpenjualan();
 ?>
                
                <div class="row">
                    <div class="col-md-12">
                    
                       
                       
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
                                            
                                            <th>Nama Obat</th>
                                            <th>Jenis</th>
                                            <th>Berat</th>
                                            <th>Tanggal Kadaluwarsa</th>
                                            <th>Harga satuan</th>
                                            <th>Jumlah</th>
                                            <th>Total harga</th>
                                            <th>tanggal</th>
                                        </tr>
<?php 
    foreach ($obat as $obat){
    ?>
    <tr>
    <th><?php echo $obat['nama']; ?></th>
    <th><?php echo $obat['jenis']; ?></th>
    <th><?php echo $obat['berat']; ?></th>
    <th><?php echo $obat['kadaluwarsa']; ?></th>
    <th><?php echo $obat['harga']; ?></th>
    <th><?php echo $obat['jumlah']; ?></th>
    <th><?php echo $obat['subtotal']; ?></th>
    <th><?php echo $obat['tanggal']; ?></th>

    </tr>


    <?php }; ?>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                                <button class="info">
<a href="?module=cetak1"  target="_blank">CETAK PDF</a></button>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                