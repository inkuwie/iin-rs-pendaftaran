<?php
///////////////////// KONEKSI KE DATABASE //////////////////////////////
$db = mysqli_connect("localhost", "root", "", "pendaftaran");


//////////////// REGISTER///////////////////////////////////
function registrasi($data) {
  global $db;

  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($db, $data["password"]);
  $nama_lenkap    = strtolower(stripslashes($data["nama_lenkap"]));
  $level    = "pasien";


//CEK USERNAME SUDAH ADA ATAU BELUM
  $result = mysqli_query($db, "select username from user where username = '$username'");
  if (mysqli_fetch_assoc($result)) {
    echo "<script>
            alert('GAGAL! Username sudah terdaftar, Silahkan pakai username yang lain')
            </script>";
      return false;
  }


//ENKRIPSI PASSWORD
$password = password_hash($password, PASSWORD_DEFAULT);

//TAMBAH USER BARU KE DATABASE
mysqli_query($db, "insert into user values ('', '$username', '$password','$nama_lenkap','$level')");

return mysqli_affected_rows($db);

}



///////////////////////////////////poliklinik/////////////////////////////////////
function poliklinik($data) {
  global $db;

  $id = htmlspecialchars($data["id"]);
  $kode_poli = htmlspecialchars($data["kode_poli"]);
  $poli = htmlspecialchars($data["poli"]);
  mysqli_query($db, $query);

  return mysqli_affected_rows($db);

  }


