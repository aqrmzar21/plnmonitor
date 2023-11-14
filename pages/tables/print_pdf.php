<?php
// require 'path/to/dompdf/autoload.inc.php';
require '../vendor/autoload.php'; // Lokasi autoload.php sesuaikan dengan proyek Anda

use Dompdf\Dompdf;
use Dompdf\Options;

require '../absensi/proses.php';
// $koneksi = (mysqli_connect('localhost', 'root', '', 'absensiplen'));
$formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
$today = $formatter->format(new DateTime());

$koneksi = koneksi();
$tanggal_sekarang = date("Y-m-d");
$query = "SELECT * FROM t_dataabsen WHERE DATE(tanggal) = '$tanggal_sekarang'";
$absensi = mysqli_query($koneksi, $query);

// Membaca data dari cookie
$location = $_COOKIE['location'];
$activity = $_COOKIE['activity'];
$document = $_COOKIE['document'];

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);

$dompdf = new Dompdf($options);
// Mulai membuat dokumen PDF
$dompdf->loadHtml('<html><body>');

// Membuat tabel untuk data
$html = '<table border="1" cellspacing="0" cellpadding="8">';
$html .= '<tr>';
$html .= '<td style="font-size: 7px;" colspan="2">';
$html .= '<img src="data:image/png;base64,' . base64_encode(file_get_contents('logo.png')) . '" alt="" style="float: left; padding: 3px;" width="50">';
$html .= 'PT. PLN (PERSERO) <br>UID SULTENGGO<br>UP3 GORONTALO';
$html .= '</td>';
$html .= '<th colspan="4" style="font-size: 17px;">SISTEM MANAJEMEN KESELAMATAN DAN KESEHATAN KERJA</th>';
$html .= '<th>';
$html .= '<img src="data:image/png;base64,' . base64_encode(file_get_contents('logo2.png')) . '" alt="" width="40">';
$html .= '</th>';
$html .= '</tr>';
$html .= '<tr><td style="text-align: center;" colspan="4">FORMULIR DAFTAR HADIR</td><td style="font-size: 12px;" colspan="3">NO DOKUMEN: <b>' . $document;
$html .= '</b></td></tr>';
$html .= '<tr style="font-size: 10px; font-family: Arial;">';
$html .= '<td colspan="3">Hari/Tanggal : ' . $today;
$html .= '</td>';
$html .= '<td colspan="4">Lokasi : ' . $location;
$html .= '</td></tr>';
$html .= '<tr><td style="font-size: 10px;" colspan="7">Kegiatan : ' . $activity;
$html .= '</td></tr>';
// $html .= '<tr><td colspan="7">    </td></tr>';
$html .= '</table>';
$html .= '<br><br>';

$html .= '<table border="1" cellspacing="0" cellpadding="8">';
$html .= '<tr>';
$html .= '<th>No</th>';
$html .= '<th>Nama</th>';
$html .= '<th>Unit</th>';
$html .= '<th>Bidang</th>';
$html .= '<th>Email</th>';
$html .= '<th>No Hp</th>';
$html .= '<th>Paraf</th>';
$html .= '</tr>';

// Inisialisasi nomor indeks
$i = 1;

// Lakukan looping melalui data dan tambahkan baris-baris tabel
foreach ($absensi as $ab) {
  $html .= '<tr style="font-size: 15px;">';
  $html .= '<td>' . $i . '</td>';
  $html .= '<td>' . $ab['nm_absen'] . '</td>';
  $html .= '<td>' . $ab['unit'] . '</td>';
  $html .= '<td>' . $ab['bidang'] . '</td>';
  $html .= '<td>' . $ab['email'] . '</td>';
  $html .= '<td>' . $ab['nope'] . '</td>';
  // $html .= '<td>' . $ab['signed'] . '</td>';
  // ...
  $html .= '<td><img src="data:image/png;base64,' . base64_encode(file_get_contents('../absensi/upload/' . $ab['signed'])) . '" alt="mysign" width="100px"></td>';
  // ...

  $html .= '</tr>';

  // Increment nomor indeks
  $i++;
}

$html .= '</table>';
$html .= '<br><br>';

$html .= '<table border="1" cellspacing="0" cellpadding="6" style="margin: 0 auto; width: 100%">';
$html .= '<tr  style="font-size: 11px;">';
$html .= '<td style="text-align: center;"> Sistem Manajemen Keselamatan dan Kesehatan Kerja</>';
// Mengambil nomor halaman saat ini
$nomorHalaman = $dompdf->getCanvas()->get_page_number();
// Mengambil jumlah halaman yang akan dicetak
$jumlahHalaman = $dompdf->getCanvas()->get_page_count();

$html .= '<td style="text-align: center;">Halaman ' . $nomorHalaman . ' dari ' . $jumlahHalaman . '</td>';
$html .= '</tr>';
$html .= '</table>';

$dompdf->loadHtml($html); // Ganti dengan path ke file template Anda


$dompdf->setPaper('A4', 'potrait');
$dompdf->render();

$dompdf->stream('absensi_report.pdf', array('Attachment' => 0));
