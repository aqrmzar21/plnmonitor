<?php
function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'absensiplen');
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

// function login($data)
// {
//   $conn = koneksi();

//   $username = htmlspecialchars($data['username']);
//   $password = htmlspecialchars($data['password']);

//   if ($username == 'admin' && $password == 'admin') {
//     // set sesion
//     $_SESSION['login']= true;

//     // header("Location: dataabsen/absens.php");
//     header("Location: index.php");
//     exit;
//   } else {
//     return [
//       'error' => true,
//       'pesan' => 'username/password Salah'
//     ];
//   }
// }
