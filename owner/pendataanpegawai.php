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
    <label class="input-group-text" for="inputGroupSelect01">Pilih Data</label>
  </div>
  
  <select onChange="document.location.href=this.options[this.selectedIndex].value;" class="form-control" name="" id="exampleFormControlSelect1">
  							<option>-Data-</option>
                <option value="pendataanpegawai.php" target="isi">User</option>
                <option value="pendataansuplier.php" target="isi">Suplier</option>
  					</select>&nbsp;&nbsp;&nbsp;
  <div class="input-group-prepend"><span style="float:center"><a href="regis/registeration.php" target="isi"><button class="btn btn-primary" style="background-color:rgb(237,173,204);" class="btn btn-primary">Tamba User</button></a></span></div>
</div>
<!-- END script otomatis tambah -->
                        <div class="table-responsive">
                            <table class="table" style="width:1200px;">
                            <thead>
                            <tr>
                        <th style="background-color:rgb(237,173,204);">ID</th>
                        <th style="background-color:rgb(237,173,204);">Jabatan</th>
                        <th style="background-color:rgb(237,173,204);">Nama</th>
                        <th style="background-color:rgb(237,173,204);">Alamat</th>
                        <th style="background-color:rgb(237,173,204);">Telepon</th>
                        <th style="background-color:rgb(237,173,204);">Opsi</th>
                    </tr> 
                  </thead>
                  <tbody>
                  <?php
                  include 'koneksi.php';

                  $hasil = "SELECT * FROM user INNER JOIN role ON user.ID_ROLE=role.ID_ROLE";
                  $hasil_data = mysqli_query($koneksi,$hasil) or die (mysqli_error($koneksi));
                        while ($data = mysqli_fetch_array($hasil_data)){?>
                           <tr>
                            <td><?=$data['ID_USER']?></td>
                            <td><?=$data['JENIS_ROLE']?></td>
                            <td><?=$data['NAMA_USER']?></td>
                            <td><?=$data['ALAMAT_USER']?></td>
                            <td><?=$data['TELP_USER']?></td>
                            <?php    
                            echo "
                            <td align='center'>
                             <a href=editsup.php?id=".$data[0]." class='btn btn-info btn-xs'>Edit</a>
                             <a href=deletesup.php?id=".$data[0]." style='background-color:rgb(255,0,0);' class='btn btn-info btn-xs'>Hapus</a>
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
</html>