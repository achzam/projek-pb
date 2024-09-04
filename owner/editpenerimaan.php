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

<h1 class="text-center" style="color:rgb(129,124,124);margin:0px;">Edit Penerimaan</h1><br>
              <div class="row">                
                  </div><!-- /row -->
                    <div class="content">   
                    <form action="" method="post">
                    <div class="formgroup">
                        <?php                   
                        include 'koneksi.php';
                        $id = $_GET['id'];
                        $sql = mysqli_query($koneksi,"select * from history_penerimaan where ID_TRIMA='$id'");
                        if($sql === FALSE) { 
                            die(mysqli_error($koneksi));}
                        while($row = mysqli_fetch_array($sql)){
                        ?>
                        <label >Barang</label>
                        <input type="text" class="form-control" name="idbarang" disabled value="<?php echo $row[1]?>">
                        <label >Id Penerimaan</label>
                        <input type="text" class="form-control" name="idpeg" disabled value="<?php echo $row[0]?>">
                        <label>Harga</label>
                        <input type="number" class="form-control" name="harga" disabled value="<?php echo $row[2]?>">
                        <label>Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" value="<?php echo $row[3]?>">
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
                @$idbar = $_POST['idbarang'];
                @$idpeg = $_POST['idpeg'];
                @$harga = $_POST['harga'];
                @$jumlah = $_POST['jumlah'];
                $sql = "UPDATE history_penerimaan set JUMLAH_HIS='$jumlah' where ID_TRIMA='$id'";
                $sql = "UPDATE history_penerimaan set HARGA_HIS='$harga' where ID_TRIMA='$id'";
                mysqli_query($koneksi,$sql) or die ('gagal simpan data UPDATE');
                echo "<script>alert('Data tersimpan');window.location='detpenerimaan.php'</script>";
            }
                else{}
                
              ?>
</body>
</html>