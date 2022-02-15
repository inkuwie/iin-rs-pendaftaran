<?php
require 'functions.php';
$id_jam = $_GET["id_jam"];

if( hapus_dokter($id_jam) > 0 ) {
      echo "
          <script>
              alert('data berhasil dihapus!');
              document.location.href = 'jadwal_dokter.php';
          </script>
          ";
      } else {
       echo "
          <script>
              alert('data gagal dihapus!');
              document.location.href = 'jadwal_dokter.php';
          </script>
            ";
      }

 ?>
