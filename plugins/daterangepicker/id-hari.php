<?php
$today = new DateTime();


$dayNames = array(
  'Sunday' => 'Minggu',
  'Monday' => 'Senin',
  'Tuesday' => 'Selasa',
  'Wednesday' => 'Rabu',
  'Thursday' => 'Kamis',
  'Friday' => 'Jumat',
  'Saturday' => 'Sabtu'
);

$englishDayName = date('l'); // Dapatkan nama hari dalam bahasa Inggris
$hari = $dayNames[$englishDayName];

$monthNames = array(
  'January' => 'Januari',
  'February' => 'Februari',
  'March' => 'Maret',
  'April' => 'April',
  'May' => 'Mei',
  'June' => 'Juni',
  'July' => 'Juli',
  'August' => 'Agustus',
  'September' => 'September',
  'October' => 'Oktober',
  'November' => 'November',
  'December' => 'Desember'
);

$englishMonthName = date('F'); // Dapatkan nama bulan dalam bahasa Inggris
$bulan = $monthNames[$englishMonthName];

$monthName = array(
  'Jan' => 'Jan',
  'Feb' => 'Feb',
  'Mar' => 'Mar',
  'Apr' => 'Apr',
  'May' => 'Mei',
  'Jun' => 'Jun',
  'Jul' => 'Jul',
  'Aug' => 'Ags',
  'Sep' => 'Sep',
  'Oct' => 'Okt',
  'Nov' => 'Nov',
  'Dec' => 'Des'
);

$englishMonthNames = date('M'); // Dapatkan nama bulan dalam bahasa Inggris
$moon = $monthName[$englishMonthNames];
