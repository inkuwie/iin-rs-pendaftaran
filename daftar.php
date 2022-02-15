<?php
session_start();

if (!isset($_SESSION["login"])){
  header("location: index.php");
  exit;
}

require 'functions.php';
$hari = array ( 1 =>    'Senin',
                        'Selasa',
                        'Rabu',
                        'Kamis',
                        'Jumat',
                        'Sabtu',
                        'Minggu'
                      );



$informasi = query ("SELECT * from informasi");


 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ASIH</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Menyisipkan Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Menyisipkan JQuery dan Javascript Bootstrap -->


    <!-- jQuery dulu, kemudian Popper.js, kemudian Bootstrap.js -->
      <script src="js/jquery-3.3.1.min.js"></script>
      <!-- bootstrap.bundle.min.js sudah include Popper.js -->
      <script src="js/bootstrap.bundle.min.js" ></script>

<style media="screen">
body, html {
  height: auto;
}
.bg {
  background-image:url("img/backgroundps.jpg");
  height: auto;
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;

}
</style>

</head>



<body class="bg pb-4">

  <!-- navibar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
  <a class="navbar-brand" href="">RUMAH SAKIT ASIH</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="daftar.php">Pendaftaran Online<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="data_pemohon.php">Data Pemohon</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pasien_caradaftar.php">Cara Mendaftar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pasien_jadwal_posting.php">Jadwal Dokter</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
    </ul>
  </div>
</div>
</nav>

    <!-- Membuat komponen jubotron sebagai header -->
    <div id="daftar">
        <div class="pt-5">
          <br>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h3>Pendaftaran Poliklinik pada Pasien Rawat Jalan</h3>
                        <div class="lead">Selamat Datang <?php echo $_SESSION["username"] ?> silahkan mendaftar</div>

                  <br>
<!--judul----------------------->
                  <div class="row">
                    <div class="col text-center">
                      <h4> Poli Rawat Jalan</h4>
                      <br>
                    </div>
                  </div>
<!-- Tombol daftar---------------->
                  <div class="row">
                    <div class="col">
                      <table class="table table-bordered text-center">
                        <tr>
                          <td><button type="submit" name="pasien_lama" class="btn btn-info"><a href="form_pasien_lama.php" style="text-decoration:none" class="text-reset">PASIEN LAMA</a></button>
                            <button type="submit" name="pasien_baru" class="btn btn-info"><a href="form_pasien_baru.php" style="text-decoration:none" class="text-reset">PASIEN BARU</a></button></td>
                        </tr>
                      </table>
                    </div>
                  </div>
<!--Antrian-------------------->
<br>
                  <div class="row">
                    <div class="col-sm-4 mb-3">
                      <table class="table table-bordered">
                        <tr>
                          <td colspan="2"><center><h5>Poli Anak</h5></center></td>
                        </tr>
                        <tr>
                          <td height="75"><b>INFORMASI :</b>
                            <?php foreach ($informasi as $row ) : ?>
                                 <h6><?= $row["anak"]; ?></h6>
                               <?php endforeach; ?></td>
                        </tr>
                        <tr>
                          <td colspan="2"><h5>
                            <?php
                            date_default_timezone_set("Asia/Jakarta");
                            $jam = date ("H:i:s");
                            echo "<b> " . " " ." </b> ";
                            $a = date ("H");
                            if (($a>=6) && ($a<=9)) {
                                echo " <b> Selamat Pagi! Pendaftaran sudah dibuka </b>";
                            }else if(($a>=9) && ($a<=13)){
                                echo " dr. Dion Wiyoko, Sp.A ";
                            }elseif(($a>13) && ($a<=20)){
                                echo "dr. Suryono Hanung, Sp.A";
                            }else{
                                echo "<b> Selamat malam !!  </b>";
                            }
                             ?></h5>
                          </td>
                        </tr>
                    </table>
                    </div>

                    <div class="col-sm-4 mb-3">
                       <table class="table table-bordered">
                         <tr>
                           <td colspan="2"><center><h5>Poli Gigi</h5></center></td>
                         </tr>
                         <tr>
                           <td height="75"><b>INFORMASI :</b>
                             <?php foreach ($informasi as $row ) : ?>
                                  <h6><?= $row["gigi"]; ?></h6>
                                <?php endforeach; ?></td>
                         </tr>
                         <tr>
                           <td colspan="2"><h5>
                             <?php
                             date_default_timezone_set("Asia/Jakarta");
                             $jam = date ("H:i:s");
                             echo "<b> " . " " ." </b> ";
                             $a = date ("H");
                             if (($a>=6) && ($a<=9)) {
                                 echo " <b> Selamat Pagi! Pendaftaran sudah dibuka </b>";
                             }else if(($a>=9) && ($a<=13)){
                                 echo "drg. Gunawan Prasetya";
                             }elseif(($a>13) && ($a<=20)){
                                 echo "drg. Lintang Mulan";
                             }else{
                                 echo "<b> Selamat malam !!  </b>";
                             }
                              ?></h5>
                           </td>
                         </tr>
                     </table>
                   </div>

                    <div class="col-sm-4 mb-3">
                      <table class="table table-bordered">
                        <tr>
                          <td colspan="2"><center><h5>Poli Umum</h5></center></td>
                        </tr>
                        <tr>
                          <td height="75"><b>INFORMASI :</b>
                            <?php foreach ($informasi as $row ) : ?>
                                 <h6><?= $row["umum"]; ?></h6>
                               <?php endforeach; ?></td>
                        </tr>
                        <tr>
                          <td colspan="2"><h5>
                              <?php
                              date_default_timezone_set("Asia/Jakarta");
                              $jam = date ("H:i:s");
                              echo "<b> " . " " ." </b> ";
                              $a = date ("H");
                              if (($a>=6) && ($a<=9)) {
                                  echo " <b> Selamat Pagi! Pendaftaran sudah dibuka </b>";
                              }else if(($a>=9) && ($a<=13)){
                                  echo "dr. Adi Hapsah";
                              }elseif(($a>13) && ($a<=20)){
                                  echo "dr. Intan Rahmawati";
                              }else{
                                  echo "<b> Selamat malam !!  </b>";
                              }
                               ?></h5>
                             </td>
                        </tr>
                      </table>
                    </div>

                  </div>

                    </div>

                </div>
            </div>
        </div>
            </div>
<!-- Bootstrap core JavaScript -->
<script src="admin/vendor/jquery/jquery.min.js"></script>
<script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/daftar.js"></script>
</body>

</html>
