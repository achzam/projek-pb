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
<?php include 'koneksi.php';
session_start();
$sql = "SELECT  KODE_BAR FROM barang";
$query =  mysqli_query($koneksi, $sql);
?>
 <div class="col-md-8 offset-md-2" style="margin:0px;width:1200px;"><br>
                        <h1 class="text-center" style="color:rgb(129,124,124);margin:0px;">Pembayaran</h1><br>
 <fieldset>
                    </div>
                    </div>
                        <div class="table-responsive">
                            <table class="table" style="width:1200px;" id="pembayaran">
                            <thead>
                    <tr>
                        <th style="background-color:rgb(237,173,204);">ID Pembayaran</th>
                        <th style="background-color:rgb(237,173,204);">ID Penerimaan</th>
                        <th style="background-color:rgb(237,173,204);">Tanggal Pembayaran</th>
                        <th style="background-color:rgb(237,173,204);">Total Pembayaran</th>
                        <th style="background-color:rgb(237,173,204);">Opsi</th>
                    </tr> 
                  </thead>
                  <tbody>
                  <?php
                  include 'koneksi.php';

                  $hasil = "SELECT * FROM pembayaran 
                  INNER JOIN penerimaan ON pembayaran.ID_TRIMA=penerimaan.ID_TRIMA";
                  $hasil_data = mysqli_query($koneksi,$hasil) or die (mysqli_error($koneksi));
                        
                        while ($data = mysqli_fetch_array($hasil_data)){?>
                        
                          <tr>
                            <td><?=$data['ID_BAYAR']?></td>
                            <td><?=$data['ID_TRIMA']?></td>
                            <td><?=$data['TGL_BAYAR']?></td>
                            <td>Rp.<?php echo number_format($data['TOTAL_HARGA']);?>,-</td>
                            <?php  
                            echo "<td><a href=detailpembayaran.php?id=".$data[1]." class='btn btn-info btn-xs'>Detail</a> </td>";
                             
                            }
		                    ?>
                        </tbody>
                </table>
              </div>
             
                            </center>
                            </div></fieldset>  
                            <br>
</body>
&nbsp;&nbsp;&nbsp;<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;<script type="text/javascript">
$(document).ready( function () {
    $('#pembayaran').DataTable();
} );
</script>&nbsp;&nbsp;&nbsp;
</html>