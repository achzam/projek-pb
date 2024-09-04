<?php
include "koneksi.php";

$id = $_GET['id'];
$sql = "update penerimaan set status_trima='1' where id_trima='$id'";
// echo $sql;
mysqli_query($koneksi,$sql) or die("gagal update");
echo "<script>window.location='penerimaan.php'</script>";
?>