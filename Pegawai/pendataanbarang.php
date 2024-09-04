<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
 <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="assets/css/Pretty-Search-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
</head>

<body>
    <div>
        <center>
<?php 

include 'koneksi.php';
session_start();
$sql = "SELECT  KODE_BAR FROM barang";
$query =  mysqli_query($koneksi, $sql);
?>
                        <h1 class="text-center" style="color:rgb(129,124,124);margin:0px;">Pendataan</h1><br>
 <fieldset>
     <form method="post">
 <div class="input-group mb-3">
  <div class="input-group-prepend">
  &nbsp;&nbsp;&nbsp;<label class="input-group-text" for="inputGroupSelect01">Pilih Data</label>
  </div>
  <select onChange="document.location.href=this.options[this.selectedIndex].value;" class="form-control" name="" id="exampleFormControlSelect1">
  							<option>-Data-</option>
  							<option value="pendataanbarang.php" target="isi">Barang</option>
                <option value="pendataansuplier.php" target="isi">Suplier</option>
  					</select>&nbsp;&nbsp;&nbsp;
 </div></form>
<!-- END script otomatis tambah -->
                        <div class="table-responsive">
                            <table class="table" style="width:1200px;" id="dataBrg">
                            <thead>
                            <tr>
                        <th style="background-color:rgb(237,173,204);">Nama</th>
                        <th style="background-color:rgb(237,173,204);">Ukuran</th>
                        <th style="background-color:rgb(237,173,204);">Warna</th>
                        <th style="background-color:rgb(237,173,204);">Stok</th>
                        <th style="background-color:rgb(237,173,204);">Harga</th>
                        <th style="background-color:rgb(237,173,204);">Keterangan</th>
                        <th style="background-color:rgb(237,173,204);">Opsi</th>
                    </tr> 
                  </thead>
                  <tbody>
                  <?php
                  include 'koneksi.php';
                //   $hasil = mysqli_query($koneksi,"select br.kode_bar, br.nama_bar, uk.ukuran, wr.warna, br.stock_bar , br.harga_beli_bar from detail_barang db join ukuran uk on db.id_ukuran=uk.id_ukuran join barang br on br.kode_bar=db.kode_bar join warna wr on wr.id_warna=db.id_warna ");
                //     if ($hasil === FALSE) {
                //           die(mysqli_error($koneksi));
                //          }
                //          while ($data = mysqli_fetch_array($hasil)){  
                            $hasil = "SELECT * FROM barang";
                            $hasil_data = mysqli_query($koneksi,$hasil) or die (mysqli_error($koneksi));
                                  while ($data = mysqli_fetch_array($hasil_data)){?>
                           <tr>
                            <td><?=$data[2]?></td>
                            <td><?=$data[3]?></td>
                            <td><?=$data[4]?></td>
                            <td><?php echo number_format($data[5]);?></td>
                            <td>Rp.<?php echo number_format($data[6]);?>,-</td>
                            <td><?php 
                                if( $data[5]=='0'){
                                  echo "Perlu dipesan!";
                                }
                                if($data[5]=='20'){
                                  echo "Stok masih banyak!";
                                }
                            ?></td>
                            <td><a href=editbarang.php?id=<?=$data[0]?> class='btn btn-info btn-xs'>Edit</a>
                                <?php
                                    if($data[5]==0){
                                        echo "<a href=formpemesanan1.php?id=".$data[0]." class='btn btn-info btn-xs'>Pesan</a>";
                                    }
                                ?>
                            </td>
                            <?php    
                        //     echo "
                        //     <td align='center'>
                        //      <a href=editbarang.php?id=".$data[0]." class='btn btn-info btn-xs'>Edit</a>
                        //     </td>
                        //   </tr>
                        //   ";
                            }
		                    ?>
                        </tbody>
                </table>
              </div>
                        </fieldset>
                            </center>
                            </div>
                            <br>
                            &nbsp;&nbsp;&nbsp;<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;<script type="text/javascript">
$(document).ready( function () {
    $('#dataBrg').DataTable();
} );
</script>&nbsp;&nbsp;&nbsp;
</body>
</html>