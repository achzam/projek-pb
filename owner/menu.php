<!doctype html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="assets/css/Pretty-Search-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background-color:rgb(238, 238, 238);">

<br><?php session_start(); include 'koneksi.php';?>
<div>
<center>
    <div>
    <li class="text-center">
        <img src="assets/img/find_user.png" class="user-image img-responsive"/>
   <h3> <?php $npg =$_SESSION['username']; echo $npg ?> </h3>
</li>
</div><br>
<div class="col" style="height:400px;width:150px;">
<!-- <div><a href="pendataanpegawai.php" target="isi"><button class="btn btn-primary" type="button" style="background-color:rgb(255, 200, 230);color:rgb(16,15,15);height:40px;width:120px;">Pendataan</button></a></div><br> -->
<div><a href="Pemesanan.php" target="isi"><button class="btn btn-primary" type="button" style="background-color:rgb(255, 200, 230);color:rgb(16,15,15);height:40px;width:120px;">Pemesanan</button></a></div><br>
<div><a href="penerimaan.php" target="isi"><button class="btn btn-primary" type="button" style="background-color:rgb(255, 200, 230);color:rgb(16,15,15);height:40px;width:120px;">Penerimaan</button></a></div><br>
<div><a href="pembayaran.php" target="isi"><button class="btn btn-primary" type="button" style="background-color:rgb(255, 200, 230);color:rgb(16,15,15);height:40px;width:120px;">Pembayaran</button></a></div><br>
 <br><div>
</div>
   <div>
 <div><a href="logout.php" target="_top"><button class="btn btn-primary" type="button" style="background-color:rgb(255, 200, 230);color:rgb(16,15,15);height:40px;width:120px;">Logout</button></a></div>

</div>
</center>
</div>
</body>
</html>