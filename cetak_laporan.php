<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
//untuk pencarian Laporan

$tgl_awal = $_POST["tgl_daftar"];
$tgl_akhir = $_POST["tgl_daftar"];


$data_pendaftar = query ("SELECT pasien.kode_pendaftaran,pasien.tgl_daftar,pasien.nama,poliklinik.nama_poli,dokter.nama_dokter,jam.jam,pasien.status from pasien join poliklinik on pasien.id_poli=poliklinik.id_poli join dokter on pasien.id_dokter=dokter.id_dokter join jam on pasien.id_jam=jam.id_jam
            WHERE tgl_daftar
              ");

$mpdf = new \Mpdf\Mpdf();

$tampil = '<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Data Pendaftar</title>


    <link href=admin/vendor/bootstrap/css/bootstrap.min.css rel=stylesheet>
    <link href=admin/css/simple-sidebar.css rel=stylesheet>
  </head>
  <body>
  <div class=row>
    <div class=col-sm-4 mb-3>
      <table class=table table-bordered>
        <tr>
        <td width=180 rowspan=2><center><img src=img/ba.jpg width=150></center></td>
          <td width=500><center><h2> DATA REKAPILUTASI PENDAFTARAN ONLINE</h2></center></td>
        </tr>
        <tr>
          <td width=600><center><h2>PASIEN RAWAT JALAN POLIKLINIK RS ASIH</h2>
          <font size=3>JL.Kyai H. Sokhari No.39, Sumurpecung, Kec. serang Kota Serang Banten 42117</font></center></td>
        </tr>
    </table>
    <hr>
    </div>
<br>
<div class=row>
<div class=col>
<table border="1" cellpadding="5" cellspacing="0">
<tr>
    <th><font size=3>No </font></th>
    <th width="50"><font size=3>Kode Pendaftaran</font></th>
    <th><font size=3>Tgl Daftar</font></th>
    <th width="115"><font size=3>Nama Pasien</font></th>
    <th><font size=3>Poli</font> </th>
    <th><font size=3>Dokter</font> </th>
    <th width="50"><font size=3>Jam Berobat</font></th>
    <th><font size=3>Status</font></th>
</tr>';
$i=1;
foreach ($data_pendaftar as $row) {

  $tampil .= '<tr>
                <td><center>'. $i++ .'</center></td>
                <td><center>'. $row["kode_pendaftaran"] .'</center></td>
                <td>'. date('d-m-Y', strtotime( $row["tgl_daftar"])) .'</td>
                <td>'. $row["nama"] .'</td>
                <td>'. $row["nama_poli"] .'</td>
                <td>'. $row["nama_dokter"] .'</td>
                <td>'. $row["jam"] .'</td>
                <td>'. $row["status"] .'</td>
              </tr>';
}


$tampil .= '</table>
</div>
  </div>


  <script src=admin/vendor/jquery/jquery.min.js></script>
  <script src=admin/vendor/bootstrap/js/bootstrap.bundle.min.js></script>

</body>
</html>
';

$mpdf->WriteHTML($tampil);
$mpdf->Output('rekapitulasi_data.pdf', 'I');
?>
