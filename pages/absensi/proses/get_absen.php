<?php
header("Content-Type: application/json");


// require 'db/function.php';
require '../proses.php';

// $currentTime = date("Y-m-d");

$absen = query("SELECT * FROM t_dataabsen");
// $absen = query("SELECT * FROM t_dataabsen WHERE waktu >= '$currentTime'");

echo json_encode($absen);
