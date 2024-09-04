<body><center>
<?php include 'koneksi.php';
@$id=$_GET['id'];
session_start();
$hasil = "SELECT * FROM pembayaran  WHERE ID_TRIMA='$id' ";
                     $hasil_data = mysqli_query($koneksi,$hasil) or die (mysqli_error($koneksi));
                     $data= mysqli_fetch_array($hasil_data)
?>

 <h1 class="text-center" style="color:rgb(129,124,124);margin:0px;">Detail Pembayaran <?= $data['ID_BAYAR']?> </h1><br></center>
 <?php
 $hasil = "SELECT * FROM penerimaan
 INNER JOIN supplier ON penerimaan.ID_SUP=supplier.ID_SUP WHERE ID_TRIMA='$id' ";
 $hasil_data = mysqli_query($koneksi,$hasil) or die (mysqli_error($koneksi));
 $data = mysqli_fetch_array($hasil_data)
 ?>
 <div class="row">
            <div class="col">
                <table border="0">
                    <tr>
                        <td width="100px"><b>ID Penerimaan</b></td>
                        <td>:&nbsp;<?= $data['ID_TRIMA'] ?></td>
                    </tr>
                    <tr>
                        <td width="100px"><b>Suplier</td>
                        <td>:&nbsp;<?= $data['NAMA_SUP'] ?></td>
                    </tr>
                    <tr>
                        <td width="150px"><b>Total Pembayaran</b></td>
                        <td>:&nbsp;Rp.&nbsp;<?php echo number_format($data['TOTAL_HARGA']);?>,-</td>
                    </tr>
            
                    <?php
                    $hasil = "SELECT * FROM pembayaran  WHERE ID_TRIMA='$id' ";
                     $hasil_data = mysqli_query($koneksi,$hasil) or die (mysqli_error($koneksi));
                     $data= mysqli_fetch_array($hasil_data)
                     ?>
                    <tr>
                        <td width="150px"><b>Tanggal Pembayaran</b></td>
                        <td>:&nbsp;<?= $data['TGL_BAYAR'] ?></td>
                    </tr>
                </table>
            </div><br>
            <div class="col">
                <table border="0">
                    <tr>
                        <td width="100px"><b>Bukti Bayar</b></td>
                    </tr>
                    <tr>
                    <td><img src="../pembayaran/<?= $data['TOTAL_BAYAR']; ?>" width='400' height='800'></td>
                    </tr>
                </table>
            </div>
            </div><br>
            </body>