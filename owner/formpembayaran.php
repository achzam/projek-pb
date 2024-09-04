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

<body><center>
<div class="col-md-8 offset-md-2" style="margin:0px;width:1200px;"><br>
                        <h1 class="text-center" style="color:rgb(129,124,124);margin:0px;">Pembayaran</h1>
                        <br>
<fieldset>
 <form method="post" id="forminput" enctype="multipart/form-data" action="dopembayaran.php">
 <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Tanggal</label>
  </div>
 <input type="date" class="form-control" name="tgl" id="formGroupExampleInput">
 </div>
 <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Penerimaan</label>
  </div>
 <select class="form-control" name="idtrima">
                            <option disabled selected="selected">Penerimaan</option>
                            <?php include 'koneksi.php';
                            $sql = mysqli_query($koneksi,"SELECT * FROM penerimaan where id_trima not in(select id_trima from pembayaran) ORDER BY ID_TRIMA ASC");
                            while ($row = mysqli_fetch_array($sql)){
                                echo "<option value=".$row['0'].">".$row['0']." - ".$row['4']." </option>";
                            } ?> </select><br>
    <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Total Bayar</label>
  </div>
 <input type="file" class="form-control" name="foto" id="formGroupExampleInput">
 </div>
 <div class="btn">
   <button type="submit" style="background-color:rgb(237,173,204);" class="btn btn-primary" name="input">Input</button>
    </div> </div></form> </fieldset> </div></center>
    </body>