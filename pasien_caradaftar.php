<?php
session_start();


if (!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
}

require 'functions.php';

$caradaftar = query("SELECT id_cara,step1,step2,step3 FROM caradaftar");

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
  <a class="navbar-brand" href="">RUMAH SAKIT BUDIASIH</a>
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


    <!-- Membuat komponen Panduan -->
          <div class="">
                  <div class="container">
                <div class="row">
                  <div class="col text-center">
                    <h1>Panduan</h1>
                  </div>
                </div>
<br>
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
                 <?php endforeach; ?>
          </div>
          </div>
          </div>
          </div>

        </div>
      </div>
        </div>


<!-- ini buat footer
    <footer class="bg-dark text-white">
    <div class="container">
      <div class="row pt-3">
        <div class="col text-center">
          <p>Copyright 2019.</p>
        </div>
      </div>
    </div>
  </footer>-->


</body>

</html>
