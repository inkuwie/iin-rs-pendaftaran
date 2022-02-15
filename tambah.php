<?php
require 'functions.php';

//cek apakah tombol submit sudah di tekan
if(isset($_POST["post"]) ) {

  if(tambah_poli($_POST) > 0 ) {
    echo "<script>
              alert('jadwal baru telah ditambahkan!');
              document.location.href = 'daftar_poliklinik.php';
          </script>";
  } else {
    echo "<script>
              alert('Posisi baru gagal ditambahkan ditambahkan!');
              document.location.href = 'tambah_poli.php';
          </script>";
  }
}
 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tambah Poli</title>
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
          <li class="nav-item">
            <a class="nav-link" href="daftar.php">Pendaftaran Online<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="caradaftar.php">Cara Mendaftar</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="jadwal.php">Jadwal Dokter</a>
      </li>
    </ul>
  </div>
</div>
</nav>


    <!-- Membuat komponen form -->
        <div class="">
            <div class="container">
                <div class="row mt-2">
                  <div class="col text-center">
                    <br>
                    <br>
                    <h5>Tambah Poli</h5>
                  </div>
                </div>
<br>
                <div class="row justify-content-center">
                <div class="col-lg-7">
                    <form class="" action="" method="post">
                      <input type="hidden" name="id_poli" >

                      <div class="form-group row">
                      <label for="dokter" class="col-sm-2">Nama Poli</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" id="nama_poli" name="nama_poli" required>
                      </div>
                      </div>

                      <input type="hidden" name="status" >

                      <div class="form-group text-left">
                      <button type="submit" name="post" class="btn btn-primary">Post</button>
                      <button type="submit" name="batal" class="btn btn-primary"><a href="daftar_poliklinik.php" class="text-reset" style="text-decoration:none">Batal</a></button>
                      </div>
                    </form>
                  </div>
            </div>
          </div>
      </div>


</body>

</html>
