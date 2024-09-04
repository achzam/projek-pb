<?php include 'koneksi.php';
$content = "
<page>
<div style='padding:4mm; border:1px; solid;' align='center'>
<span style='font-size:25px;> Laporan Pemesanan</span>
</div>

</page>";

require_once('../html2pdf/html2pdf.class.php');
$html2pdf= new HTML2PDF('P','A4','en');
$html2pdf=WriteHTML($content);
$html2pdf=Output('Laporan Pemesanan.pdf');
?>