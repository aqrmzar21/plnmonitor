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


function subk($data)
{
  $conn = koneksi();

  //pecah database menjadi lebih singkat
  $cols1 = $data['cols1'];
  $colr1 = $data['colr1'];
  $colb1 = $data['colb1'];
  $coli1 = $data['coli1'];
  $colp1 = $data['colp1'];

  $pr_s1 = $data['pr_s1'];
  $pr_r1 = $data['pr_r1'];
  $pr_b1 = $data['pr_b1'];
  $pr_i1 = $data['pr_i1'];
  $pr_p1 = $data['pr_p1'];

  $querypb1 = "INSERT INTO
              pascabayar1 
            VALUES (NULL, '$cols1', '$colr1', '$colb1', '$coli1', '$colp1' );
          ";
  mysqli_query($conn, $querypb1) or die(mysqli_error($conn));
  $querypr1 = "INSERT INTO
              prabayar1 
            VALUES (NULL, '$pr_s1', '$pr_r1', '$pr_b1', '$pr_i1', '$pr_p1' );
          ";
  mysqli_query($conn, $querypr1) or die(mysqli_error($conn));

  // info ke sql ada perubahan
  return mysqli_affected_rows($conn);
}
