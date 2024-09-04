        <?php include 'koneksi.php';

$nama = $_POST['nama'];
$telp = $_POST['telp'];
$kota = $_POST['kota'];
$alamat = $_POST['alamat'];
$username = $_POST['user'];
$pass = md5($_POST['pass']);
$role = $_POST['role'];

if(isset($nama)){
    mysqli_query($koneksi,"INSERT INTO user (ID_ROLE,ID_KOTA,NAMA_USER,ALAMAT_USER,TELP_USER,USERNAME,PASSWORD) values ('$role','$kota','$nama','$alamat','$telp','$username','$pass')");
    ?>
    <script>
		alert("Data berhasil ditambahkan");
    </script>
    <?php
    }else{
        header( "Location: barangbaru.php?pesan=insert gagal" );?>
    <?php
    }
?>