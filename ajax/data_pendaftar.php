<?php
require '../functions.php';

$kode = $_GET["kode"];

$query = "SELECT pasien.kode_pendaftaran,pasien.tgl_daftar,pasien.nama,poliklinik.nama_poli,dokter.nama_dokter,jam.jam from pasien join poliklinik on pasien.id_poli=poliklinik.id_poli join dokter on pasien.id_dokter=dokter.id_dokter join jam on pasien.id_jam=jam.id_jam
            WHERE
            kode_pendaftaran LIKE  '%$kode%'
            ";


$data_pendaftar = query($query);

?>
<table class="table table-sm table-bordered">
  <thead>
  <tr class="table-info">
    <th class="text-center" scope="col"width="20">No</th>
    <th class="text-center" width="90">Kode Pendaftar</th>
    <th class="text-center" width="70">Tgl Daftar</th>
    <th width="115" class=""><center>Nama Pasien</center></th>
    <th width="35" class="text-center">Poli</th>
    <th width="140" class="text-center">Dokter</th>
    <th width="70" class="text-center">Jam Berobat</th>
    <th width="120" class="text-center">Action</th>
  </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php  foreach ($data_pendaftar as $row ) : ?>

         <tr>
           <td><center><?= $i; ?></center></td>
           <td><center><?= $row["kode_pendaftaran"]; ?></center></td>
           <td><center><?=date('d-m-Y', strtotime( $row["tgl_daftar"])); ?></center></td>
           <td><?= $row["nama"]; ?></td>
           <td><?= $row["nama_poli"]; ?></td>
           <td><?= $row["nama_dokter"]; ?></td>
           <td><center><?= $row["jam"]; ?></center></td>

           <td><button type="button" class="btn btn-outline-info btn-sm mt-1"><a href="cetak.php?kode_pendaftaran=<?= $row["kode_pendaftaran"]?>" target="_blank" class="text-reset" style="text-decoration:none">CETAK</a></button>
             <button type="button" class="btn btn-outline-info btn-sm mt-1"><a href="hapus_pasien.php?kode_pendaftaran=<?= $row["kode_pendaftaran"]?>" class="text-reset" style="text-decoration:none">HAPUS</a></button>
             <button type="button" class="btn btn-outline-info btn-sm mt-1"><a href="validasi_pasien.php?kode_pendaftaran=<?= $row["kode_pendaftaran"]?>" class="text-reset" style="text-decoration:none">VALIDASI</a></button>
           </td>
         </tr>
         <?php $i++ ?>
       <?php endforeach; ?>
  </tbody>

</table>
