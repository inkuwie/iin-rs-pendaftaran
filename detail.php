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
$validasi_pasien = query("SELECT pasien.kode_pendaftaran,pasien.tgl_daftar,pasien.nama,poliklinik.nama_poli,dokter.nama_dokter,jam.jam,pasien.jenis_pembayaran,pasien.status from pasien join poliklinik on pasien.id_poli=poliklinik.id_poli join dokter on pasien.id_dokter=dokter.id_dokter join jam on pasien.id_jam=jam.id_jam where kode_pendaftaran=$kode_pendaftaran")[0];

//cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["post"]) ) {

//cek apakah data berhasil diubah atau tidak
  if(validasi_pasien($_POST) > 0 ) {
    echo "<script>
              alert('Validasi Selesai!');
              document.location.href = 'data_pendaftar.php';
          </script>";
  } else {
    echo  "
        <script>
        alert('Validasi Gagal!');
        document.location.href = 'validasi_pasien.php';
        </script>
    ";
  }
}

 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PANDUAN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Menyisipkan Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- jQuery dulu, kemudian Popper.js, kemudian Bootstrap.js -->
      <script src="js/jquery-3.3.1.min.js"></script>
      <!-- bootstrap.bundle.min.js sudah include Popper.js -->
      <script src="js/bootstrap.bundle.min.js" ></script>

</head>

<body background="img/backgroundps.jpg" class="mt-3">

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
            <a class="nav-link" href="index.php">Pendaftaran Online<span class="sr-only">(current)</span></a>
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


    <!-- Membuat komponen Panduan -->
          <div class="">
                  <div class="container">
                <div class="row">
                  <div class="col text-center">
                    <h5>Data Pasien</h5>
                  </div>
                </div>
<br>

  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col md">
          <form class="" action="" method="post">
            <div class="form-group row">
              <label for="kode_pendaftaran" class="col-sm-2"><h6>Kode Pendaftaran</h6></label>
            <div class="col-sm-5">
              <label for="kode_pendaftaran" name="kode_pendaftaran"><h6>: <?= $validasi_pasien["kode_pendaftaran"];?></h6></label>
            </div>
            </div>

            <div class="form-group row">
              <label for="tgl_daftar" class="col-sm-2"><h6>Tgl Daftar</h6></label>
            <div class="col-sm-5">
              <label for="tgl_daftar"><h6>: <?= $validasi_pasien["tgl_daftar"];?></h6></label>
            </div>
            </div>

            <div class="form-group row">
              <label for="nama" class="col-sm-2"><h6>Nama Pasien</h6></label>
            <div class="col-sm-5">
              <label for="nama"><h6>: <?= $validasi_pasien["nama"];?></h6></label>
            </div>
            </div>

            <div class="form-group row">
              <label for="nama_poli" class="col-sm-2"><h6>Poli</h6></label>
            <div class="col-sm-5">
              <label for="nama_poli"><h6>: <?= $validasi_pasien["nama_poli"];?></h6></label>
            </div>
            </div>

            <div class="form-group row">
              <label for="nama_dokter" class="col-sm-2"><h6>Dokter</h6></label>
            <div class="col-sm-5">
              <label for="nama_dokter"><h6>: <?= $validasi_pasien["nama_dokter"];?></h6></label>
            </div>
            </div>

            <div class="form-group row">
              <label for="jam" class="col-sm-2"><h6>Jam Berobat</h6></label>
            <div class="col-sm-5">
              <label for="jam"><h6>: <?= $validasi_pasien["jam"];?></h6></label>
            </div>
            </div>

            <div class="form-group row">
              <label for="jenis_pembayaran" class="col-sm-2"><h6>Pembayaran</h6></label>
            <div class="col-sm-5">
              <label for="jenis_pembayaran"><h6>: <?= $validasi_pasien["jenis_pembayaran"];?></h6></label>
            </div>
            </div>

            <div class="form-group row">
              <label for="jenis_pembayaran" class="col-sm-2"><h6>Pembayaran</h6></label>
            <div class="col-sm-5">
              <label for="jenis_pembayaran"><h6>: <?= $validasi_pasien["jenis_pembayaran"];?></h6></label>
            </div>
            </div>

            <div class="form-group">
              <br>
            <button type="submit" name="post" class="btn btn-info">Post</button>
            <button type="submit" name="batal" class="btn btn-info"><a href="data_pemohon.php" class="text-reset" style="text-decoration:none">Batal</a></button>
            </div>
            </div>
                </div>
            </div>
          </form>
        </div>
          </div>
      </div>
        </div>




</body>

</html>
