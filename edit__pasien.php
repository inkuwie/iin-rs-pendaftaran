<?php
session_start();

if (!isset($_SESSION["login"])){
  header("location: index.php");
  exit;
}

require 'functions.php';

//ambil data di url
$kode_pendaftaran = $_GET["kode_pendaftaran"];

 //query data mahasiswa berdasarkan
$edit_pasien = query("SELECT pasien.kode_pendaftaran,pasien.tgl_daftar,pasien.nama,poliklinik.id_poli,poliklinik.nama_poli,dokter.id_dokter,dokter.nama_dokter,jam.id_jam,jam.jam,pasien.jenis_pembayaran,pasien.no_rm,pasien.nama,pasien.jk,pasien.tlahir,pasien.nohp,pasien.ttl,pasien.pekerjaan,pasien.alamat,pasien.wnama,pasien.wjk,pasien.walamat,pasien.wnohp FROM pasien join poliklinik on pasien.id_poli=poliklinik.id_poli join dokter on pasien.id_dokter=dokter.id_dokter join jam on pasien.id_jam=jam.id_jam where kode_pendaftaran = $kode_pendaftaran")[0];

//cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["rubah"]) ) {


//cek apakah data berhasil diubah atau tidak
  if(ubah_pasien($_POST) > 0 ) {
    echo "<script>
              alert('data berhasil diubah!');
              document.location.href = 'data_pemohon.php';
          </script>";
  } else {
    echo  "
        <script>
        alert('data gagal diubah!');
        document.location.href = 'edit__pasien.php';
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
    <title>PASIEN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Menyisipkan Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Menyisipkan JQuery dan Javascript Bootstrap -->
    <!-- jQuery dulu, kemudian Popper.js, kemudian Bootstrap.js -->
      <script src="js/jquery-3.3.1.min.js"></script>
      <!-- bootstrap.bundle.min.js sudah include Popper.js -->
      <script src="js/bootstrap.bundle.min.js" ></script>

      <!-- ajaxdata.php-------------------->
      <script type="text/javascript">
      $(document).ready(function(){
        $('#poli_tujuan').on('change',function(){
          var poliID = $(this).val();
          if(poliID){
            $.ajax({
              type:'POST',
              url:'ajaxdata.php',
              data:'id_poli='+poliID,
              success:function(html){
                $('#dokter').html(html);
                $('#jam').html('<option value="">pilih jam berobat</option>');
              }
          });
        }else{
          $('#dokter').html('<option value="">pilih dokter</option>');
          $('#jam').html('<option value="">pilih jam berobat</option>');
        }
      });

      $('#dokter').on('change', function(){
        var dokterID = $(this).val();
        if(dokterID){
          $.ajax({
            type:'POST',
            url:'ajaxdata.php',
            data:'id_dokter='+dokterID,
            success:function(html){
              $('#jam').html(html);
            }
          });
        }else{
          $('#jam').html('<option value="">pilih jam first</option>');
        }
      });
      });
      </script>


<style media="screen">
  body , html{
    height: auto;
  }
  .bg {
    background-image: url("img/background.jpg");
    height: auto;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
  }
</style>
</head>

<body  class="bg mt-3">

  <!-- navibar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="">RUMAH SAKIT ASIH</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Pendaftaran Online<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="data_pemohon.php">Data Pemohon</a>
          </li>
          <li class="nav-item">
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

    <!-- Membuat Form -->

        <div class="pt-5">
            <div class="container">

            <div class="row">
              <div class="col-12 mb-1">
                <div class="card">
                    <div class="card-body">

                    <form class="" action="" method="post">
                      <div class="row">
                        <div class="col">
                          <div class="">
                            <label for=""><H6>- JENIS PASIEN - </H6></label>
                          </div>

                        <div class="form-group">
                          <input type="hidden" class="form-control" id="kode_pendaftaran" name="kode_pendaftaran" value="<?= $edit_pasien["kode_pendaftaran"];?>">

                          <input type="hidden" class="form-control" id="username" name="username" value="<?php echo $_SESSION['username']; ?>" placeholder="" >
                          <label for="">Tanggal berobat</label>
                          <input type="date" class="form-control" id="tgl_daftar" name="tgl_daftar" value="<?= $edit_pasien["tgl_daftar"];?>"  required>
                          </div>

                          <div class="form-group">
                          <label for="">Poli tujuan</label>
                          <select class="form-control" name="poli_tujuan" id="poli_tujuan">
                              <option value="">Pilih</option>
                              <option value="1" <?php if($edit_pasien['id_poli'] == 1){echo 'selected';}?>>Umum</option>
                              <option value="2" <?php if($edit_pasien['id_poli'] == 2){echo 'selected';}?>>Anak</option>
                              <option value="3" <?php if($edit_pasien['id_poli'] == 3){echo 'selected';}?>>Gigi</option>
                          </select>
                          </div>

                          <div class="form-group">
                          <label for="">Dokter</label>
                          <select class="form-control" name="dokter" id="dokter">
                              <option value="">Pilih</option>
                              <option value="1" <?php if($edit_pasien['id_poli'] == 1){echo 'selected';}?>>Dr. Suryono Hanung, Sp.A</option>
                              <option value="2" <?php if($edit_pasien['id_dokter'] == 2){echo 'selected';}?>>Dr. Dion Wiyoko, Sp.A</option>
                              <option value="3" <?php if($edit_pasien['id_dokter'] == 3){echo 'selected';}?>>Dr. Adi Hapsah</option>
                              <option value="4" <?php if($edit_pasien['id_dokter'] == 4){echo 'selected';}?>>Dr. Intan Rahmawati</option>
                              <option value="5" <?php if($edit_pasien['id_dokter'] == 5){echo 'selected';}?>>Drg. Gunawan Prasetya</option>
                              <option value="6" <?php if($edit_pasien['id_dokter'] == 6){echo 'selected';}?>>Drg. Lintang Mulan</option>
                          </select>
                          </div>

                          <div class="form-group">
                          <label for="">Jam berobat</label>
                          <select class="form-control" name="jam" id="jam">
                              <option value="">Pilih</option>
                              <option value="1" <?php if($edit_pasien['id_jam'] == 1){echo 'selected';}?>>10:00 - 14:00</option>
                              <option value="2" <?php if($edit_pasien['id_jam'] == 2){echo 'selected';}?>>14:00 - 17:00</option>
                              <option value="3" <?php if($edit_pasien['id_jam'] == 3){echo 'selected';}?>>10:00 - 14:00</option>
                              <option value="4" <?php if($edit_pasien['id_jam'] == 4){echo 'selected';}?>>14:00 - 17:00</option>
                              <option value="5" <?php if($edit_pasien['id_jam'] == 5){echo 'selected';}?>>10:00 - 14:00</option>
                              <option value="6" <?php if($edit_pasien['id_jam'] == 6){echo 'selected';}?>>14:00 - 17:00</option>
                          </select>
                          </div>

                          <div class="form-group">
                          <label for="">Jenis pembayaran</label>
                          <select class="form-control" name="jenis_pembayaran" id="jenis_pembayaran">
                              <option value="">Pilih</option>
                              <option value="Umum" <?php if($edit_pasien['jenis_pembayaran'] == 'Umum'){echo 'selected';}?>>Umum</option>
                              <option value="Bpjs" <?php if($edit_pasien['jenis_pembayaran'] == 'Bpjs'){echo 'selected';}?>>Bpjs</option>
                              <option value="Asuransi" <?php if($edit_pasien['jenis_pembayaran'] == 'Asuransi'){echo 'selected';}?>>Asuransi</option>
                          </select>
                          </div>

                          <div class="form-group">
                            <label for="">No Rekam medis</label>
                            <input type="text" class="form-control" id="no_rm" name="no_rm" value="<?= $edit_pasien["no_rm"];?>">

                          </div>
                        </div>

                        <div class="col">
                          <div class="">
                            <label for=""><H6>- DATA PASIEN - </H6></label>
                          </div>

                          <div class="form-group">
                          <label for="nama">Nama pasien</label>
                          <input type="text" class="form-control" id="nama" name="nama" value="<?= $edit_pasien["nama"];?>" placeholder="" >
                          </div>

                          <div class="form-group">
                          <label for="alamat">Jenis kelamin</label>
                          <select class="form-control" name="jk" id="jk">
                              <option value="">Pilih</option>
                              <option value="wanita" <?php if($edit_pasien['jk'] == 'wanita'){echo 'selected';}?>>Wanita</option>
                              <option value="pria" <?php if($edit_pasien['jk'] == 'pria'){echo 'selected';}?>>Pria</option>
                          </select>
                          </div>

                                      <div class="row">
                                        <div class="col">
                                        <div class="form-group">
                                        <label for="tlahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tlahir" name="tlahir" value="<?= $edit_pasien["tlahir"];?>">
                                        </div>

                                        <div class="form-group">
                                        <label for="nohp">No Hp</label>
                                        <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $edit_pasien["nohp"];?>">
                                        </div>
                                        </div>

                                        <div class="col">
                                        <div class="form-group">
                                        <label for="ttl">Tanggal lahir</label>
                                        <input type="date" class="form-control" id="ttl" name="ttl" value="<?= $edit_pasien["ttl"];?>" >
                                        </div>

                                        <div class="form-group">
                                        <label for="">Pekerjaan</label>
                                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $edit_pasien["pekerjaan"];?>" placeholder="" >
                                        </div>
                                        </div>
                                        </div>

                        <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="2" ><?= $edit_pasien["alamat"];?></textarea>
                        </div>

                        </div>

                        <div class="col">
                          <div class="">
                            <label for=""><H6>- DATA WALI PASIEN -</H6></label>
                          </div>

                          <div class="form-group">
                          <label for="">Nama Lengkap</label>
                          <input type="text" class="form-control" id="wnama" name="wnama" value="<?= $edit_pasien["wnama"];?>" placeholder="" >
                          </div>

                          <div class="form-group">
                          <label for="alamat">Jenis kelamin</label>
                          <select class="form-control" name="wjk" id="wjk" >
                            <option value="">Pilih</option>
                            <option value="wanita" <?php if($edit_pasien['jk'] == 'wanita'){echo 'selected';}?>>Wanita</option>
                            <option value="pria" <?php if($edit_pasien['jk'] == 'pria'){echo 'selected';}?>>Pria</option>                          </select>
                          </div>

                          <div class="form-group">
                          <label for="alamat">Alamat</label>
                          <textarea class="form-control" id="walamat" name="walamat" rows="2" ><?= $edit_pasien["walamat"];?></textarea>
                          </div>

                          <div class="form-group">
                          <label for="tlahir">No Hp</label>
                          <input type="text" class="form-control" id="wnohp" name="wnohp" value="<?= $edit_pasien["wnohp"];?>" placeholder="" >
                          </div>

                          <br>
                          <div class="form-group text-right">
                          <button type="submit" name="rubah" class="btn btn-outline-info btn-lg mt-1">RUBAH</button>
                          <button type="submit" name="batal" class="btn btn-outline-info btn-lg mt-1"><a href="data_pemohon.php" style="text-decoration:none" class="text-reset">BATAL</a></button>
                          </div>
                        </div>
                      </div>
                    </form>
                    <script src="admin/vendor/jquery/jquery.min.js"></script>
                    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                    <script>
                        $(function() {
                          $("#no_rm").change(function(){
                            var no_rm = $("#no_rm").val();

                            $.ajax({
                              url: 'proses.php',
                              type: 'POST',
                              dataType: 'json',
                              data: {
                                'no_rm': no_rm
                              },
                              success: function (pasien) {
                                $("#nama").val(pasien['nama']);
                                $("#jk").val(pasien['jk']);
                                $("#tlahir").val(pasien['tlahir']);
                                $("#nohp").val(pasien['nohp']);
                                $("#ttl").val(pasien['ttl']);
                                $("#pekerjaan").val(pasien['pekerjaan']);
                                $("#alamat").val(pasien['alamat']);
                                $("#wnama").val(pasien['wnama']);
                                $("#wjk").val(pasien['wjk']);
                                $("#walamat").val(pasien['walamat']);
                                $("#wnohp").val(pasien['wnohp']);

                              }
                            });
                          });

                          $("form").submit(function(){
                            alert("Silahkan Periksa kembali setelah selesai, klik OK!");
                          });
                        });
                      </script>

                    </div>
                    </div>
              </div>

            </div>




          </div>
      </div>



</body>

</html>
