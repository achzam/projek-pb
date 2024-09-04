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

<body>

<h1 class="text-center" style="color:rgb(129,124,124);margin:0px;">Edit Suplier</h1><br>
              <div class="row">                
                  </div><!-- /row -->
                    <div class="content">   
                    <form action="" method="post">
                    <div class="formgroup">
                        <?php                   
                        include 'koneksi.php';
                        $id = $_GET['id'];
                        $sql = mysqli_query($koneksi,"select * from supplier where ID_SUP='$id'");
                        if($sql === FALSE) { 
                            die(mysqli_error($koneksi));}
                        while($row = mysqli_fetch_array($sql)){
                        ?>
                         <label >ID Suplier</label>
                        <input type="text" class="form-control" name="idbarang" disabled value="<?php echo $row[0]?>">
                        <label >Nama Suplier</label>
                        <input type="text" class="form-control" name="nama" value="<?php echo $row[2]?>">
                        <label >Alamat Suplier</label>
                        <input type="text" class="form-control" name="warna"  value="<?php echo $row[3]?>">
                        <label >Telepon Suplier</label>
                        <input type="text" class="form-control" name="ukuran" value="<?php echo $row[4]?>">
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
                $sql = "UPDATE supplier set NAMA_SUP='$nama' where ID_SUP='$id'";
                $sql = "UPDATE supplier set ALAMAT_SUP='$warna' where ID_SUP='$id'";
                $sql = "UPDATE supplier set TELP_SUP='$ukuran' where ID_SUP='$id'";
                mysqli_query($koneksi,$sql) or die ('gagal simpan data UPDATE');
                echo "<script>alert('Data tersimpan');window.location='pendataansuplier.php'</script>";
            }
                else{}
                
              ?>
</body>
</html>