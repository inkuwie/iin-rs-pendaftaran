<?php
session_start();

if (isset($_SESSION["login"])){
  header("location: daftar.php");
  exit;
}


require 'functions.php';


if(isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($db, "SELECT * FROM user WHERE username = '$username'");
    $userlogin =mysqli_query($db, "SELECT * FROM user WHERE id_user = '$id_user'");
    $_SESSION['id_user'] = $id_user;


//cek Username
 if(mysqli_num_rows($result) === 1) {

   //cek password
   $row = mysqli_fetch_assoc($result);
  if ( password_verify($password, $row["password"])) {

if($row['level']=="admin"){

  $_SESSION['username'] = $username;
  $_SESSION['level'] = "admin";
  //alihkan he halaman dashboard Admin
  header("location:admin.php");
}elseif ($row['level']=="pasien") {
  // buat session loGin dan Username
  $_SESSION["login"] = true;
  $_SESSION['username'] = $username;
  $_SESSION['level'] = "pasien";
  //alihkan ke halaman dashboard IntlCodePointBreakIterator
  header("location:daftar.php");
    exit;
  }
 }
}
}


 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ASIH</title>
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
  <a class="navbar-brand" href="index.php">RUMAH SAKIT ASIH</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="caradaftar.php">Cara Mendaftar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="jadwal_posting.php">Jadwal Dokter</a>
      </li>
    </ul>
  </div>
</div>
</nav>






    <!-- Membuat komponen jubotron sebagai header -->

        <div class="pt-4">
          <br>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h3>Pendaftaran Poliklinik pada Pasien Rawat Jalan</h3>
                        <div class="lead">Rumah sakit asih Serang</div>
                        <div>Jl Ahmadyani No 30 Serang 42118
                        Banten, Indonesia
                        Tlp (0254) 212808</div>
                        <br>

                  <div class="row">
                    <div class="col text-center">
                      <h5 class="text-monospace badge badge-dark text-wrap"> Untuk mendaftar silahkan login terlebih dahulu</h5>
                    </div>
                  </div>
            <br>
                  <div class="row justify-content-center">
                  <div class="col-lg-4">
                      <form class="" action="" method="post">
                        <div class="form-group">
                        <input type="hidden" class="form-control" id="id_user" name="id_user" value="">
                        <label for="nama">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="" placeholder="Username" autocomplete="off">
                        </div>

                        <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password">
                        </div>

                        <div class="form-group text-right">
                        <button type="submit" name="login" class="btn btn-info">Login</button>
                        <br>
                        <br>
                        <h4>Belum punya akun? </h4>
                        <h5>Silahkan Daftar <a href="registrasi.php">DISINI</a></h5>
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
            </div>
        </div>




</body>

</html>
