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

  if (query("SELECT * FROM t_datauser WHERE username = '$username' && password = '$password'")) {
    // if ($username == 'admin' && $password == 'admin') {
    // set sesion
    $_SESSION['login'] = true;

    // header("Location: dataabsen/absens.php");
    header("Location: ../../index.php");
    exit;
  } else {
    return [
      'error' => true,
      'pesan' => 'username/password Salah'
    ];
  }
}
