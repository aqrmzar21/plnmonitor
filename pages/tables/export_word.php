<?php
require_once '../../plugins/phpword/vendor/autoload.php';
// require_once 'vendor/autoload.php';
require '../absensi/proses.php';
// Fetch data from the database
$koneksi = koneksi();
$tanggal_sekarang = date("Y-m-d");
$query = "SELECT * FROM t_dataabsen WHERE DATE(tanggal) = '$tanggal_sekarang'";
$absensi = mysqli_query($koneksi, $query);

// Membuat objek dokumen baru
$phpWord = new \PhpOffice\PhpWord\PhpWord();

// Menambahkan section baru
$section = $phpWord->addSection();

// Menambahkan teks ke section
// $section->addText('Hello World!');

// Menambahkan tabel ke section
$table = $section->addTable();

// Menambahkan header ke tabel
$table->addRow();
$table->addCell()->addText('No.');
$table->addCell()->addText('Nama Absen');
$table->addCell()->addText('Unit');
$table->addCell()->addText('Bidang');
$table->addCell()->addText('No. HP');
$table->addCell()->addText('Email');
$table->addCell()->addText('Tanda Tangan');

// Fetch data and populate the table
$i = 1;
while ($ab = mysqli_fetch_array($absensi)) {
  $table->addRow();
  $table->addCell()->addText($i);
  $table->addCell()->addText($ab['nm_absen']);
  $table->addCell()->addText($ab['unit']);
  $table->addCell()->addText($ab['bidang']);
  $table->addCell()->addText($ab['nope']);
  $table->addCell()->addText($ab['email']);
  $table->addCell()->addImage('../absensi/upload/' . $ab['signed'], ['width' => 100]);

  $i++;
}

// Menyimpan dokumen
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

// Menyiapkan headers untuk download
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment;filename="daftar_absen ('. $tanggal_sekarang . ').docx"');

// Menulis dokumen ke output PHP
$objWriter->save('php://output');
