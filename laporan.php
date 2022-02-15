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
$data_pendaftar = query("SELECT pasien.kode_pendaftaran,pasien.tgl_daftar,pasien.nama,poliklinik.nama_poli,dokter.nama_dokter,jam.jam,pasien.status from pasien join poliklinik on pasien.id_poli=poliklinik.id_poli join dokter on pasien.id_dokter=dokter.id_dokter join jam on pasien.id_jam=jam.id_jam ORDER BY tgl_daftar DESC");

//tombol cari ditekan
if (isset($_POST["cari"]) ) {
  $data_pendaftar = cari_data($_POST["tgl_awal"],$_POST["tgl_akhir"]);
}

//tombol cari ditekan
if (isset($_POST["cetak"]) ) {
  $data_pendaftar = tampil($_POST["tgl_awal"],$_POST["tgl_akhir"]);
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

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><img src="img/ba.jpg"></div>
      <div class="list-group list-group-flush">
        <a href="admin.php" class="list-group-item list-group-item-action bg-light">Beranda</a>
        <a href="data_pendaftar.php" class="list-group-item list-group-item-action bg-light">Data Pendaftar</a>
        <a href="daftar_poliklinik.php" class="list-group-item list-group-item-action bg-light">Daftar Poliklinik</a>
        <a href="jadwal_dokter.php" class="list-group-item list-group-item-action bg-light">Jadwal Dokter</a>
  <!--      <a href="admin_caradaftar.php" class="list-group-item list-group-item-action bg-light">Cara Mendaftar</a>-->
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
              <td width="400" colspan="5"><h5 class="">Laporan Data Pendaftar Poli Rawat Jalan</h5></td>
            </tr>
            <tr>
              <form  action="" method="post">
              <td width="350">
                <label for="tgl" name="tgl" id="tgl"><h6><?php echo $hari[ date('N') ]; echo ", "; echo $tgl; ?></h6></label>
              </td>
              <td><h6>Tanggal</h6></td>
              <td>
                <input class="form-control" type="date" name="tgl_awal" value="">
              </td>
              <td><h6>Sampai</h6></td>
              <td>
                <input class="form-control" type="date" name="tgl_akhir" value="">
              </td>
              <td><button type="submit" name="cari" class="btn btn-info" id="tombol-cari">CARI</button>
              </td>
              <td><button type="submit" name="cetak" class="btn btn-outline-info" id="tampil"><a href="cetak_laporan.php" target="_blank" class="text-reset" style="text-decoration:none">CETAK</a></button></td>
            </tr>
          </form>
        </table>
      </div>

        </div>

        <div class="row">
                <div class="col md">
                    <table class="table table-sm table-bordered">
                      <thead>
                      <tr class="table-info">
                        <th class="text-center" scope="col"width="30">No</th>
                        <th class="text-center" width="100">Kode Pendaftaran</th>
                        <th class="text-center" width="80">Tgl Daftar</th>
                        <th width="140" class=""><center>Nama Pasien</center></th>
                        <th width="40" class="text-center">Poli</th>
                        <th width="160" class="text-center">Dokter</th>
                        <th width="95" class="text-center">Jam Berobat</th>
                        <th width="40" class="text-center">Status</th>
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
                               <td><?= $row["status"]; ?></td>
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
