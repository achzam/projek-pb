<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$warna = $_POST['warna'];
$ukuran = $_POST['ukuran'];
$harga = $_POST['harga'];

$sql = "insert into barang (ID_JB, NAMA_BAR,UKURAN_BAR,WARNA_BAR, HARGA_BELI_BAR) values ('$jenis', '$nama', '$ukuran','$warna','$harga')";
mysqli_query($koneksi,$sql) or die('Gagal menyimpan data pemesanan');
//mencari id barang
// $sql = "select max(KODE_BAR) as KODE_BAR from barang limit 1";
// $row = mysqli_fetch_array(mysqli_query($koneksi,$sql));
// $id_barang = $row['KODE_BAR'];
// //menyimpan data ke tabel detail_pemesanan

// 	$sql = "insert into detail_barang (KODE_BAR,ID_UKURAN,ID_WARNA) 
// 	values ('$id_barang','$ukuran','$warna')";
// 	mysqli_query($koneksi,$sql);

echo "<script>alert('Data tersimpan');window.location='Form Barang.php'</script>";
?>
