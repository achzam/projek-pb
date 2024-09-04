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

<body>
<div class="footer-basic" style="background-color:rgb(255, 200, 230);"><img src="assets/img/sakura.png"><span>&nbsp;  &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</span><strong style="font-size:46px;color:rgb(254,255,255);">Boutique</strong><span> &nbsp;&nbsp;</span><em style="font-size:35px;color:rgb(139,139,139);"><span></span>Tokyo</em><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;  <img src="assets/img/sakura1.png" style="width:237px;"></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <?php include 'koneksi.php';
@$id=$_GET['id'];
session_start();
$hasil = "SELECT * FROM pemesanan 
                  INNER JOIN user ON pemesanan.ID_USER=user.ID_USER
                  INNER JOIN supplier ON pemesanan.ID_SUP=supplier.ID_SUP WHERE ID_PESAN='$id'
                  ";
                  $hasil_data = mysqli_query($koneksi,$hasil) or die (mysqli_error($koneksi));
$data = mysqli_fetch_array($hasil_data)
?>

 <h1 class="text-center" style="color:rgb(129,124,124);margin:0px;">Pemesanan <?= $data['ID_PESAN'] ?></h1><br>
 <div class="row"> 
 <div class="col">
                <table border="0">
                <tr>
                        <td width="100px"><b>Pegawai</b></td>
                        <td>:&nbsp;<?= $data['NAMA_USER'] ?></td>
                    </tr>
                    <tr>
                        <td width="100px"><b>Suplier</b></td>
                        <td>:&nbsp;<?= $data['NAMA_SUP'] ?></td>
                    </tr>
                </table>
           </div><br>
            <div class="col">
                <table border="0">
                    <tr>
                        <td width="175px"><b>Tanggal Pemesanan</b></td>
                        <td>:&nbsp;<?= $data['TGL_PESAN'] ?></td>
                    </tr>
                    
                </table>
           
                </div> </div><br>
  <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        <th style="background-color:rgb(255, 200, 230);">Barang</th>
                        <th style="background-color:rgb(255, 200, 230);">Ukukran</th>
                        <th style="background-color:rgb(255, 200, 230);">Jumlah</th>
                     
                    </tr> 
                  </thead>
                  <tbody>
                  <?php
                  include 'koneksi.php';
                 
                  $hasil = mysqli_query($koneksi,"SELECT * FROM pesanan_update dp join pemesanan pj on pj.id_pesan=dp.id_pesan join barang br on dp.KODE_BAR=br.KODE_BAR  where dp.id_pesan='$id'");
                  if ($hasil === FALSE) {
                  die(mysqli_error($koneksi));
                  }
                  while ($data = mysqli_fetch_array($hasil)){?>
                           
                          <tr>
                            <td><?=$data['NAMA_BAR']?></td>
                            <td><?=$data['UKURAN_BAR']?></td>
                            <td><?=$data['JUMLAH_UP']?></td>
                            <?php
                           }
		                    ?>
                        </tbody>
                </table>
              </div>
 <script>
  window.print();
  window.close();
</script>
                        </body>
                        </html>