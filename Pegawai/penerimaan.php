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
?><br>
                        <h1 class="text-center" style="color:rgb(129,124,124);margin:0px;">Penerimaan</h1>
 <fieldset>
 <div><span>&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;</span><span style="float:center"><a href="formpenerimaan.php" target="isi"><button class="btn btn-primary" style="background-color:rgb(237,173,204);" class="btn btn-primary">Tambah Penerimaan</button></a></span></div>
 <br>
<div class="table-responsive">
                            <table class="table" style="width:1200px;" id="penerimaan">
                            <thead>
                    <tr>
                        <th style="background-color:rgb(237,173,204);">ID Penerimaan</th>
                        <th style="background-color:rgb(237,173,204);">Pegawai</th>
                        <th style="background-color:rgb(237,173,204);">Supplier</th>
                        <th style="background-color:rgb(237,173,204);">Tanggal</th>
                        <th style="background-color:rgb(237,173,204);">Total Harga</th>
                        <th style="background-color:rgb(237,173,204);">Status</th>
                        <th align="center" style="background-color:rgb(237,173,204);">Opsi</th>
                    </tr> 
                  </thead>
                  <tbody>
                  <?php
                  include 'koneksi.php';

                  $hasil = "SELECT * FROM penerimaan 
                  INNER JOIN user ON penerimaan.ID_USER=user.ID_USER
                  INNER JOIN supplier ON penerimaan.ID_SUP=supplier.ID_SUP ORDER BY STATUS_TRIMA DESC
                  ";
                  $hasil_data = mysqli_query($koneksi,$hasil) or die (mysqli_error($koneksi));
                        
                        while ($data = mysqli_fetch_array($hasil_data)){?>
                        
                          <tr>
                            <td><?=$data['ID_TRIMA']?></td>
                            <td><?=$data['NAMA_USER']?></td>
                            <td><?=$data['NAMA_SUP']?></td>
                            <td><?=$data['TGL_TRIMA']?></td>
                            <td>Rp.<?php echo number_format($data['TOTAL_HARGA']);?>,-</td>
                            <td><?php 
                                $sts = $data['STATUS_TRIMA'];
                                if($sts=='0'){
                                  echo "Belum Diproses";
                                }
                                if($sts=='1'){
                                  echo "Sudah Diproses";
                                }
                                if($sts=='2'){
                                  echo "Dibatalkan!";
                                }
                            ?>
                            </td>
                            <td>
                             <?php
                              $sts = $data['STATUS_TRIMA'];
                              if($sts=='0'){
                                echo "<a href=detpenerimaan.php?id=".$data[0]." class='btn btn-info btn-xs'>Detail</a>
                                <a href=deletepenerimaan.php?id=".$data[0]." style='background-color:rgb(255,0,0);' class='btn btn-info btn-xs'>Batal</a>
                                ";
                              }else{
                                echo " <a href=detpenerimaan.php?id=".$data[0]." class='btn btn-info btn-xs'>Detail</a> ";
                              }
                             ?>
                            <?php    
                        }
		                    ?></td>
                        </tbody>
                </table>
              </div>
                        </fieldset>
                            </center>
                            </div>
                            <br>
</body>
&nbsp;&nbsp;&nbsp;<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;<script type="text/javascript">
$(document).ready( function () {
    $('#penerimaan').DataTable();
} );
</script>&nbsp;&nbsp;&nbsp;
</html>