<?php
session_start();

 ?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PASIEN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Menyisipkan Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Menyisipkan JQuery dan Javascript Bootstrap -->
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
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Pendaftaran Online<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="caradaftar.php">Cara Mendaftar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="jadwal.php">Jadwal Dokter</a>
          </li>
      <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
    </ul>
  </div>
</div>
</nav>



    <!-- Membuat Form -->

        <div class="pt">
            <div class="container">
                <div class="row mt-5">
                  <div class="col text-center">
                    <br>
                    <br>
                    <h5>Pasien</h5>
                  </div>
                </div>
<br>
            <div class="row">
              <div class="col-3">
                  <div class="card" style="width: 15rem;">
                  <img src="img/jago.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h6 class="card-title">Selamat datang</h6>
                    <p class="card-text">Sebelum melamar silahkan lengkapi data diri anda terlebih dahulu dibawah ini.</p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Profil</li>
                    <li class="list-group-item">Riwayat Pendidikan</li>
                    <li class="list-group-item">Pengalaman Kerja </li>
                  </ul>
                  <div class="card-body">
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                  </div>
                  </div>
              </div>

              <div class="col-9">
                <div class="card">
                    <div class="card-body">
                      This is some text within a card body.
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
