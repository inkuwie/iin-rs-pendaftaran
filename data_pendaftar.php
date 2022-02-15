<?php

require 'functions.php';
$hari = array ( 1 =>    'Senin',
                        'Selasa',
                        'Rabu',
                        'Kamis',
                        'Jumat',
                        'Sabtu',
                        'Minggu'
                      );

$tgl = date('d-m-Y');
$data_pendaftar = query("SELECT pasien.kode_pendaftaran,pasien.tgl_daftar,pasien.nama,poliklinik.nama_poli,dokter.nama_dokter,jam.jam from pasien join poliklinik on pasien.id_poli=poliklinik.id_poli join dokter on pasien.id_dokter=dokter.id_dokter join jam on pasien.id_jam=jam.id_jam order by kode_pendaftaran desc limit 10");

//tombol cari ditekan
if (isset($_POST["cari"]) ) {
  $data_pendaftar = cari_kode($_POST["kode"]);
}

 ?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Halaman Admin</title>

  <!-- Bootstrap core CSS -->
  <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="admin/css/simple-sidebar.css" rel="stylesheet">

</head>

<body>
  <div id="">
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
              <td width="450" rowspan="2"><h5 class="">Data Pendaftar Poli Rawat Jalan</h5></td>
            </tr>
            <form  action="" method="post">
            <tr>
              <td></td>
              <td>
                <label for="tgl" name="tgl" id="tgl"><h5><?php echo $hari[ date('N') ]; echo ", "; echo $tgl; ?></h5></label>
              </td>
              <td><h5>Kode Pendaftar</h5></td>
              <td>
                <input class="form-control" type="text" name="kode" value="" placeholder="Masukan kode Pendaftar...." autocomplete="off" id="kode">
              </td>
              <td hidden><button type="submit" name="cari" class="btn btn-info" id="tombol-cari">Cari</button>
              </td>
            </tr>
          </form>
        </table>
      </div>

        </div>

        <div class="row">
                <div class="col md">
                  <div id="container">
                    <table class="table table-sm table-bordered">
                      <thead>
                      <tr class="table-info">
                        <th class="text-center" scope="col"width="20">No</th>
                        <th class="text-center" width="92">Kode Pendaftar</th>
                        <th class="text-center" width="70">Tgl Daftar</th>
                        <th width="115" class=""><center>Nama Pasien</center></th>
                        <th width="35" class="text-center">Poli</th>
                        <th width="135" class="text-center">Dokter</th>
                        <th width="70" class="text-center">Jam Berobat</th>
                        <th width="120" class="text-center">Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1; ?>
                        <?php  foreach ($data_pendaftar as $row ) : ?>

                             <tr>
                               <td><center><?= $i; ?></center></td>
                               <td><center><?= $row["kode_pendaftaran"]; ?></center></td>
                               <td><center><?=date('d-m-Y', strtotime( $row["tgl_daftar"])); ?></center></td>
                               <td><?= $row["nama"]; ?></td>
                               <td><?= $row["nama_poli"]; ?></td>
                               <td><?= $row["nama_dokter"]; ?></td>
                               <td><center><?= $row["jam"]; ?></center></td>

                               <td><button type="button" class="btn btn-outline-info btn-sm mt-1"><a href="cetak.php?kode_pendaftaran=<?= $row["kode_pendaftaran"]?>" target="_blank" class="text-reset" style="text-decoration:none">CETAK</a></button>
                                 <button type="button" class="btn btn-outline-info btn-sm mt-1"><a href="hapus_pasien.php?kode_pendaftaran=<?= $row["kode_pendaftaran"]?>" class="text-reset" style="text-decoration:none">HAPUS</a></button>
                                 <button type="button" class="btn btn-outline-info btn-sm mt-1"><a href="validasi_pasien.php?kode_pendaftaran=<?= $row["kode_pendaftaran"]?>" class="text-reset" style="text-decoration:none">VALIDASI</a></button>
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
    </div>
    </div>
  <!-- Bootstrap core JavaScript -->
  <script src="admin/vendor/jquery/jquery.min.js"></script>
  <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--  <script src="js/pendaftar.js"></script> -->
  <script src="js/pencarian.js"></script>


  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
