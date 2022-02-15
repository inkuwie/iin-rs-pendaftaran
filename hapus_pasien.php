<?php
require 'functions.php';
$kode_pendaftaran = $_GET["kode_pendaftaran"];

if( hapus_pendaftar($kode_pendaftaran) > 0 ) {
      echo "
          <script>
              alert('data berhasil dihapus!');
              document.location.href = 'data_pendaftar.php';
          </script>
          ";
      } else {
       echo "
          <script>
              alert('data gagal dihapus!');
              document.location.href = 'data_pendaftar.php';
          </script>
            ";
      }

 ?>
