<?php
require 'functions.php';

//ambil data di url
$id = $_GET["id"];

 //query data mahasiswa berdasarkan
$jadwal = query("SELECT * FROM jadwal where id = $id")[0];

//cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["post"]) ) {


//cek apakah data berhasil diubah atau tidak
  if(ubah($_POST) > 0 ) {
    echo "<script>
              alert('data berhasil diubah!');
              document.location.href = 'jadwal.php';
          </script>";
  } else {
    echo  "
        <script>
        alert('data gagal diubah!');
        document.location.href = 'edit_jadwal.php';
        </script>
    ";
  }
}
 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tambah jadwal</title>
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
  <!--        <li class="nav-item">
            <a class="nav-link" href="daftar.php">Pendaftaran Online<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="caradaftar.php">Cara Mendaftar</a>
          </li>-->
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
                    <h5>Tambah Jadwal Dokter</h5>
                  </div>
                </div>
<br>
                <div class="row justify-content-center">
                <div class="col-lg-7">
                    <form class="" action="" method="post">
                      <input type="hidden" name="id" value="<?= $jadwal["id"];?>" >

                      <div class="form-group row">
                      <label for="dokter" class="col-sm-2">Dokter</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" id="dokter" name="dokter" value="<?= $jadwal["dokter"];?>" required>
                      </div>
                      </div>

                      <div class="form-group row">
                      <label for="poli" class="col-sm-2">Poli</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" id="poli" name="poli" value="<?= $jadwal["poli"];?>" required>
                      </div>
                      </div>

                      <div class="form-group row">
                      <label for="senin" class="col-sm-2">Senin</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" id="senin" name="senin" value="<?= $jadwal["senin"];?>">
                      </div>
                      </div>

                      <div class="form-group row">
                      <label for="selasa" class="col-sm-2">Selasa</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" id="selasa" name="selasa" value="<?= $jadwal["selasa"];?>">
                      </div>
                      </div>

                      <div class="form-group row">
                      <label for="rabu" class="col-sm-2">Rabu</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" id="rabu" name="rabu" value="<?= $jadwal["rabu"];?>">
                      </div>
                     </div>

                      <div class="form-group row">
                      <label for="kamis" class="col-sm-2">Kamis</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" id="kamis" name="kamis" value="<?= $jadwal["kamis"];?>">
                      </div>
                     </div>

                      <div class="form-group row">
                      <label for="jumat" class="col-sm-2">Jumat</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" id="jumat" name="jumat" value="<?= $jadwal["jumat"];?>">
                      </div>
                      </div>

                      <div class="form-group row">
                      <label for="sabtu" class="col-sm-2">Sabtu</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" id="sabtu" name="sabtu" value="<?= $jadwal["sabtu"];?>">
                      </div>
                      </div>

                      <div class="form-group text-left">
                      <button type="submit" name="post" class="btn btn-primary">Post</button>
                      <button type="submit" name="batal" class="btn btn-primary"><a href="jadwal.php" class="text-reset">Batal</a></button>
                      </div>
                    </form>
                  </div>
            </div>
          </div>
      </div>



</body>

</html>
