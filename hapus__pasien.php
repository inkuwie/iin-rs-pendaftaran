<?php
require 'functions.php';
$kode_pendaftaran = $_GET["kode_pendaftaran"];

if( hapus_pendaftar1($kode_pendaftaran) > 0 ) {
      echo "
          <script>
              alert('data berhasil dihapus!');
              document.location.href = 'data_pemohon.php';
          </script>
          ";
      } else {
       echo "
          <script>
              alert('data gagal dihapus!');
              document.location.href = 'data_pemohon.php';
          </script>
            ";
      }

 ?>
