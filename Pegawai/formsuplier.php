<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form suplier</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <?php include 'koneksi.php'; ?>
	<link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <html lang="en">

</head>

<body><center>
<div class="col-md-8 offset-md-2" style="margin:0px;width:1200px;">
<h1 class="text-center" style="color:rgb(129,124,124);margin:0px;">Form Suplier</h1><br>
              <div class="row">                
                  </div><!-- /row -->
                    <div class="content">   
                    <form action="" method="post">
                    <div class="formgroup">
                        <?php                   
                        include 'koneksi.php';
                        ?>
                        <div align="left"><label >Kota</label></div>
                        <select class="form-control" name="kota">
                            <option disabled selected="selected">Kota</option>
                            <?php include 'koneksi.php';
                            $sql = mysqli_query($koneksi,"SELECT * from kota ORDER BY ID_KOTA ASC");
                            while ($row = mysqli_fetch_array($sql)){
                                echo "<option value=".$row['0'].">".$row['0']." - ".$row['1']." </option>";
                            }
                            ?>
                            </select> 
                        <div align="left"><label >Nama</label></div>
                        <input type="text" class="form-control" name="nama" >
                        <div align="left"><label >Alamat</label></div>
                        <input type="text" class="form-control" name="alamat" >
                        <div align="left"><label>No. Telp</label></div>
                        <input type="number" class="form-control" name="telp">
                        
                        <div class="btn">
                        <button type="submit" class="btn btn-primary" style="background-color:rgb(237,173,204);" name="input">Simpan</button>
                        </div>
                    </div>
                        </form>
                    </div>
              </div>

<?php
              if(isset($_POST['input'])){
                @$nama = $_POST['nama'];
                @$kota = $_POST['kota'];
                @$alamat = $_POST['alamat'];
                @$telp = $_POST['telp'];
                $sql = "INSERT INTO supplier (ID_KOTA,NAMA_SUP,ALAMAT_SUP,TELP_SUP) VALUE ('$kota','$nama','$alamat','$telp')";
                mysqli_query($koneksi,$sql) or die ('gagal simpan data UPDATE');
                echo "<script>alert('Data tersimpan');window.location='pendataansuplier.php'</script>";
            }
                else{}
                
              ?></div></center>
</body>
</html>