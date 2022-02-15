<?php
require 'functions.php';
//ambil data di url
$id_dokter = $_GET["id_dokter"];

 //query data mahasiswa berdasarkan
$jadwal_dokter = query("SELECT * FROM dokter where id_dokter = $id_dokter")[0];

//cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["post"]) ) {


//cek apakah data berhasil diubah atau tidak
  if(ubah_dokter($_POST) > 0 ) {
    echo "<script>
              alert('data berhasil diubah!');
              document.location.href = 'jadwal_dokter.php';
          </script>";
  } else {
    echo  "
        <script>
        alert('data gagal diubah!');
        document.location.href = 'edit_dokter.php';
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

  <title>Rubah nama poli</title>

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
                    <a class="nav-link" href="#">Halaman Admin<span class="sr-only">(current)</span></a>
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
              <td width="450" rowspan="2"><h5 class="">Rubah Jadwal Dokter Rawat Jalan</h5></td>
            </tr>
        </table>
      </div>

        </div>

        <div class="row">
                <div class="col md">
                  <form class="" action="" method="post">
                    <input type="hidden" name="id_dokter" value="<?= $jadwal_dokter["id_dokter"];?>" >

                    <div class="form-group">
                    <label for="dokter" class="col-sm-2">Nama Dokter</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" value="<?= $jadwal_dokter["nama_dokter"];?>" required>
                    </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2">Poli</label>
                      <div class="col-sm-5">
                      <select class="form-control" name="id_poli" id="id_poli">
                          <option value="">Pilih</option>
                          <option value="1" <?php if($jadwal_dokter['id_poli'] == 1){echo 'selected';}?>>Umum</option>
                          <option value="2" <?php if($jadwal_dokter['id_poli'] == 2){echo 'selected';}?>>Anak</option>
                          <option value="3" <?php if($jadwal_dokter['id_poli'] == 3){echo 'selected';}?>>Gigi</option>
                      </select>
                    </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2">Jam Praktek</label>
                      <div class="col-sm-5">
                      <select class="form-control" name="id_jam" id="id_jam">
                          <option value="">Pilih</option>
                          <option value="1" <?php if($jadwal_dokter['id_jam'] == 1){echo 'selected';}?>>10:00 - 14:00</option>
                          <option value="2" <?php if($jadwal_dokter['id_jam'] == 2){echo 'selected';}?>>14:00 - 17:00</option>
                      </select>
                    </div>
                  </div>

                    <input type="hidden" name="status" value="<?= jadwal_dokter["status"];?>" >

                    <div class="form-group text-left">
                    <button type="submit" name="post" class="btn btn-primary">Post</button>
                    <button type="submit" name="batal" class="btn btn-primary"><a href="jadwal_dokter.php" style="text-decoration:none" class="text-reset">Batal</a></button>
                    </div>
                  </form>
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
