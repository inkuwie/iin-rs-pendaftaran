<?php
session_start();

if (!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
}

require 'functions.php';

//ambil data di url
$kode_pendaftaran = $_GET["kode_pendaftaran"];

 //query data mahasiswa berdasarkan
$edit_pasien = query("SELECT pasien.kode_pendaftaran,pasien.tgl_daftar,pasien.nama,poliklinik.id_poli,poliklinik.nama_poli,dokter.id_dokter,dokter.nama_dokter,jam.jam,pasien.jenis_pembayaran from pasien join poliklinik on pasien.id_poli=poliklinik.id_poli join dokter on pasien.id_dokter=dokter.id_dokter join jam on pasien.id_jam=jam.id_jam where kode_pendaftaran = $kode_pendaftaran")[0];

 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RUBAH CARA DAFTAR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Menyisipkan Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />

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

<body class="bg mt-3">

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
      <li class="nav-item">
        <a class="nav-link" href="data_pemohon.php">Data Pemohon</a>
      </li>
      <li class="nav-item active">
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


    <!-- Membuat komponen edit -->
                  <div class="container">
                <div class="row pt-5">
                  <div class="col text-center">
                    <h5>Rubah Data Pasien</h5>
                  </div>
                </div>

<div class="row">
        <div class="col md">
          <div class="card">
          <div class="card-body">

              <div class="row">
                      <div class="col md">
                        <form class="" action="" method="post">
                          <div class="form-group row">
                            <label for="kode_pendaftaran" class="col-sm-2"><h6>Kode Pendaftaran</h6></label>
                          <div class="col-sm-4">
                            <label for="kode_pendaftaran" name="kode_pendaftaran"><h6>: <?= $edit_pasien["kode_pendaftaran"];?></h6></label>
                          </div>
                          </div>

                          <div class="form-group row">
                            <label for="tgl_daftar" class="col-sm-2"><h6>Tgl Daftar</h6></label>
                          <div class="col-sm-4">
                            <label for="tgl_daftar"><h6>: <?= $edit_pasien["tgl_daftar"];?></h6></label>
                          </div>
                          </div>

                          <div class="form-group row">
                            <label for="nama" class="col-sm-2"><h6>Nama Pasien</h6></label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $edit_pasien["nama"];?>" required>
                          </div>
                          </div>

                          <div class="form-group row">
                            <label for="nama_poli" class="col-sm-2"><h6>Poli</h6></label>
                          <div class="col-sm-4">
                            <select class="form-control" name="id_poli" id="id_poli">
                                <option value="">Pilih</option>
                                <option value="1" <?php if($edit_pasien['id_poli'] == 1){echo 'selected';}?>>Umum</option>
                                <option value="2" <?php if($edit_pasien['id_poli'] == 2){echo 'selected';}?>>Anak</option>
                                <option value="3" <?php if($edit_pasien['id_poli'] == 3){echo 'selected';}?>>Gigi</option>
                            </select>
                          </div>
                          </div>

                          <div class="form-group row">
                            <label for="nama_dokter" class="col-sm-2"><h6>Dokter</h6></label>
                          <div class="col-sm-4">
                            <select class="form-control" name="id_dokter" id="id_dokter">
                                <option value="">Pilih</option>
                                <option value="1" <?php if($edit_pasien['id_dokter'] == 1){echo 'selected';}?>>Dr. Suryono Hanung, Sp.A</option>
                                <option value="2" <?php if($edit_pasien['id_dokter'] == 2){echo 'selected';}?>>Dr. Dion Wiyoko, Sp.A</option>
                                <option value="3" <?php if($edit_pasien['id_dokter'] == 3){echo 'selected';}?>>Dr. Adi Hapsah</option>
                                <option value="4" <?php if($edit_pasien['id_dokter'] == 4){echo 'selected';}?>>Dr. Intan Rahmawati</option>
                                <option value="5" <?php if($edit_pasien['id_dokter'] == 5){echo 'selected';}?>>Drg. Gunawan Prasetya</option>
                                <option value="6" <?php if($edit_pasien['id_dokter'] == 6){echo 'selected';}?>>Drg. Lintang Mulan</option>
                            </select>
                          </div>
                          </div>

                          <div class="form-group row">
                            <label for="jam" class="col-sm-2"><h6>Jam Berobat</h6></label>
                          <div class="col-sm-4">
                            <label for="jam"><h6>: <?= $edit_pasien["jam"];?></h6></label>
                          </div>
                          </div>

                          <div class="form-group row">
                            <label for="jenis_pembayaran" class="col-sm-2"><h6>Pembayaran</h6></label>
                          <div class="col-sm-4">
                            <label for="jenis_pembayaran"><h6>: <?= $edit_pasien["jenis_pembayaran"];?></h6></label>
                          </div>
                          </div>

                          <div class="form-group">
                            <br>
                          <button type="submit" name="post" class="btn btn-info">Post</button>
                          <button type="submit" name="batal" class="btn btn-info"><a href="data_pemohon.php" class="text-reset" style="text-decoration:none">Batal</a></button>
                          </div>
                          </div>
                          </div>
                        </form>
                      </div>
                </div>
          </div>
        </div>
      </div>
</body>

</html>
