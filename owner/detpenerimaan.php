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
<?php  include 'koneksi.php';
 @$id=$_GET['id'];
session_start();
 $hasil = "SELECT * FROM penerimaan 
INNER JOIN user ON penerimaan.ID_USER=user.ID_USER
INNER JOIN supplier ON penerimaan.ID_SUP=supplier.ID_SUP
";
$hasil_data = mysqli_query($koneksi,$hasil) or die (mysqli_error($koneksi));
      
      $data = mysqli_fetch_array($hasil_data);
          ?>


 <h1 class="text-center" style="color:rgb(129,124,124);margin:0px;">Detail Penerimaan <?= $data['ID_TRIMA'] ?></h1><br>

                           <div class="row">
            <div class="col">
                <table border="0">
                <thead>
                    <tr>
                        <td width="150px">Tanggal Penerimaan</td>
                        <td>:&nbsp;<?= $data['TGL_TRIMA'] ?></td>
                    </tr>
                    
                </table>
            </div><br>
            <div class="col">
                <table border="0">
                <tr>
                        <td width="100px">Pegawai</td>
                        <td>:&nbsp;<?= $data['NAMA_USER'] ?></td>
                    </tr>
                    <tr>
                        <td width="100px">Suplier</td>
                        <td>:&nbsp;<?= $data['NAMA_SUP'] ?></td>
                    </tr>
                    </thead>
                </table>
            </div></div><br>
  <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        <th style="background-color:rgb(255, 200, 230);">Barang</th>
                        <th style="background-color:rgb(255, 200, 230);">Ukuran</th>
                        <th style="background-color:rgb(255, 200, 230);">Jumlah Barang</th>
                        <th style="background-color:rgb(255, 200, 230);">Harga Barang</th>
                        <th style="background-color:rgb(255, 200, 230);">Jumlah Harga</th>
                    </tr> 
                  </thead>
                  <tbody>
                  <?php
                 
                  $hasil = mysqli_query($koneksi,"SELECT * FROM history_penerimaan dp join penerimaan pj on pj.id_trima=dp.id_trima join barang br on dp.KODE_BAR=br.KODE_BAR where dp.id_trima='$id'");
                 // $hasil = mysqli_query($koneksi,"select br.kode_bar,br.nama_bar, tr.id_trima, hp.jumlah_his, hp.harga_his, hp.subtotal from history_penerimaan hp join penerimaan tr on hp.id_trima=tr.id_trima join barang br on hp.kode_bar=br.kode_bar where tr.id_trima='$id'  ") ; 
                   if ($hasil === FALSE) {
                         die(mysqli_error($koneksi));
                        }
                        while ($data = mysqli_fetch_array($hasil)){
                          ?>
                            
                          <tr>
                            <td><?=$data['NAMA_BAR']?></td>
                            <td><?=$data['UKURAN_BAR']?></td>
                            <td><?=$data[3]?></td>
                            <td><?php echo number_format($data[2]);?></td>
                            <td><?php echo number_format($data[2] * $data[3]);?></td>
                            <?php @$tot += ($data[2] * $data[3]);
                        }
		                    ?>
                        </tbody>
                        <tr>
                        <td  colspan="4">Total Bayar</td>
                  <td>Rp.<?php echo number_format(@$tot); ?>,-</td>
                  </tr>
                </table>
              </div>
                        </body>
                        </html>