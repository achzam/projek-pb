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
<?php include 'koneksi.php';
session_start();
$sql = "SELECT  KODE_BAR FROM barang";
$query =  mysqli_query($koneksi, $sql);
?>
 <div class="col-md-8 offset-md-2" style="margin:0px;width:1200px;">
                        <h1 class="text-center" style="color:rgb(129,124,124);margin:0px;">Pemesanan</h1>
                        <br>
 <fieldset>
 <form method="post" id="forminput" enctype="multipart/form-data" action="dopemesanan1.php">
 <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Tanggal</label>
  </div>
 <input type="text" class="form-control" name="tgl" value="<?= date("Y/m/d") ?>" readonly>
 </div>
 <select class="form-control" name="sup">
                            <option disabled selected="selected">Supplier</option>
                            <?php include 'koneksi.php';
                            $sql = mysqli_query($koneksi,"SELECT * FROM supplier ORDER BY ID_SUP ASC");
                            while ($row = mysqli_fetch_array($sql)){
                                echo "<option value=".$row['0'].">".$row['2']." </option>";
                            }
                            ?>
                            </select><br>

 <table class="table table-striped table-bordered table-list">
                        <thead>
                        <tr>
                            <th style="background-color:rgb(237,173,204);">Barang</th>
                            <th style="background-color:rgb(237,173,204);">Jumlah</th>
                            <!-- <th style="background-color:rgb(237,173,204);">Opsi</th> -->
                        </tr> 
                        </thead>
                        <tbody>
                        <tr>
                        <?php
                            $id = $_GET['id'];
                            $sql = mysqli_query($koneksi,"select nama_bar from barang where kode_bar='$id'");
                            if ($sql === FALSE) {
                                die(mysqli_error($koneksi));
                               }
                            $data = mysqli_fetch_array($sql);
                        ?>
                            <td><input class="form-control" type="text" name="barang" value="<?= $data[0] ?>" readonly/>
                            <input type="hidden" name="brg" id="brg" value="<?= $id ?>">
                            </td>
                            <td><input class="form-control" type="number" name="jumlah"/></td>
                        </tr>
                        </tbody>
                    </table>
                        <div class="btn">
 &nbsp;&nbsp;&nbsp;<button type="submit" style="background-color:rgb(237,173,204);" class="btn btn-primary" name="input">Input</button></div>
                    </div>
                    </div>
<!-- script otomatis tambah -->
<script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
var i = 1;
$(function(){
	$("#addRow").click(function(){
		row = '<tr>'+
		'<td><select class="form-control" name="barang['+i+']"><option disabled selected="selected">Barang</option><?php $sql = mysqli_query($koneksi,"SELECT * FROM barang ORDER BY KODE_BAR ASC"); while ($row = mysqli_fetch_array($sql)){ echo "<option value=".$row['0'].">".$row['0']." - ".$row['2']." </option>";}?></select></td>'+
		'<td><input type="number" class="form-control" name="jumlah['+i+']"/></td>'+
    '<td align="center"><button type="button" style="background-color:rgb(237,173,204);" class="del">Hapus</button></td>'+
		'</tr>';
		$(row).insertBefore("#last");
		i++;
		});
	});
	$(".del").live('click', function(){
		$(this).parent().parent().remove();
		});
</script>
<!-- END script otomatis tambah -->
                        </fieldset>
                            </center>
                            </div>
                            <br>
</body>
</html>