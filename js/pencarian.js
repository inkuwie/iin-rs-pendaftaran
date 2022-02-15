//pencarian kode Pendaftaran
var kode = document.getElementById('kode');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

//tambahkan event ketika event ditulis
kode.addEventListener('keyup', function(){

  //buat objek ajaxdata
  var xhr = new XMLHttpRequest();

  //cek kesiapan ajaxdata
  xhr.onreadystatechange = function(){
    if( xhr.readyState == 4 && xhr.status == 200 ) {
      container.innerHTML = xhr.responseText;
    }
  }

  //eksekusi ajax
  xhr.open('GET', 'ajax/data_pendaftar.php?kode=' + kode.value, true);
  xhr.send();
});
