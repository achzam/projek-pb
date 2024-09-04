<?php
session_start();
include 'koneksi.php';

if(!$_POST){
	die('Tidak ada data yang disimpan!');
}
$pg = $_SESSION['username'];
$tglpj = $_POST['tgl'];
echo $pg;
//simpan data ke tabel penjualan
$sql = "insert into penjualan (ID_PEG,TGL_PENJUALAN) values ('$pg','$tglpj')";
echo $pg;
mysqli_query($koneksi,$sql) or die('Gagal menyimpan data pegawai');
//mencari id penjualan
$sql = "select max(id_penjualan) as id_penjualan from penjualan limit 1";
$row = mysqli_fetch_array(mysqli_query($koneksi,$sql));
$id_penjualan = $row['id_penjualan'];
echo $id_penjualan;

//menyimpan data ke tabel detail_penjualan
foreach($_POST['barang'] as $key => $brg){
	$sql = "insert into detail_penjualan(ID_PENJUALAN,ID_BARANG, JUMLAHBARANG_PENJUALAN) 
	values ('{$id_penjualan}','{$brg}','{$_POST['jumlah'][$key]}')";
	mysqli_query($koneksi,$sql);
}
echo "<script>alert('Data tersimpan');window.location='Pemesanan.php'</script>";
//values ('{$id_pengadaan}','{$_POST['barang'][$key]}','{$jumlah}','{$_POST['hbeli'][$key]}')";
?>