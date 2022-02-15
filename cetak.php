<?php
require_once __DIR__ . '/vendor/autoload.php';

$kode_pendaftaran = $_GET["kode_pendaftaran"];

require 'functions.php';
$pasien= query("SELECT pasien.kode_pendaftaran,pasien.tgl_daftar,poliklinik.nama_poli,dokter.nama_dokter,jam.jam,pasien.jenis_pembayaran,pasien.no_rm,pasien.nama,pasien.jk,pasien.tlahir,pasien.nohp,pasien.ttl,pasien.pekerjaan,pasien.alamat,pasien.wnama,pasien.wjk,pasien.walamat,pasien.wnohp from pasien
    join poliklinik on pasien.id_poli=poliklinik.id_poli
    join dokter on pasien.id_dokter=dokter.id_dokter
    join jam on pasien.id_jam=jam.id_jam WHERE kode_pendaftaran=$kode_pendaftaran");

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
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
          <td width=500><center><h1>PENDAFTARAN ONLINE</1></center></td>
        </tr>
        <tr>
          <td width=600><center><h2>PASIEN RAWAT JALAN POLIKLINIK RS ASIH<h2>
          <font size=2>JL.Kyai H. Sokhari No.39, Sumurpecung, Kec. serang Kota Serang Banten 42117</font></center></td>
        </tr>
    </table>
    <hr>
    </div>
<br>
    <div class=row>
      <div class=col-sm-4 mb-3>
        <table class=table table-bordered>
        <tr><td colspan=3><h4>-   Data   -</h4></td></tr>
          <tr>
            <td width=160 height=30>Kode Pendaftaran</td>
            <td width=30 height=20>:</td>';
            foreach ($pasien as $col) {
              $html .= '
                    <td>'. $col["kode_pendaftaran"] .'</td>';
}
    $html .=' </tr>
          <tr>
            <td width=160 height=30>Tanggal Daftar</td>
            <td width=20 height=30>:</td>';
            foreach ($pasien as $col) {
              $html .= '
                    <td>'. date('d-m-Y', strtotime( $col["tgl_daftar"])) .'</td>';
}
    $html .='</tr>
          <tr>
            <td width=160 height=30>Poli</td>
            <td width=20 height=30>:</td>';
            foreach ($pasien as $col) {
              $html .= '
                    <td>'. $col["nama_poli"] .'</td>';
}
    $html .='</tr>
          <tr>
            <td width=160 height=30>Dokter</td>
            <td width=20 height=30>:</td>';
            foreach ($pasien as $col) {
              $html .= '
                    <td>'. $col["nama_dokter"] .'</td>';
}
    $html .='
          </tr>
          <tr>
            <td width=160 height=30>Jam Berobat</td>
            <td width=20 height=30>:</td>
            ';
            foreach ($pasien as $col) {
              $html .= '
                    <td>'. $col["jam"] .'</td>';
}
    $html .='
          </tr>
          <tr>
            <td width=160 height=30>Jenis Pembayaran</td>
            <td width=20 height=30>:</td>';
            foreach ($pasien as $col) {
              $html .= '
                    <td>'. $col["jenis_pembayaran"] .'</td>';
}
$html .='
      </tr>
      <tr>
        <td width=160 height=30>No Rekam Medik</td>
        <td width=20 height=30>:</td>';
        foreach ($pasien as $col) {
          $html .= '
                <td>'. $col["no_rm"] .'</td>';
}
    $html .='
          </tr>
          <tr><td colspan=3><h4>-   Data Pasien   -</h4></td></tr>
          <tr>
            <td width=160 height=30>Nama Pasien</td>
            <td width=20 height=30>:</td>
            ';
            foreach ($pasien as $col) {
              $html .= '
                    <td>'. $col["nama"] .'</td>';
}
    $html .='
          </tr>
          <tr>
            <td width=160 height=30>Jenis Kelamin</td>
            <td width=20 height=30>:</td>';
            foreach ($pasien as $col) {
              $html .= '
                    <td>'. $col["jk"] .'</td>';
}
    $html .='
          </tr>
          <tr>
            <td width=160 height=30>Tempat lahir</td>
            <td width=20 height=30>:</td>';
            foreach ($pasien as $col) {
              $html .= '
                    <td>'. $col["tlahir"] .'</td>';
}
    $html .='
          </tr>
          <tr>
            <td width=160 height=30>Tanggal lahir</td>
            <td width=20 height=30>:</td>';
            foreach ($pasien as $col) {
              $html .= '
                    <td>'. $col["ttl"] .'</td>';
}
    $html .='
          </tr>
          <tr>
            <td width=160 height=30>No Handphone</td>
            <td width=20 height=30>:</td>';
            foreach ($pasien as $col) {
              $html .= '
                    <td>'. $col["nohp"] .'</td>';
}
    $html .='
          </tr>
          <tr>
            <td width=160 height=30>Pekerjaan</td>
            <td width=20 height=30>:</td>';
            foreach ($pasien as $col) {
              $html .= '
                    <td>'. $col["pekerjaan"] .'</td>';
}
    $html .='
          </tr>
          <tr>
            <td width=160 height=30>Alamat</td>
            <td width=20 height=30>:</td>';
            foreach ($pasien as $col) {
              $html .= '
                    <td>'. $col["alamat"] .'</td>';
}
    $html .='
          </tr>
          <tr><td colspan=3><h4>-   Data Wali Pasien   -</h4></td></tr>
          <tr>
            <td width=160 height=30>Nama</td>
            <td width=20 height=30>:</td>
            ';
            foreach ($pasien as $col) {
              $html .= '
                    <td>'. $col["wnama"] .'</td>';
}
    $html .='
          </tr>
          <tr>
            <td width=160 height=30>Jenik kelamin</td>
            <td width=20 height=30>:</td>';
            foreach ($pasien as $col) {
              $html .= '
                    <td>'. $col["wjk"] .'</td>';
}
    $html .='
          </tr>
          <tr>
            <td width=160 height=30>Alamat</td>
            <td width=20 height=30>:</td>';
            foreach ($pasien as $col) {
              $html .= '
                    <td>'. $col["walamat"] .'</td>';
}
    $html .='
          </tr>
          <tr>
            <td width=160 height=30>No Handphone</td>
            <td width=20 height=30>:</td>';
            foreach ($pasien as $col) {
              $html .= '
                    <td>'. $col["wnohp"] .'</td>';
}
    $html .='
          </tr>';



      $html .='</table>
      </div>
<br>
<br>
<br>
<br>
<br>
<br>
<div>Catatan : </div>
<div>1. Pasien diharapkan datang satu jam sebelum pemeriksaan untuk check in pada bagian pendaftaran</div>
<div>2. Pasien diharapkan konfirmasi terlebih dahulu kebagian pendaftaran untuk proses administrasi</div>
<div>3. Jika Pasien menggunankan Pembayaran melalui bpjs atau asuransi lainnya harap membawa
        <br>- Photocopy kartu bpjs/asuransi
        <br>- Photocopy KTP
        <br>- Surat rujukan (bagi pengguna bpjs)</div>

    <script src=admin/vendor/jquery/jquery.min.js></script>
    <script src=admin/vendor/bootstrap/js/bootstrap.bundle.min.js></script>

  </body>
</html>
';

$mpdf->WriteHTML($html);
$mpdf->Output('form_pasien.pdf', 'I');
?>
