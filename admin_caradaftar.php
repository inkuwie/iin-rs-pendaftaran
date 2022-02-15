<?php
require 'functions.php';

$caradaftar = query("SELECT id_cara,step1,step2,step3 FROM caradaftar");


session_start();

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
        <a href="admin_caradaftar.php" class="list-group-item list-group-item-action bg-light">Cara Mendaftar</a>
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
              <td width="800" rowspan="2"><h5 class="">Cara Mendaftar</h5>
              </td>
            </tr>
        </table>
      </div>
        </div>

        <div class="row">
                <div class="col md">
                  <div class="accordion" id="accordionExample">
                  <div class="card">
                  <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" style="text-decoration:none" aria-controls="collapseOne">
                  Cara Mendaftar Step 1
                  </button>
                  </h2>
                  </div>
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">
                    <?php  foreach ($caradaftar as $row ) : ?>
                           <td><?= $row["step1"]; ?></td>
                           <td><button type="button" class="btn btn-outline-info btn-sm mt-1"><a href="edit_caradaftar.php?id_cara=<?= $row["id_cara"]?>" class="text-reset" style="text-decoration:none">Rubah</a> </button>
</td>
                         <?php endforeach; ?>

                  </div>
                  </div>
                  </div>
                  <div class="card">
                  <div class="card-header" id="headingTwo">
                  <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" style="text-decoration:none" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Cara Mendaftar Step 2
                  </button>
                  </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                  <div class="card-body">
                  <input type="hidden" name="id_cara" value="<?=$caradaftar["id_cara"];?>" >

                    <?php  foreach ($caradaftar as $row ) : ?>
                           <td><?= $row["step2"]; ?></td>
                           <td><button type="button" class="btn btn-outline-info btn-sm mt-1"><a href="edit_caradaftar.php?id_cara=<?= $row["id_cara"]?>" class="text-reset" style="text-decoration:none">Rubah</a> </button>
</td>
                         <?php endforeach; ?>
                  </div>
                  </div>
                  </div>
                  <div class="card">
                  <div class="card-header" id="headingThree">
                  <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" style="text-decoration:none" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Cara Mendaftar Step 3
                  </button>
                  </h2>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                  <div class="card-body">
                    <?php  foreach ($caradaftar as $row ) : ?>
                           <td><?= $row["step3"]; ?></td>
                           <td><button type="button" class="btn btn-outline-info btn-sm mt-1"><a href="edit_caradaftar.php?id_cara=<?= $row["id_cara"]?>" class="text-reset" style="text-decoration:none">Rubah</a> </button>
</td>
                         <?php endforeach; ?>
                  </div>
                  </div>
                  </div>
                  </div>

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
