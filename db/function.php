<?php
require 'connect.php';

// ini db t_datapengunjung 
function tambah($data)
{
  $conn = koneksi();

  //pecah database menjadi lebih singkat
  $nm_pgnjng = $data['nm_pgnjng'];
  $email = $data['email'];
  $hp = $data['nohp'];
  $jabatan = $data['agenda'];
  $agenda = $data['kprluan'];
  $tanggal = $data['tgl'];
  $waktu = $data['waktu'];

  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  $query = "INSERT INTO
              t_datapengunjung 
            VALUES (NULL, '$nm_pgnjng', '$email', '$hp', '$jabatan', '$agenda', '$tanggal', '$waktu', '$gambar' );
            ";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  echo mysqli_error($conn);

  // info ke sql ada perubahan
  return mysqli_affected_rows($conn);
}

function upload()
{
  $nama_file = $_FILES['gambar']['name'];
  $tipe_file = $_FILES['gambar']['type'];
  $ukuran_file = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmp_file = $_FILES['gambar']['tmp_name'];

  // ketika tidak ada gambar 
  if ($error == 4) {
    echo "<script>
            alert('pilih gambar terlebih dahulu');
          </script>";

    return false;
  }
  // cek ekstensi file
  $daftar_gambar = ['jpg', 'png', 'jpeg'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));

  if (!in_array($ekstensi_file, $daftar_gambar)) {
    echo "<script>
         alert('yang Anda pilih bukan jenis gambar')
        </script>";
    return false;
  }

  // cek tipe file
  if ($tipe_file != 'image/png' && $tipe_file != 'image/jpeg') {
    echo "<script>
            alert('yang Anda pilih bukan gambar')
          </script>";
  }

  // cek ukuran file < 11mb
  if ($ukuran_file > 3000000) {
    echo "<script>
    alert('Ukuran max 3Mb')
  </script>";
    return false;
  }

  // lulus pengecekan
  // siap upload file
  // generate nama file image baru
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;
  // $nama_file_baru .= '.';
  // var_dump($nama_file_baru); die;
  // move_uploaded_file($tmp_file, 'img/' . $nama_file);
  move_uploaded_file($tmp_file, 'img/' . $nama_file_baru);

  return $nama_file_baru;
}


function hapus($id)
{
  $conn = koneksi();

  // menghapus gambar pada folder img 
  $absen = query("SELECT * FROM t_datapengunjung WHERE id_absen = $id");
  unlink('../upload/' . $absen['gambar']);

  mysqli_query($conn, "DELETE FROM t_datapengunjung WHERE id_absen=$id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

// function ubah($data)
// {
//   $conn = koneksi();

//   //pecah database menjadi lebih singkats
//   $id = $data['id_absen'];
//   $nm = htmlspecialchars($data['nm_pgnjng']);
//   $email = htmlspecialchars($data['email']);
//   $hp = htmlspecialchars($data['nohp']);
//   $agenda = htmlspecialchars($data['agenda']);
//   $kprluan = htmlspecialchars($data['kprluan']);
//   $tanggal = htmlspecialchars($data['tgl']);
//   $waktu = htmlspecialchars($data['waktu']);
//   // $gambar = htmlspecialchars($data['gambar']);
//   $gambar = upload();


//   $query = "UPDATE t_datapengunjung SET
//             nm_pgnjng = '$nm', 
//             email = '$email', 
//             nohp = '$hp', 
//             agenda = '$agenda', 
//             kprluan = '$kprluan', 
//             tgl = '$tanggal', 
//             waktu ='$waktu'
//             gambar ='$gambar'
//             WHERE id_absen = $id";

//   mysqli_query($conn, $query) or die(mysqli_error($conn));
//   // info ke sql ada perubahan
//   return mysqli_affected_rows($conn);
// }

function cari($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM t_dataabsen
              WHERE 
              nm_absen LIKE '%$keyword%' OR
              email LIKE '%$keyword%'
              ";

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function edit($data)
{
  $conn = koneksi();

  // Pecah database menjadi lebih singkat
  $id = $data['id_user'];
  $nm = htmlspecialchars($data['nama_pengguna']);
  $level = htmlspecialchars($data['level']);
  $us = htmlspecialchars($data['username']);
  $pw = htmlspecialchars($data['password']);

  // Perbaikan sintaksis query UPDATE
  $query = "UPDATE t_datauser SET
            nama_pengguna = '$nm',
            level ='$level',
            username ='$us',
            password ='$pw'
            WHERE id_user = $id";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  // Info ke SQL ada perubahan
  return mysqli_affected_rows($conn);
}



function login($data)
{
  $conn = koneksi();

  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  if (query("SELECT * FROM t_datauser WHERE username = '$username' && password = '$password'")) {
    // if ($username == 'admin' && $password == 'admin') {
    // set sesion
    $_SESSION['login'] = true;
    $_SESSION['username'] = $username;

    header("Location: ../datauser/infouser.php");
    // header("Location: ../pengaturan/akun.php");
    exit;
  } else {
    return [
      'error' => true,
      'pesan' => 'username/password Salah'
    ];
  }
}


// AWAL LOGIKA PROSES TTD DIGITAL ========================================================================

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


  mysqli_query($conn, "DELETE FROM t_dataabsen WHERE id_absen = $id") or die(mysqli_error($conn));
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


// INNI ABSEN TTD DIGITAL ================================================================================
