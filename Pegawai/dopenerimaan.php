<?php
session_start();
include 'koneksi.php';

if(!$_POST){
	die('Tidak ada data yang disimpan!');
}
@$pg = $_SESSION['id_user'];
@$tglpj = $_POST['tgl'];
@$sup = $_POST['sup'];
@$id = $_POST['id'];
@$jml=$_POST['jumlah'];

//simpan data ke tabel penerimaan
$sql = "insert into penerimaan (ID_USER,ID_SUP,TGL_TRIMA,STATUS_TRIMA) values ('$pg','$sup','$tglpj','0')";
mysqli_query($koneksi,$sql) or die('Gagal menyimpan data penerimaan');

//mencari id penerimaan
$sql = "select max(ID_TRIMA) as ID_TRIMA from penerimaan limit 1";
$row = mysqli_fetch_array(mysqli_query($koneksi,$sql));
$id_penerimaan = $row['ID_TRIMA'];
	
//menyimpan data ke tabel detail_penerimaan
foreach($_POST['barang'] as $key => $brg){
	$sql = "insert into history_penerimaan(ID_TRIMA,KODE_BAR,JUMLAH_HIS) 
	values ('{$id_penerimaan}','{$brg}','{$_POST['jumlah'][$key]}')";
	mysqli_query($koneksi,$sql);
}

echo "<script>alert('Dibatalkan!');window.location='penerimaan.php'</script>";
?>