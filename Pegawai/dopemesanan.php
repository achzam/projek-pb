<?php
session_start();
include 'koneksi.php';

if(!$_POST){
	die('Tidak ada data yang disimpan!');
}
$pg = $_SESSION['id_user'];
$tglpj = $_POST['tgl'];
$sup = $_POST['sup'];
//simpan data ke tabel pemesanan
$sql = "insert into pemesanan (ID_USER,ID_SUP,TGL_PESAN,STATUS_PESAN) values ('$pg','$sup','$tglpj','0')";
mysqli_query($koneksi,$sql) or die('Gagal menyimpan data pemesanan');
//mencari id pemesanan
$sql = "select max(ID_PESAN) as ID_PESAN from pemesanan limit 1";
$row = mysqli_fetch_array(mysqli_query($koneksi,$sql));
$id_pemesanan = $row['ID_PESAN'];


//menyimpan data ke tabel detail_pemesanan
foreach($_POST['barang'] as $key => $brg){
	$sql = "insert into pesanan_update(KODE_BAR,ID_PESAN,JUMLAH_UP) 
	values ('{$brg}','{$id_pemesanan}','{$_POST['jumlah'][$key]}')";
	mysqli_query($koneksi,$sql);
}
echo "<script>alert('Dibatalkan!');window.location='Pemesanan.php'</script>";
//values ('{$id_pengadaan}','{$_POST['barang'][$key]}','{$jumlah}','{$_POST['hbeli'][$key]}')";
?>