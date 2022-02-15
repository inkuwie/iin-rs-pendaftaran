<?php
require 'functions.php';

//cek apakah tombol submit sudah di tekan
if(isset($_POST["post"]) ) {

  if(tambah_dokter($_POST) > 0 ) {
    echo "<script>
              alert('Dokter baru telah ditambahkan.. silahkan sekarang isi Jam Praktek!');
              document.location.href = 'tambah_jam.php';
          </script>";
  } else {
    echo "<script>
              alert('Dokter baru gagal ditambahkan!');
              document.location.href = 'tambah_dokter.php';
          </script>";
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

  <title>Tambah Dokter</title>

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
              <td width="450" rowspan="2"><h5 class="">Tambah Dokter Rawat Jalan</h5></td>
            </tr>
            <form  action="" method="post">
            <tr>
              <td></td>
            </tr>
          </form>
        </table>
      </div>

        </div>

        <div class="row">
                <div class="col md">
                  <form class="" action="" method="post">
                    <div class="form-group">
                      <div class="col-sm-4">
                    <input type="hidden" class="form-control" id="id_dokter" name="id_dokter" value="">
                    <label for="nama">Nama Dokter</label>
                    <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" value="" autocomplete="off">
                    </div>
                  </div>

                    <div class="form-group">
                      <div class="col-sm-4">
                      <label for="">Poli</label>
                      <?php
                        $query = $db->query("SELECT * FROM poliklinik WHERE status = 1 ORDER BY nama_poli ASC");

                        //count total of rows
                        $rowCount = $query->num_rows;
                       ?>
                      <select class="form-control" name="poli_tujuan" id="poli_tujuan">
                        <option value="">Pilih</option>
                        <?php
                        if($rowCount > 0){
                          while ($row = $query->fetch_assoc()) {
                            echo '<option value="'.$row['id_poli'].'">'.$row['nama_poli'].'</option>';
                          }
                        }else {
                          echo'<option value="">poli not available</option>';
                        }
                         ?>
                      </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-4">
                      <button type="submit" name="post" class="btn btn-primary mt-2">Post</button>
                      <button type="submit" name="batal" class="btn btn-primary mt-2"><a href="jadwal_dokter.php" class="text-reset" style="text-decoration:none">Batal</a></button>
                      </div>
                  </div>
                    </div>
                    </div>
                  </form>


                </div>
              </div>

      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

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
