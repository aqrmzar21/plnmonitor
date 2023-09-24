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

function ubah($data)
{
  $conn = koneksi();

  //pecah database menjadi lebih singkats
  $id = $data['id_absen'];
  $nm = htmlspecialchars($data['nm_pgnjng']);
  $email = htmlspecialchars($data['email']);
  $hp = htmlspecialchars($data['nohp']);
  $agenda = htmlspecialchars($data['agenda']);
  $kprluan = htmlspecialchars($data['kprluan']);
  $tanggal = htmlspecialchars($data['tgl']);
  $waktu = htmlspecialchars($data['waktu']);
  // $gambar = htmlspecialchars($data['gambar']);
  $gambar = upload();


  $query = "UPDATE t_datapengunjung SET
            nm_pgnjng = '$nm', 
            email = '$email', 
            nohp = '$hp', 
            agenda = '$agenda', 
            kprluan = '$kprluan', 
            tgl = '$tanggal', 
            waktu ='$waktu'
            gambar ='$gambar'
            WHERE id_absen = $id";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  // info ke sql ada perubahan
  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM t_datapengunjung 
              WHERE 
              nm_pgnjng LIKE '%$keyword%' OR
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

  //pecah database menjadi lebih singkats
  $id = $data['id_user'];
  $nm = htmlspecialchars($data['nm_pengguna']);
  $tanggal = htmlspecialchars($data['nip']);
  $level = htmlspecialchars($data['level']);
  $gambar = htmlspecialchars($data['username']);
  $pw = htmlspecialchars($data['password']);

  $query = "UPDATE t_datauser SET
            nm_pengguna = '$nm',
            nip = '$tanggal', 
            level ='$level',
            username ='$gambar'
            password ='$pw'
            WHERE id_absen = $id";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  // info ke sql ada perubahan
  return mysqli_affected_rows($conn);
}

function login($data)
{
  $conn = koneksi();

  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  if ($username == 'admin' && $password == 'admin') {
    // set sesion
    $_SESSION['login']= true;

    // header("Location: dataabsen/absens.php");
    header("Location: index.php");
    exit;
  } else {
    return [
      'error' => true,
      'pesan' => 'username/password Salah'
    ];
  }
}
