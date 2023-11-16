<?php
header("Content-Type: application/json");


require 'proses.php';
$date = $_POST['date'];
$today = date("Y-m-d", strtotime($date));

$absen = mysqli_query($koneksi, "SELECT COUNT(*) AS totalpengunjung FROM t_dataabsen WHERE DATE(tanggal) = '$today'");
$dab = mysqli_fetch_assoc($absen);


echo json_encode($absen);
