<?php
require 'path/to/PhpSpreadsheet/vendor/autoload.php';
require '../absensi/proses.php'; // Sesuaikan dengan path ke file koneksi.php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$koneksi = koneksi();
$tanggal_sekarang = date("Y-m-d");
$query = "SELECT * FROM t_dataabsen WHERE DATE(tanggal) = '$tanggal_sekarang'";
$absensi = mysqli_query($koneksi, $query);

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$i = 1;
while ($ab = mysqli_fetch_array($absensi)) {
  $sheet->setCellValue('A' . $i, $i);
  $sheet->setCellValue('B' . $i, $ab['nm_absen']);
  $sheet->setCellValue('C' . $i, $ab['unit']);
  $sheet->setCellValue('D' . $i, $ab['bidang']);
  $sheet->setCellValue('E' . $i, $ab['nope']);
  $sheet->setCellValue('F' . $i, $ab['email']);
  $i++;
}

$filename = 'absensi_report.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
