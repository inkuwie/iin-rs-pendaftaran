<?php
session_start();

if (!isset($_SESSION["login"])){
  header("location: index.php");
  exit;
}

//ambil data di url

require 'functions.php';
$username = $_SESSION['username'];
$data_pendaftar = query("SELECT pasien.kode_pendaftaran,pasien.username,pasien.tgl_daftar,pasien.nama,poliklinik.nama_poli,dokter.nama_dokter,jam.jam from pasien join poliklinik on pasien.id_poli=poliklinik.id_poli join dokter on pasien.id_dokter=dokter.id_dokter join jam on pasien.id_jam=jam.id_jam where username = '$username' ORDER by kode_pendaftaran DESC limit 3");
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
  body , html{
    height: auto;
  }
  .bg {
    background-image: url("img/background.jpg");
    height: auto;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
  }
</style>
</head>

<body  class="bg">


  <!-- navibar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
  <a class="navbar-brand" href="">RUMAH SAKIT ASIH</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="daftar.php">Pendaftaran Online<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
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

    <!-- Judul sebagai header -->

        <div class="pt-5 pb-5">
          <br>
            <div class="container pb-5">
                <div class="row">
                    <div class="col">
                        <h3>Pendaftaran Poliklinik pada Pasien Rawat Jalan</h3>
                        <div class="lead">Selamat datang <?php echo $_SESSION["username"] ?></div>
            <br>
<!--judul----------------------->
                  <div class="row">
                    <div class="col text-center mt-4">
                      <h4> Data Permohonan Anda</h4>
                      <br>
                    </div>
                  </div>

<!--Tabel Data Pemohon-------------------->
<br>
                  <div class="row">
                    <div class="col mb-5">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <td width="50"><center><h6>No</h6></center></td>
                            <td width="160"><center><h6>Kode Pendaftaran</h6></center></td>
                            <td hidden><center><h6>username</h6></center></td>
                            <td width="110"><center><h6>Tgl Daftar</h6></center></td>
                            <td width="190"><center><h6>Nama Pasien</h6></center></td>
                            <td width="90"><center><h6>Poliklinik</h6></center></td>
                            <td width="200"><center><h6>Dokter</h6></center></td>
                            <td width="120"><center><h6>Jam Berobat</h6></center></td>
                            <td width="145"><center><h6>Opsi</h6></center></td>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1; ?>
                          <?php  foreach ($data_pendaftar as $row ) : ?>

                               <tr>
                                 <td><center><?= $i; ?></center></td>
                                 <td><center><?= $row["kode_pendaftaran"]; ?></center></td>
                                 <td hidden><?= $row["username"]; ?></td>
                                 <td><center><?= date('d-m-Y', strtotime( $row["tgl_daftar"])); ?></center></td>
                                 <td><?= $row["nama"]; ?></td>
                                 <td><?= $row["nama_poli"]; ?></td>
                                 <td><?= $row["nama_dokter"]; ?></td>
                                 <td><center><?= $row["jam"]; ?></center></td>
                                 <td>
                                   <button type="submit" class="btn btn-info btn-sm mt-1"><a href="cetak.php?kode_pendaftaran=<?= $row["kode_pendaftaran"]?>" target="_blank" class="text-reset" style="text-decoration:none">CETAK</a></button>
                                   <button type="button" class="btn btn-info btn-sm mt-1"><a href="edit__pasien.php?kode_pendaftaran=<?= $row["kode_pendaftaran"]?>" class="text-reset" style="text-decoration:none">RUBAH</a></button>
                                 </td>
                               </tr>
                               <?php $i++ ?>
                             <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>

                  </div>

                    </div>

                </div>
            </div>
        </div>

</body>

</html>
