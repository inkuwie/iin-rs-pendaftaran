<?php
require 'functions.php';

//ambil data dari table Loker
$jadwal = query("SELECT * FROM jadwal ORDER BY poli ASC");
session_start();

//tombol cari ditekan
if (isset($_POST["cari"]) ) {
  $jadwal = cari($_POST["keyword"]);
}

 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Jadwal</title>
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
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <button class="btn btn-info" id="menu-toggle"><a href="jadwal_dokter.php" style="text-decoration:none" class="text-reset">KEMBALI</a></button>
      </li>
    </ul>
  </div>
</div>
</nav>


    <!-- Membuat komponen jadwal -->

        <div class="pt-5">
            <div class="container">

              <div class="row">
                <div class="col md">
                  <div class="">
                    <table class="table table-sm table-borderless">
                      <form  action="" method="post">
                      <tr>
                        <td width="40">Dokter</td>

                        <td width="380">
                          <input class="form-control" type="text" name="keyword" value="" placeholder="masukan keyword pencarian.." autocomplete="off">
                        </td>

                        <td><button type="submit" name="cari" class="btn btn-info" id="tombol-cari">Cari</button>
                          <button type="button" class="btn btn-outline-info"><a href="tambah_jadwal.php" class="text-reset">Tambah</a></button>
                        </td>
                      </tr>
                    </form>
                  </table>
                  </div>
                </div>
                </div>

        <div class="row">
                <div class="col md">
                  <div class="card" style="width: 72rem;">
                  <div class="card-body">

                    <table class="table table-sm table-bordered">
                      <thead>
                      <tr>
                        <th scope="col"width="30">No</th>
                        <th width="200">Dokter</th>
                        <th width="30">Poli</th>
                        <th class="text-center">Senin</th>
                        <th class="text-center">Selasa</th>
                        <th class="text-center">Rabu</th>
                        <th class="text-center">Kamis</th>
                        <th class="text-center">Jumat</th>
                        <th class="text-center">Sabtu</th>
                        <th class="text-center">Opsi</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1; ?>
                        <?php  foreach ($jadwal as $row ) : ?>

                             <tr>
                               <td><?= $i; ?></td>
                               <td><?= $row["dokter"]; ?></td>
                               <td><?= $row["poli"]; ?></td>
                               <td><?= $row["senin"]; ?></td>
                               <td><?= $row["selasa"]; ?></td>
                               <td><?= $row["rabu"]; ?></td>
                               <td><?= $row["kamis"]; ?></td>
                               <td><?= $row["jumat"]; ?></td>
                               <td><?= $row["sabtu"]; ?></td>
                               <td>  <button type="button" class="btn btn-outline-info btn-sm mt-1"><a href="edit_jadwal.php?id=<?= $row["id"]?>" class="text-reset">Rubah</a> </button>
                                     <button type="button" class="btn btn-outline-info btn-sm mt-1"><a href="hapus_jadwal.php?id=<?= $row["id"]?>" class="text-reset" onclick=" return confirm('Anda Yakin?');">Hapus</a></button>
                               </td>
                             </tr>
                             <?php $i++ ?>
                           <?php endforeach; ?>
                      </tbody>

                    </table>

                  </div>
                </div>
                </div>
              </div>


                </div>
              </div>
              </div>

<script src="js/script.js">

</script>
</body>

</html>