///////////////////////JADWAL///////////////////////////////////////////
//Tampil tabel jadwal
function query($query){
  global $db;
  $result = mysqli_query($db, $query);
  $row = [];
  while ( $row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}


//untuk pencarian
function cari($keyword) {
  $query = "SELECT * FROM jadwal
              WHERE
              dokter LIKE  '%$keyword%'
              ";

  return query($query);
}


//INPUT jadwal dokter//

function jadwal($data) {
  global $db;

  $dokter = htmlspecialchars($data["dokter"]);
  $poli = htmlspecialchars($data["poli"]);
  $senin = htmlspecialchars($data["senin"]);
  $selasa = htmlspecialchars($data["selasa"]);
  $rabu = htmlspecialchars($data["rabu"]);
  $kamis = htmlspecialchars($data["kamis"]);
  $jumat = htmlspecialchars($data["jumat"]);
  $sabtu = htmlspecialchars($data["sabtu"]);

//TAMBAH jadwal KE DATABASE
$query = "INSERT INTO jadwal
            VALUES ('', '$dokter', '$poli','$senin','$selasa','$rabu','$kamis','$jumat','$sabtu')
          ";

mysqli_query($db, $query);

return mysqli_affected_rows($db);

}

//edit jadwal
function ubah($data) {
global $db;

$id = $data["id"];
$dokter = $data["dokter"];
$poli = $data["poli"];
$senin = $data["senin"];
$selasa = $data["selasa"];
$rabu = $data["rabu"];
$kamis = $data["kamis"];
$jumat = $data["jumat"];
$sabtu = $data["sabtu"];

$query = "UPDATE jadwal SET
          dokter = '$dokter',
          poli = '$poli',
          senin = '$senin',
          selasa = '$selasa',
          rabu = '$rabu',
          kamis = '$kamis',
          jumat = '$jumat',
          sabtu = '$sabtu'
          WHERE id = $id
          ";

mysqli_query($db, $query);

return mysqli_affected_rows($db);

}

//hapus jadwal
function hapus($id){
  global $db;
  mysqli_query($db, "DELETE FROM jadwal WHERE id = $id");

  return mysqli_affected_rows($db);
}

///////////////////////// pasien//////////////////////////////////

//INPUT PASUIEN//

function pasien($data) {
  global $db;

  $kode_pendaftaran = htmlspecialchars($data["kode_pendaftaran"]);
  $username = htmlspecialchars($data["username"]);
  $tgl_daftar = htmlspecialchars($data["tgl_daftar"]);
  $id_poli = htmlspecialchars($data["poli_tujuan"]);
  $id_dokter = htmlspecialchars($data["dokter"]);
  $id_jam = htmlspecialchars($data["jam"]);
  $jenis_pembayaran = htmlspecialchars($data["jenis_pembayaran"]);
  $no_rm = htmlspecialchars($data["no_rm"]);
  $nama = htmlspecialchars($data["nama"]);
  $jk = htmlspecialchars($data["jk"]);
  $tlahir = htmlspecialchars($data["tlahir"]);
  $nohp = htmlspecialchars($data["nohp"]);
  $ttl = htmlspecialchars($data["ttl"]);
  $pekerjaan = htmlspecialchars($data["pekerjaan"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $wnama = htmlspecialchars($data["wnama"]);
  $wjk = htmlspecialchars($data["wjk"]);
  $walamat = htmlspecialchars($data["walamat"]);
  $wnohp = htmlspecialchars($data["wnohp"]);
  $status = htmlspecialchars($data["status"]);


//TAMBAH pasien KE DATABASE
$query = "INSERT INTO pasien
            VALUES ('','$username','$tgl_daftar','$id_poli','$id_dokter','$id_jam','$jenis_pembayaran','$no_rm','$nama','$jk','$tlahir','$nohp','$ttl','$pekerjaan','$alamat','$wnama','$wjk','$walamat','$wnohp','$status')
          ";

mysqli_query($db, $query);

return mysqli_affected_rows($db);

}


//ubah pasien//

function ubah_pasien($data) {
  global $db;

  $kode_pendaftaran = htmlspecialchars($data["kode_pendaftaran"]);
  $username = htmlspecialchars($data["username"]);
  $tgl_daftar = htmlspecialchars($data["tgl_daftar"]);
  $id_poli = htmlspecialchars($data["poli_tujuan"]);
  $id_dokter = htmlspecialchars($data["dokter"]);
  $id_jam = htmlspecialchars($data["jam"]);
  $jenis_pembayaran = htmlspecialchars($data["jenis_pembayaran"]);
  $no_rm = htmlspecialchars($data["no_rm"]);
  $nama = htmlspecialchars($data["nama"]);
  $jk = htmlspecialchars($data["jk"]);
  $tlahir = htmlspecialchars($data["tlahir"]);
  $nohp = htmlspecialchars($data["nohp"]);
  $ttl = htmlspecialchars($data["ttl"]);
  $pekerjaan = htmlspecialchars($data["pekerjaan"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $wnama = htmlspecialchars($data["wnama"]);
  $wjk = htmlspecialchars($data["wjk"]);
  $walamat = htmlspecialchars($data["walamat"]);
  $wnohp = htmlspecialchars($data["wnohp"]);


//ubah pasien KE DATABASE
$query = "UPDATE pasien SET
            tgl_daftar = '$tgl_daftar',
            id_poli = '$id_poli',
            id_dokter = '$id_dokter',
            id_jam = '$id_jam',
            jenis_pembayaran = '$jenis_pembayaran',
            no_rm = '$no_rm',
            nama = '$nama',
            jk = '$jk',
            tlahir = '$tlahir',
            nohp = '$nohp',
            ttl = '$ttl',
            pekerjaan = '$pekerjaan',
            alamat = '$alamat',
            wnama = '$wnama',
            wjk = '$wjk',
            walamat = '$walamat',
            wnohp = '$wnohp'
            WHERE kode_pendaftaran = $kode_pendaftaran
          ";

              mysqli_query($db, $query);

  return mysqli_affected_rows($db);

}



/////////////DATA PENDAFTAR///////////////

//untuk pencarian kode pendaftaran
function cari_kode($kode) {
  $query = "SELECT pasien.kode_pendaftaran,pasien.tgl_daftar,pasien.nama,poliklinik.nama_poli,dokter.nama_dokter,jam.jam from pasien join poliklinik on pasien.id_poli=poliklinik.id_poli join dokter on pasien.id_dokter=dokter.id_dokter join jam on pasien.id_jam=jam.id_jam
              WHERE
              kode_pendaftaran LIKE  '%$kode%'
              ";

  return query($query);
}

//validasi
function validasi($data) {
global $db;

$kode_pendaftaran = $data["kode_pendaftaran"];
$status = $data["status"];

$query = "UPDATE pasien SET
          status = '$status'
          WHERE kode_pendaftaran = $kode_pendaftaran
          ";

mysqli_query($db, $query);

return mysqli_affected_rows($db);

}



/////////////////////////Daftar poliklinik////////////////////////
function tambah_poli($data) {
  global $db;

  $id_poli = htmlspecialchars($data["id_poli"]);
  $nama_poli = htmlspecialchars($data["nama_poli"]);
  $status = "1";

//TAMBAH poli KE DATABASE
$query = "INSERT INTO poliklinik
            VALUES ('', '$nama_poli', '$status')
          ";

mysqli_query($db, $query);

return mysqli_affected_rows($db);

}

//edit poliklinik
function ubah_poli($data) {
global $db;

$id_poli = $data["id_poli"];
$nama_poli = $data["nama_poli"];
$status = $data["status"];

$query = "UPDATE poliklinik SET
          nama_poli = '$nama_poli'
          WHERE id_poli = $id_poli
          ";

mysqli_query($db, $query);

return mysqli_affected_rows($db);

}

//hapus jadwal
function hapus_poli($id_poli){
  global $db;
  mysqli_query($db, "DELETE FROM poliklinik WHERE id_poli = $id_poli");

  return mysqli_affected_rows($db);
}

/////////////////////////Jadwal Dokter////////////////////////
function tambah_dokter($data) {
  global $db;

  $id_dokter = htmlspecialchars($data["id_dokter"]);
  $nama_dokter = htmlspecialchars($data["nama_dokter"]);
  $id_poli = htmlspecialchars($data["poli_tujuan"]);
  $status = "1";

//TAMBAH dokter KE DATABASE
$query = "INSERT INTO dokter
            VALUES ('','$nama_dokter', '$id_poli','$status')
          ";


mysqli_query($db, $query);

return mysqli_affected_rows($db);

}

//edit dokter
function ubah_dokter($data) {
global $db;

$id_jam = $data["id_jam"];
$id_dokter = $data["id_dokter"];
//$nama_dokter = $data["nama_dokter"];
//$id_poli = $data["poli_tujuan"];
$jam = $data["jam"];

$query = "UPDATE jam SET jam = '$jam'
          WHERE id_jam = $id_jam
          ";


mysqli_query($db, $query);

return mysqli_affected_rows($db);

}

//hapus dokter
function hapus_dokter($id_dokter){
  global $db;
  mysqli_query($db, "DELETE FROM dokter WHERE id_dokter = $id_dokter");

  return mysqli_affected_rows($db);
}

//untuk pencarian dokter
function cari_dokter($dokter) {
  $query = "SELECT dokter.id_dokter,dokter.nama_dokter,poliklinik.nama_poli,jam.jam from dokter join poliklinik on dokter.id_poli=poliklinik.id_poli join jam on dokter.id_jam=jam.id_jam
              WHERE
              nama_dokter LIKE  '%$dokter%'
              ";

  return query($query);
}

////tambah jam///
function tambah_jam($data) {
  global $db;

  $id_jam = htmlspecialchars($data["id_jam"]);
  $jam = htmlspecialchars($data["jam"]);
  $id_poli = htmlspecialchars($data["poli_tujuan"]);
  $id_dokter = htmlspecialchars($data["dokter"]);
  $status = "1";

//TAMBAH dokter KE DATABASE
$query = "INSERT INTO jam
            VALUES ('','$jam', '$id_poli','$id_dokter', '$status')
          ";

mysqli_query($db, $query);

return mysqli_affected_rows($db);

}

//edit cara daftar
function ubah_caradaftar($data) {
global $db;

$id_cara = $data["id_cara"];
$step1 = $data["step1"];
$step2 = $data["step2"];
$step3 = $data["step3"];

$query = "UPDATE caradaftar SET
          step1 = '$step1',
          step2 = '$step2',
          step3 = '$step3'
          WHERE id_cara = $id_cara
          ";

mysqli_query($db, $query);

return mysqli_affected_rows($db);

}

//untuk pencarian Laporan
function cari_data($tgl_awal ,$tgl_akhir) {

  $query = "SELECT pasien.kode_pendaftaran,pasien.tgl_daftar,pasien.nama,poliklinik.nama_poli,dokter.nama_dokter,jam.jam,pasien.status from pasien join poliklinik on pasien.id_poli=poliklinik.id_poli join dokter on pasien.id_dokter=dokter.id_dokter join jam on pasien.id_jam=jam.id_jam
              WHERE tgl_daftar BETWEEN  '$tgl_awal' AND '$tgl_akhir'
              ";

  return query($query);
}

function tampil($tgl_awal ,$tgl_akhir) {

  $query = "SELECT pasien.kode_pendaftaran,pasien.tgl_daftar,pasien.nama,poliklinik.nama_poli,dokter.nama_dokter,jam.jam,pasien.status from pasien join poliklinik on pasien.id_poli=poliklinik.id_poli join dokter on pasien.id_dokter=dokter.id_dokter join jam on pasien.id_jam=jam.id_jam
              WHERE tgl_daftar BETWEEN  '$tgl_awal' AND '$tgl_akhir'
              ";
              

  return query($query);
}


//hapus data pendaftar
function hapus_pendaftar($kode_pendaftaran){
  global $db;
  mysqli_query($db, "DELETE FROM pasien WHERE kode_pendaftaran = $kode_pendaftaran");

  return mysqli_affected_rows($db);
}
function hapus_pendaftar1($kode_pendaftaran){
  global $db;
  mysqli_query($db, "DELETE FROM pasien WHERE kode_pendaftaran = $kode_pendaftaran");

  return mysqli_affected_rows($db);
}


//info anak
function anak_info($data) {
global $db;

$id = $data["id"];
$anak = $data["anak"];

$query = "UPDATE informasi SET
          anak = '$anak'
          WHERE id = $id
          ";

mysqli_query($db, $query);

return mysqli_affected_rows($db);
}

//info gigi
function gigi_info($data) {
global $db;

$id = $data["id"];
$gigi = $data["gigi"];

$query = "UPDATE informasi SET
          gigi = '$gigi'
          WHERE id = $id
          ";

mysqli_query($db, $query);

return mysqli_affected_rows($db);
}

//info umum
function umum_info($data) {
global $db;

$id = $data["id"];
$umum = $data["umum"];

$query = "UPDATE informasi SET
          umum = '$umum'
          WHERE id = $id
          ";

mysqli_query($db, $query);

return mysqli_affected_rows($db);
}

 ?>
