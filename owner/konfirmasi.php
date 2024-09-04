<?php
include "koneksi.php";

$id = $_GET['id'];
$sql = "update pemesanan set status_pesan='1' where id_pesan='$id'";
// echo $sql;
mysqli_query($koneksi,$sql) or die("gagal update");
echo "<script>window.location='Pemesanan.php'</script>";
?>