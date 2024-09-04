<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form edit barang</title>
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
<h1 class="text-center" style="color:rgb(129,124,124);margin:0px;">Edit Barang</h1><br>
              <div class="row">                
                  </div><!-- /row -->
                    <div class="content">   
                    <form action="" method="post">
                    <div class="formgroup">
                        <?php                   
                        include 'koneksi.php';
                        $id = $_GET['id'];
                        $sql = mysqli_query($koneksi,"select * from barang where KODE_BAR='$id'");
                        if($sql === FALSE) { 
                            die(mysqli_error($koneksi));}
                        while($row = mysqli_fetch_array($sql)){
                        ?>
                         <div align="left"><label >ID Barang</label></div>
                        <input type="text" class="form-control" name="idbarang" disabled value="<?php echo $row[0]?>">
                        <div align="left"><label >Barang</label></div>
                        <input type="text" class="form-control" name="nama" value="<?php echo $row[2]?>">
                        <div align="left"><label >Warna Barang</label></div>
                        <input type="text" class="form-control" name="warna"  value="<?php echo $row[3]?>">
                        <div align="left"><label >Ukuran Barang</label></div>
                        <input type="text" class="form-control" name="ukuran" value="<?php echo $row[4]?>">
                        <div align="left"><label>Stok Barang</label></div>
                        <input type="number" class="form-control" name="jumlah" disabled value="<?php echo $row[5]?>">
                        <div align="left"><label>Harga Barang</label></div>
                        <input type="number" class="form-control" name="harga" value="<?php echo $row[6]?>">
                        <?php } ?>
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
                @$warna = $_POST['warna'];
                @$harga = $_POST['harga'];
                @$ukuran = $_POST['ukuran'];
                $sql = "UPDATE barang set NAMA_BAR='$nama' where KODE_BAR='$id'";
                $sql = "UPDATE barang set WARNA_BAR='$warna' where KODE_BAR='$id'";
                $sql = "UPDATE barang set UKURAN_BAR='$ukuran' where KODE_BAR='$id'";
                $sql = "UPDATE barang set HARGA_BELI_BAR='$harga' where KODE_BAR='$id'";
                mysqli_query($koneksi,$sql) or die ('gagal simpan data UPDATE');
                echo "<script>alert('Data tersimpan');window.location='pendataanbarang.php'</script>";
            }
                else{}
                
              ?></div></center>
</body>
</html>