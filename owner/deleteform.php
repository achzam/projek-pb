<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete data</title>
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
<?php
include "koneksi.php";

$id = $_GET['id'];
$sql = "update pemesanan set status_pesan='2' where id_pesan='$id'";
// echo $sql;
mysqli_query($koneksi,$sql) or die("gagal batal");
echo "<script>alert('Dibatalkan');window.location='Pemesanan.php'</script>";
?>
</body>
</html>