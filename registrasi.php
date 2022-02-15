<?php
require 'functions.php';

if(isset($_POST["registrasi"]) ) {

  if(registrasi($_POST) > 0 ) {
    echo "<script>
              alert('user baru telah ditambahkan!');
              document.location.href = 'index.php';
          </script>";
  } else {
    echo mysqli_error($db);
  }
}

 ?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registrasi</title>
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
      <a class="navbar-brand" href="index.php">RUMAH SAKIT ASIH</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="daftar.php">Pendaftaran Online<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="caradaftar.php">Cara Mendaftar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="jadwal.php">Jadwal Dokter</a>
          </li>
    </ul>
  </div>
</div>
</nav>


    <!-- Membuat komponen contact -->

        <div class="">
            <div class="container">
                <div class="row mt-5">
                  <div class="col text-center">
                    <br>
                    <br>
                    <h3>Registrasi</h3>
                  </div>
                </div>
<br>
                <div class="row justify-content-center mt-4">
                <div class="col-lg-5">
                    <form class="" action="" method="post">
                      <div class="form-group">
                      <label for="nama">Username</label>
                      <input type="text" class="form-control" id="username" name="username" value="" placeholder="Username" autocomplete="off">
                      </div>

                      <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password" autocomplete="off">
                      </div>

                      <div class="form-group">
                      <label for="email">Nama lenkap</label>
                      <input type="text" class="form-control" id="nama_lenkap" name="nama_lenkap" value="" placeholder="Nama lengkap" autocomplete="off">
                      </div>

                      <div class="form-group text-right">
                      <button type="submit" name="registrasi" class="btn btn-primary">Registrasi</button>
                      <br>
                      <br>
                      <h5>Jika sudah memiliki akun silahkan <a href="index.php">Masuk</a></h5>
                      <br>
                      <br>
                      <br>
                      <br>
                      </div>
                    </form>
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
