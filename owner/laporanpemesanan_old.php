<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.6/b-flash-1.5.6/b-html5-1.5.6/datatables.min.css"/>
 
    <title>Hello, world!</title>
  </head>
  <body>
  <h1 class="text-center" style="color:rgb(129,124,124);margin:0px;">Laporan Pemesanan</h1><br>
    <form action="" method="post">
    <div class="container">
      <div class="row">
        <div class="col">
          <select class="form-control" name="bln" id="bln">
            <option value="">Pilih Bulan</option>
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
          </select>
        </div>
        <div class="col">
          <select name="thn" id="thn" class="form-control">
            <?php
              $mulai = date('Y')-10;
              for($i = $mulai;$i<$mulai+50;$i++){
                $sel = $i ==date('Y') ? 'selected="selected"' : '';
                echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
              }
            ?>
          </select>
        </div>
      </div>
    <br><button type="submit" class="btn btn-primary">Tampilkan Laporan</button>
    </div>
    </form><br>

    <div class="panel-body">
    <div class="col-md-12">
                <table class="table responsive table-striped table-bordered table-list" id="datatable">
                  <thead>
                    <tr>
                        <th style="background-color:rgb(255, 200, 230);">ID Pemesanan</th>
                        <th style="background-color:rgb(255, 200, 230);">Barang</th>
                        <th style="background-color:rgb(255, 200, 230);">Jumlah</th>
                        <th style="background-color:rgb(255, 200, 230);">tanggal</th>
                        <th style="background-color:rgb(255, 200, 230);">Status</th>
                       
                    </tr> 
                  </thead>
                  <tbody>
                  <?php include "koneksi.php";
                  @$bln=$_POST['bln'];
                  @$thn=$_POST['thn'];
                  $hasil = mysqli_query($koneksi,"select pu.id_pesan, br.nama_bar, pu.jumlah_up, pm.tgl_pesan, pm.status_pesan from pesanan_update pu join pemesanan pm on pu.id_pesan=pm.id_pesan join barang br on br.kode_bar=pu.kode_bar where month(tgl_pesan)='$bln' and year(tgl_pesan)='$thn' order by pm.tgl_pesan");
                 // $hasil = mysqli_query($koneksi,"select br.kode_bar,br.nama_bar, tr.id_trima, hp.jumlah_his, hp.harga_his, hp.subtotal from history_penerimaan hp join penerimaan tr on hp.id_trima=tr.id_trima join barang br on hp.kode_bar=br.kode_bar where tr.id_trima='$id'  ") ; 
                   if ($hasil === FALSE) {
                         die(mysqli_error($koneksi));
                        }
                        while ($data = mysqli_fetch_array($hasil)){
                         @ $jml = $data[3];
                         @ $hrg = $data[4];
                          ?>
                          <tr>
                            <td><?=$data[0]?></td>
                            <td><?=$data[1]?></td>
                            <td><?=$data[2]?></td>
                            <td><?=$data[3]?></td>
                            <td><?php
                              $sts = $data[4];
                              if($sts=='0'){
                                echo "Belum Diproses!";
                              }if($sts=='1'){
                                echo "Tersimpan! ";
                                }
                             if($sts=='2'){
                                echo "Dibatalkan!";
                              }
                             ?></td>
                          <?php
                          }
		                    ?>
                        </tbody>
                        <tr>
                </table>
              </div></div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.6/b-flash-1.5.6/b-html5-1.5.6/datatables.min.js"></script>

<script type="text/javascript">
  $(document).ready( function () {
    $('#datatable').DataTable({
      "autoWidth": true,
      dom: 'Bfrtip',
      buttons: [
          {
              extend: 'pdfHtml5',
              orientation: 'potrait',
              pageSize: 'LEGAL',
              title: 'Laporan Pemesanan Bulan <?= $bln ?> <?= $thn ?>'
          },
      ]
    });

} );
</script>
</html>