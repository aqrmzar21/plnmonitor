<?php
// require '../../../db/function.php';
require '../proses.php';

// mengambil id dari url
$id = $_GET['id'];

if (del($id) > 0) {
  echo "<script>
  alert('data berhasil dihapus');
  document.location.href ='../absen.php';
  </script>";
} else {
  echo "<script>
  alert('data gagal dihapus');
  document.location.href ='../signature.php';
  </script>";
}
