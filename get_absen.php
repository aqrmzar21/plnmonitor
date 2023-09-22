<?php
  header("Content-Type: application/json");


  require 'db/function.php';

  $absen = query("SELECT * FROM t_datapengunjung");

  echo json_encode($absen);

?>