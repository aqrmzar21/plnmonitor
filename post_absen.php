<?php
function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'plnmonitoring');
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  // jika datanya hanya 1
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }


  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

$conn = koneksi();

$nm_absen = $_POST['nm_absen'];
$email = $_POST['email'];
$nope = $_POST['nope'];
$unit = $_POST['unit'];
$bidang = $_POST['bidang'];
$tanggal = $_POST['tanggal'];
$waktu = $_POST['waktu'];

// Mendefinisikan path (lokasi penyimpanan) untuk mengunggah tanda tangan
$folderPath = "pages/absensi/upload/";

// Memeriksa apakah data tanda tangan (base64) dikirim melalui POST request
if (isset($_POST['signed'])) {
  $signedData = $_POST['signed'];

  // Validasi tipe data tanda tangan (pastikan itu adalah data base64 gambar)
  if (preg_match('/^data:image\/(png|jpeg|jpg|gif);base64,/', $signedData)) {
    // Memecah data tanda tangan base64 menjadi tipe gambar dan data gambar itu sendiri
    list($imageType, $imageData) = explode(";base64,", $signedData);

    // Mengambil ekstensi tipe gambar
    $imageType = str_replace('data:image/', '', $imageType);

    // Validasi tipe gambar (pastikan itu adalah tipe gambar yang diizinkan)
    $allowedImageTypes = ['png', 'jpeg', 'jpg', 'gif'];
    if (in_array($imageType, $allowedImageTypes)) {
      // Membentuk data gambar dari base64 ke bentuk biner
      $imageData = base64_decode($imageData);

      // Membuat nama file yang unik dengan ekstensi sesuai tipe gambar
      $fileName = uniqid() . '.' . $imageType;
      $filePath = $folderPath . $fileName;

      // Menyimpan data gambar ke file yang telah dibuat
      if (file_put_contents($filePath, $imageData)) {

        $query = "INSERT INTO 
            t_dataabsen 
            VALUES (NULL, '$nm_absen', '$email', '$nope', '$unit', '$bidang', '$tanggal', '$waktu', '$fileName');
              ";

        mysqli_query($conn, $query);

        if (mysqli_affected_rows($conn) == 1) {
          // info ke sql ada perubahan
          echo json_encode([
            "success" => true,
            "message" => "Data berhasil ditambahkan.",
            "data" => (object) $_POST
          ]);
        } else {
          echo json_encode(mysqli_error($conn));
        }
      } else {
        echo json_encode([
          "success" => false,
          "message" => "Gagal menyimpan file.",
          "data" => (object) []
        ]);
      }
    } else {
      echo json_encode([
        "success" => false,
        "message" => "Tipe gambar tidak diizinkan.",
        "data" => (object) []
      ]);
    }
  } else {
    echo json_encode([
      "success" => false,
      "message" => "Data tanda tangan tidak valid.",
      "data" => (object) []
    ]);
  }
} else {
  echo json_encode([
    "success" => false,
    "message" => "Data tanda tangan tidak ditemukan.",
    "data" => (object) []
  ]);
}
