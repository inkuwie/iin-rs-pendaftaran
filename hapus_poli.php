<?php
require 'functions.php';
$id_poli = $_GET["id_poli"];

if( hapus_poli($id_poli) > 0 ) {
      echo "
          <script>
              alert('data berhasil dihapus!');
              document.location.href = 'daftar_poliklinik.php';
          </script>
          ";
      } else {
       echo "
          <script>
              alert('data gagal dihapus!');
              document.location.href = 'daftar_poliklinik.php';
          </script>
            ";
      }

 ?>
