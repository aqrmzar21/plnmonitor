<?php
require '../../vendor/autoload.php';
require '../absensi/proses.php'; // Sesuaikan dengan path ke file koneksi.php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$koneksi = koneksi();
$tanggal_sekarang = date("Y-m-d");
$query = "SELECT * FROM t_dataabsen WHERE DATE(tanggal) = '$tanggal_sekarang'";
$absensi = mysqli_query($koneksi, $query);

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
// Judul Kolom
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Nama Lengkap');
$sheet->setCellValue('C1', 'Unit/Perusahaan');
$sheet->setCellValue('D1', 'Jabatan/Bidang');
$sheet->setCellValue('E1', 'No Telp');
$sheet->setCellValue('F1', 'Email');
$sheet->setCellValue('G1', 'Tanda Tangan');

// Data
$i = 2;
while ($ab = mysqli_fetch_array($absensi)) {
  $sheet->setCellValue('A' . $i, $i - 1);
  $sheet->setCellValue('B' . $i, $ab['nm_absen']);
  $sheet->setCellValue('C' . $i, $ab['unit']);
  $sheet->setCellValue('D' . $i, $ab['bidang']);
  $sheet->setCellValue('E' . $i, $ab['nope']);
  $sheet->setCellValue('F' . $i, $ab['email']);
  $sheet->setCellValue('G' . $i, $ab['signed']);

  // Add an image to cell 'G'
  $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
  $drawing->setName('My Signature');
  $drawing->setDescription('Signature');
  $drawing->setPath('../absensi/upload/' . $ab['signed']);
  $drawing->setHeight(100);
  $drawing->setCoordinates('G' . $i);
  $drawing->setOffsetX(10);
  $drawing->setOffsetY(10);
  $drawing->setWorksheet($sheet);
  $i++;
}

$filename = 'absensi_report.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
