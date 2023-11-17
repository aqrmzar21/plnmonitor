<?php
require '../../plugins/dompdf/vendor/autoload.php'; // Lokasi autoload.php sesuaikan dengan proyek Anda
// require '../vendor/autoload.php'; // Lokasi autoload.php sesuaikan dengan proyek Anda
use Dompdf\Dompdf;
use Dompdf\Options;

require 'proses.php';
// $koneksi = koneksi();
$koneksi = koneksi();

if (!isset($_COOKIE['tanggal']) || empty($_COOKIE['tanggal'])) {
  $dateValue = new DateTime();
  // Mendapatkan nilai dari properti date
  $tanggal = $dateValue->format('Y-m-d'); // Mengatur tanggal saat ini
  $tglView = new DateTime();
} else {
  $tanggalTerpilih = $_COOKIE['tanggal'];
  $tanggalObj = new DateTime($tanggalTerpilih);
  $tanggal = $tanggalObj->format('Y-m-d');
  $tglView = new DateTime($tanggalTerpilih);
}
// Misalnya, Anda memiliki array $data yang berisi data yang ingin Anda cetak
$data = mysqli_query($koneksi, "SELECT * FROM t_dataabsen WHERE tanggal = '$tanggal' ORDER BY id_absen DESC");
// $data = (mysqli_query($koneksi, "SELECT * FROM t_dataabsen"));

$formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
$today = $formatter->format($tglView);

// Membaca data dari cookie dan ketika datanya kosong maka akan memberikan nilai default 
$location = $_COOKIE['location'] ?? '';
$activity = $_COOKIE['activity'] ?? '';
$document = $_COOKIE['document'] ?? '';

// Konfigurasi Dompdf
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$options->set('isRemoteEnabled', true);

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
$html .= '<tr><td style="text-align: center;" colspan="4">FORMULIR DAFTAR HADIR</td><td style="font-size: 12px;" colspan="3">NO. DOKUMEN: <b>' . $document;
$html .= '</b></td></tr>';
$html .= '<tr style="font-size: 10px; font-family: Arial;">';
$html .= '<td colspan="3">Hari/Tanggal : ' . $today;
$html .= '</td>';
$html .= '<td colspan="4">Lokasi : ' . $location;
$html .= '</td></tr>';
$html .= '<tr><td style="font-size: 10px;" colspan="7">Kegiatan : ' . $activity;
$html .= '</td></tr>';
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
foreach ($data as $ab) {
  $html .= '<tr style="font-size: 15px;">';
  $html .= '<td>' . $i . '</td>';
  $html .= '<td>' . $ab['nm_absen'] . '</td>';
  $html .= '<td>' . $ab['unit'] . '</td>';
  $html .= '<td>' . $ab['bidang'] . '</td>';
  $html .= '<td>' . $ab['email'] . '</td>';
  $html .= '<td>' . $ab['nope'] . '</td>';
  // $html .= '<td>' . $ab['signed'] . '</td>';
  // ...
  $html .= '<td><img src="data:image/png;base64,' . base64_encode(file_get_contents('upload/' . $ab['signed'])) . '" alt="mysign" width="100px"></td>';
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

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Simpan PDF dalam file
$dompdf->stream('daftaraabsen.pdf');
