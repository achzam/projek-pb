<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Barang</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body> <center>
<div class="col-md-8 offset-md-2" style="margin:0px;width:1200px;">
  <h1 class="text-center" style="color:rgb(129,124,124);margin:0px;">Form Barang</h1></div>
<br>
<fieldset>
<div>
<form  method="post" id="forminput" action="dobarang.php" enctype="multipart/form-data">
<div class="form-group">
<input type="text" class="form-control" name="nama" id="formGroupExampleInput" placeholder="Nama Barang">
</div>
<div class="form-group">
<select class="form-control" name="jenis" id="exampleFormControlSelect1">
<option disabled selected="selected">Jenis Barang</option>
                            <?php include 'koneksi.php';
                            $sql = mysqli_query($koneksi,"SELECT * FROM jenis_barang ORDER BY ID_JB ASC");
                            while ($row = mysqli_fetch_array($sql)){
                                echo "<option value=".$row['0'].">".$row['1']." </option>";
                            }
                            ?>
                            </select>
        </div>
        <div class="form-group">
<select class="form-control" name="warna" id="exampleFormControlSelect1">
<option disabled selected="selected">Warna</option>
                            <?php include 'koneksi.php';
                            $sql = mysqli_query($koneksi,"SELECT * FROM warna ORDER BY ID_WARNA ASC");
                            while ($row = mysqli_fetch_array($sql)){
                                echo "<option value=".$row['1']."> ".$row['1']." </option>";
                            }
                            ?>
                            </select>
        </div>
        <div class="form-group">
<select class="form-control" name="ukuran" id="exampleFormControlSelect1">
<option disabled selected="selected">Ukuran</option>
                            <?php include 'koneksi.php';
                            $sql = mysqli_query($koneksi,"SELECT * FROM ukuran ORDER BY ID_UKURAN ASC");
                            while ($row = mysqli_fetch_array($sql)){
                                echo "<option value=".$row['1'].">".$row['1']." </option>";
                            }
                            ?>
                            </select>  <br>
        <div class="form-group">
<input type="number" class="form-control" name="harga" id="formGroupExampleInput" placeholder="Harga Barang">
</div> 
</div><br>
<div>
  <button class="btn btn-primary" type="submit" name="simpan" id="simpan" style="background-color:rgb(237,173,204);">simpan</button> </form>
  </fieldset></div></div></div></center>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>