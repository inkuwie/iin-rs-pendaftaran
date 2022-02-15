<?php
require 'functions.php';
//ambil data di url
$kode_pendaftaran = $_GET["kode_pendaftaran"];

 //query data mahasiswa berdasarkan
$validasi_pasien = query("SELECT pasien.kode_pendaftaran,pasien.tgl_daftar,pasien.nama,poliklinik.nama_poli,dokter.nama_dokter,jam.jam,pasien.jenis_pembayaran,pasien.status from pasien join poliklinik on pasien.id_poli=poliklinik.id_poli join dokter on pasien.id_dokter=dokter.id_dokter join jam on pasien.id_jam=jam.id_jam where kode_pendaftaran = $kode_pendaftaran")[0];

//cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["post"]) ) {

//cek apakah data berhasil diubah atau tidak
  if(validasi($_POST) > 0 ) {
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
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Validasi Pasien</title>

  <!-- Bootstrap core CSS -->
  <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="admin/css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><img src="img/ba.jpg"></div>
      <div class="list-group list-group-flush">
        <a href="admin.php" class="list-group-item list-group-item-action bg-light">Beranda</a>
        <a href="data_pendaftar.php" class="list-group-item list-group-item-action bg-light">Data Pendaftar</a>
        <a href="daftar_poliklinik.php" class="list-group-item list-group-item-action bg-light">Daftar Poliklinik</a>
        <a href="jadwal_dokter.php" class="list-group-item list-group-item-action bg-light">Jadwal Dokter</a>
<!--        <a href="admin_caradaftar.php" class="list-group-item list-group-item-action bg-light">Cara Mendaftar</a>-->
        <a href="laporan.php" class="list-group-item list-group-item-action bg-light">Laporan</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
        <button class="btn btn-info" id="menu-toggle">Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="">Halaman Admin<span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="logout.php">Logout</a>
                </li>
                </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <div class="row">
        <div class="col mt-1">
          <table class="table table-sm table-borderless">
            <tr>
              <td width="450" rowspan="2"><h5 class="">Validasi Pasien</h5></td>
            </tr>
        </table>
      </div>

        </div>

        <div class="row">
                <div class="col md">
                  <form class="" action="" method="post">
                    <div class="form-group row">
                      <label for="kode_pendaftaran" class="col-sm-2"><h6>Kode Pendaftaran</h6></label>
                    <div class="col-sm-5">
                      <label for="kode_pendaftaran" name="kode_pendaftaran"><h6>: <?= $validasi_pasien["kode_pendaftaran"];?></h6></label>
                      <input type="hidden" name="kode_pendaftaran" value="<?= $validasi_pasien["kode_pendaftaran"];?>" >
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
                      <label for="status" class="col-sm-2"><h6>Status</h6></label>
                    <div class="col-sm-5">
                      <select class="form-control" name="status">
                        <option value="Proses" <?php if($validasi_pasien["status"] == 'Proses'){echo 'selected';}?>>Proses</option>
                        <option value="Terdaftar" <?php if($validasi_pasien["status"] == 'Terdaftar'){echo 'selected';}?>>Terdaftar</option>
                      </select>
                    </div>
                    </div>
                    <div class="form-group">
                      <br>
                    <button type="submit" name="post" class="btn btn-info">Post</button>
                    <button type="submit" name="batal" class="btn btn-info"><a href="data_pendaftar.php" class="text-reset" style="text-decoration:none">Batal</a></button>
                    </div>
                    </div>
                    </div>
                  </form>
                </div>
              </div>

      </div>
    </div>

  <!-- Bootstrap core JavaScript -->
  <script src="admin/vendor/jquery/jquery.min.js"></script>
  <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
