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


// function tambah signature

function signed($data)
{
  $conn = koneksi();

  $nm_absen = $data['nm_absen'];
  $email = $data['email'];
  $nope = $data['nope'];
  $unit = $data['unit'];
  $bidang = $data['bidang'];
  $tanggal = $data['tanggal'];
  $waktu = $data['waktu'];

  // Mendefinisikan path (lokasi penyimpanan) untuk mengunggah tanda tangan
  $folderPath = "upload/";

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
          echo "<script>
          alert('Tanda Tangan Sukses Diupload');
          </script>";
        } else {
          echo "Gagal menyimpan file.";
        }
      } else {
        echo "Tipe gambar tidak diizinkan.";
      }
    } else {
      echo "Data tanda tangan tidak valid.";
    }
  } else {
    echo "Data tanda tangan tidak ditemukan.";
  }

  // // Mengambil data tanda tangan
  // $image_base64 = $data['signed'];
  // // Ubah ekstensi sesuai dengan tipe gambar yang Anda gunakan (contoh: PNG)
  // $ext = 'png';

  // // Menghasilkan nama berkas dengan ekstensi
  // $file = uniqid() . '.' . $ext;

  // // Menggabungkan direktori upload dengan nama berkas
  // $fullPath = "upload/" . $file;

  // // Menyimpan berkas tanda tangan
  // file_put_contents($fullPath, base64_decode($image_base64));

  $query = "INSERT INTO 
            t_dataabsen 
            VALUES (NULL, '$nm_absen', '$email', '$nope', '$unit', '$bidang', '$tanggal', '$waktu', '$fileName');
              ";

  mysqli_query($conn, $query);
  echo mysqli_error($conn);

  // info ke sql ada perubahan
  return mysqli_affected_rows($conn);
}



function del($id)
{
  $conn = koneksi();

  // menghapus gambar di folder
  $absen = query("SELECT * FROM t_dataabsen WHERE id_absen = $id");
  unlink('../upload/' . $absen['signed']);


  mysqli_query($conn, "DELETE FROM t_dataabsen WHERE id_absen =$id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();

  //pecah database menjadi lebih singkats
  $id = $data['id_absen'];
  $nm = htmlspecialchars($data['nm_absen']);
  $email = htmlspecialchars($data['email']);
  $hp = htmlspecialchars($data['nope']);
  $agenda = htmlspecialchars($data['unit']);
  $kprluan = htmlspecialchars($data['bidang']);
  $tanggal = htmlspecialchars($data['tanggal']);
  $waktu = htmlspecialchars($data['waktu']);
  // $gambar = ($data['signed']);
  // $gambar = upload();


  $query = "UPDATE t_dataabsen SET
            nm_absen = '$nm', 
            email = '$email', 
            nope = '$hp', 
            unit = '$agenda', 
            bidang = '$kprluan', 
            tanggal = '$tanggal', 
            waktu ='$waktu'
            WHERE id_absen = $id";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  // info ke sql ada perubahan
  return mysqli_affected_rows($conn);
}


// ========================================== filter pencarian berdasarkan tanggal ===========

// ========================================== filter pencarian berdasarkan tanggal ===========