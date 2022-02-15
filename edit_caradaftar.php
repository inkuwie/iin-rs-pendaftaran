<?php
require 'functions.php';
//ambil data di url
$id_cara = $_GET["id_cara"];

 //query data mahasiswa berdasarkan
$cara_daftar = query("SELECT * FROM caradaftar WHERE id_cara = $id_cara")[0];

//cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["post"]) ) {


//cek apakah data berhasil diubah atau tidak
  if(ubah_caradaftar($_POST) > 0 ) {
    echo "<script>
              alert('data berhasil diubah!');
              document.location.href = 'admin_caradaftar.php';
          </script>";
  } else {
    echo  "
        <script>
        alert('data gagal diubah!');
        document.location.href = 'edit_caradaftar.php';
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

  <title>Rubah Cara Mendaftar</title>

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
<!--    <a href="admin_caradaftar.php" class="list-group-item list-group-item-action bg-light">Cara Mendaftar</a>-->
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
              <td width="450" rowspan="2"><h5 class="">Rubah Cara Mendaftar</h5></td>
            </tr>
        </table>
      </div>

        </div>

        <div class="row">
                <div class="col md">
                  <form class="" action="" method="post">
                    <input type="hidden" name="id_cara" value="<?= $cara_daftar["id_cara"];?>" >

                    <div class="form-group row">
                    <label for="" class="col-sm-2">Step 1</label>
                    <div class="col-sm-6">
                    <textarea class="form-control" id="step1" name="step1" rows="3" cols="80"><?= $cara_daftar["step1"];?></textarea>
                    </div>
                    </div>

                    <div class="form-group row">
                    <label for="" class="col-sm-2">Step 2</label>
                    <div class="col-sm-6">
                      <textarea class="form-control" id="step2" name="step2" rows="3" cols="80"><?= $cara_daftar["step2"];?></textarea>
                    </div>
                    </div>

                    <div class="form-group row">
                    <label for="" class="col-sm-2">Step 3</label>
                    <div class="col-sm-6">
                      <textarea class="form-control" id="step3" name="step3" rows="3" cols="80"><?= $cara_daftar["step3"];?></textarea>
                      <br>
                      <button type="submit" name="post" class="btn btn-primary">Post</button>
                      <button type="submit" name="batal" class="btn btn-primary"><a href="admin_caradaftar.php" style="text-decoration:none" class="text-reset">Batal</a></button>

                    </div>
                    </div>


                    <div class="form-group text-center">
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
