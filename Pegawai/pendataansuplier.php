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
 <div class="input-group mb-3">
  <div class="input-group-prepend">
  &nbsp;&nbsp;&nbsp;<label class="input-group-text" for="inputGroupSelect01">Pilih Data</label>
  </div>
  
<select onChange="document.location.href=this.options[this.selectedIndex].value;" class="form-control" name="" id="exampleFormControlSelect1">
  							<option>-Data-</option>
                <option value="pendataanbarang.php" target="isi">Barang</option>
                <option value="pendataansuplier.php" target="isi">Suplier</option>
  					</select>&nbsp;&nbsp;&nbsp;
  <div class="input-group-prepend"><span style="float:center"><a href="formsuplier.php" target="isi"><button class="btn btn-primary" style="background-color:rgb(237,173,204);" class="btn btn-primary">Tamba Suplier</button></a>&nbsp;&nbsp;&nbsp;</span></div>
</div>
<!-- END script otomatis tambah -->
                        <div class="table-responsive">
                          <table class="table" style="width:1200px;" id="suplier">
                            <thead>
                            <tr>
                        <th style="background-color:rgb(237,173,204);">ID Suplier</th>
                        <th style="background-color:rgb(237,173,204);">Nama Suplier</th>
                        <th style="background-color:rgb(237,173,204);">Alamat Suplier</th>
                        <th style="background-color:rgb(237,173,204);">Telepon Suplier</th>
                        <th style="background-color:rgb(237,173,204);">Opsi</th>
                    </tr> 
                  </thead>
                  <tbody>
                  <?php
                  include 'koneksi.php';

                  $hasil = "SELECT * FROM supplier";
                  $hasil_data = mysqli_query($koneksi,$hasil) or die (mysqli_error($koneksi));
                        while ($data = mysqli_fetch_array($hasil_data)){?>
                           <tr>
                            <td><?=$data['ID_SUP']?></td>
                            <td><?=$data['NAMA_SUP']?></td>
                            <td><?=$data['ALAMAT_SUP']?></td>
                            <td><?=$data['TELP_SUP']?></td>
                            <?php    
                            echo "
                            <td align='center'>
                             <a href=editsup.php?id=".$data[0]." class='btn btn-info btn-xs'>Edit</a>
                            </td>
                          </tr>
                          ";}
		                    ?>
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
    $('#suplier').DataTable();
} );
</script>&nbsp;&nbsp;&nbsp;
</html>