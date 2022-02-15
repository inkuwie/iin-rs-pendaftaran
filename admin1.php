<?php
session_start();

 ?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADMIN</title>
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


<!-- SIDEBAR--->
<br>
<div class="pt-4 pl-3">
  <div class="row">
    <div class="col-2 bg-dark ml-2">
  <ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link active" href="#" class="text-reset">Data Pasien</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="tabel_loker.php" class="text-reset">Loker</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="input-loker.php" class="text-reset">Input Loker</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#" class="text-reset">Dokter</a>
   </li>
</ul>
  </div>

  <div class="col-8 mt-2">
    <div class="text-center">
      <h5>DATA PASIEN</h5>
    </div><br>


      <!-- TABEL-->
      <div class="">
        <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col"width="40">#</th>
            <th scope="col"width="250">First</th>
            <th scope="col"width="150">Last</th>
            <th scope="col"width="150">Handle</th>
            <th scope="col">pilih</th>
            <th scope="col"width="190">Option</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td></td>
            <td> <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-secondary">
                    <input type="radio" name="options" id="option1" autocomplete="off"> Add
                  </label>
                  <label class="btn btn-secondary active">
                    <input type="radio" name="options" id="option2" autocomplete="off"> Edit
                  </label>
                  <label class="btn btn-secondary">
                    <input type="radio" name="options" id="option3" autocomplete="off"> Delete
                  </label>
                  <label class="btn btn-secondary active">
                    <input type="radio" name="options" id="option3" autocomplete="off"> print
                  </label>
                </div>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
      </div>


  </div>

</div>

</div>













</body>

</html>
