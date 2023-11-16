<?php
require '../../db/function.php';
require '../../plugins/dompdf/vendor/autoload.php'; // Lokasi autoload.php sesuaikan dengan proyek Anda


$absen = query("SELECT * FROM t_datapengunjung");

if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
          alert('data berhasil ditambahkan');
          </script>";
  } else {
    echo "<script>
          alert('data gagal ditambahkan');
          </script>";
  }
}

// tombol pencarian
if (isset($_POST['cari'])) {
  $absen = cari($_POST['keyword']);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PLNMeetSign | Absen</title>
  <link type="icon" rel="stylesheet" href="../../dist/img/AsminLTELogo.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <!-- <script type="text/javascript" src="../../plugins/flashcanvas.js"></script> -->

</head>

<body class="hold-transition layout-top-nav">
  <div class="container">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
        <div class="container">
          <a href="../../index3.html" class="navbar-brand">
            <!-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
            <span class="brand-text font-weight-light">PLNMonitor</span>
          </a>

          <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="../../index.php" class="nav-link">Login</a>
              </li>
              <li class="nav-item">
                <a href="signature.php" class="nav-link">Tambah</a>
              </li>
            </ul>


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
              <!-- Navbar Search -->
              <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                  <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                  <form class="form-inline">
                    <div class="input-group input-group-sm">
                      <input class="form-control form-control-navbar" name="keyword" type="search" placeholder="Search" aria-label="Search">
                      <div class="input-group-append">
                        <button class="btn btn-navbar" name="cari" type="submit">
                          <i class="fas fa-search"></i>
                        </button>
                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>

              <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
              </li>

            </ul>
          </div>

        </div>
      </nav>
      <!-- /.navbar -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container">

            <div class="row mb-2">
              <div class="col-6">
                <h1 class="m-0"> Absensi <small>Data</small></h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Form</a></li>
                  <li class="breadcrumb-item active">Absensi</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="alert alert-primary alert-dismissible">
              <h5><i class="icon fas fa-info"></i> Info!</h5>
              Silahkan masukan data Diri anda pada form Absen di bawah.
              <h3 class="text-xs">Silahkan Refresh ulang halaman untuk melihat Data terbaru setelah di tambahkan.</h3>
            </div>
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
          <div class="container">
            <div class="row">

              <div class="col-md-5">

                <!-- Data Absensi berhasil -->
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h5 class="card-title m-0">Absensi Berhasil</h5>

                    <form action="" method="POST">
                      <input type="search" placeholder="Cari data...." name="keyword" class="col-sm-4 form-control ml-auto">
                      <button type="submit" name="cari" class="btn btn-block btn-primary col-sm-1 ml-auto"><i class="fas fa-search"></i></button>

                  </div>
                  <div class="card-body p-0">
                    <table class="table table-sm">

                      <tr>
                        <th style="width: 30px">#</th>
                        <th>Nama</th>
                        <th style="width: 20px">Status</th>
                      </tr>

                      <tbody id="absensiBerhasil">

                      </tbody>

                    </table>
                    </form>
                  </div>
                  <!-- /.card-body -->
                </div>

              </div>
              <!-- /.col-md-4 -->

              <div class="col-md-7">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h5 class="card-title m-0">Form Data</h5>
                  </div>
                  <!-- register-body -->
                  <div class="register-card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nm_pgnjng" placeholder="Full name" autofocus required>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-user"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <i class="bi bi-envelope"></i>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="number" class="form-control" name="nohp" placeholder="No HP" required>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                            </svg>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="agenda" placeholder="Unit/Perusahaan" required>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="kprluan" placeholder="Jabatan/Bidang" required>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Hari, Tanggal" required>
                        <div class="input-group-append">
                          <div class="input-group-text">
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="time" class="form-control" name="waktu" placeholder="Waktu" required>
                        <div class="input-group-append">
                          <div class="input-group-text">
                          </div>
                        </div>
                      </div>
                      <!-- <div class="input-group mb-3">
                        <input type="file" class="form-control" name="gambar" placeholder="Gambar" required>
                        <div class="input-group-append">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                        </div>
                      </div> -->

                      <div class="input-group mb-4">
                        <div class="custom-file">
                          <!-- <input type="file" class="custom-file-input" id="exampleInputFile" name="gambar"> -->
                          <!-- <label class="custom-file-label" for="exampleInputFile">Choose file</label> -->
                        </div>
                        <div class="input-group-append">
                          <!-- <span class="input-group-text">Upload</span> -->
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-4">
                          <button type="submit" name="tambah" class="btn btn-success btn-block">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.register-body -->
                </div>
              </div>

              <form method="POST" action="proses.php">
                <label for="tanggal">Tanggal:</label>
                <input type="date" id="tanggal" name="tanggal">
                <input type="submit" value="Kirim">
              </form>



              <div class="col-12">
                <div class="card card-primary collapsed-card">
                  <div class="card-header">
                    <h3 class="card-title">Data Kehadiran</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                      </button>
                    </div>
                    <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="box">
                      <!-- <div class="box-body"> -->
                      <table id="example1" class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th width="5px">#</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>No Handphone</th>
                            <th>Unit</th>
                            <th>Jabatan/Bidang</th>
                            <th>Tanggal Rapat</th>
                            <th>Waktu Rapat</th>
                            <th width="20px">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1;
                          foreach ($absen as $p) : ?>
                            <tr>
                              <td><?= $i++; ?></td>
                              <td><?= $p['nm_pgnjng']; ?></td>
                              <td><?= $p['email']; ?></td>
                              <td><?= $p['nohp']; ?></td>
                              <td><?= $p['agenda']; ?></td>
                              <td><?= $p['kprluan']; ?></td>
                              <td><?= $p['tgl']; ?></td>
                              <td><img src="img/<?= $p['gambar']; ?>" alt="" width="130px"></td>
                              <td>
                                <div class="text-center">
                                  <a href="proses/editabsen.php?id=<?php echo $p['id_absen']; ?>" class="btn btn-default btn-xs btn-flat"><i class="fas fa-edit"></i></a>
                                  <a href="proses/eraserabsen.php?id=<?= $p['id_absen']; ?>" class="btn btn-danger btn-xs btn-flat" onclick="return confirm('apakah anda yakin?');"><i class="fa fa-trash"></i></a>
                                </div>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                      <!-- </div> -->
                      <!-- /.box-body -->
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- ./div col-12  -->
            </div>
            <!-- /.row -->

          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
          4.0
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2023 PT. PLN UP3 KOTA GORONTALO</strong> All rights reserved.
      </footer>

    </div>
    <!-- ./wrapper -->
  </div>

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="../../plugins/toastr/toastr.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

  <script src="../../plugins/jSignature.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#signature").jSignature()
    })

    setInterval(() => {
      $.get("http://localhost/plnmonitor/get_absen.php", function(data, status) {
        let rows = ''
        for (let i = 0; i < data.length; i++) {
          const row = `
            <tr>
              <td>${i+1}</td>
              <td>${data[i].nm_pgnjng}</td>
              <td>${data[i].agenda}</td>
            </tr>
          `
          rows += row
        }
        $("#absensiBerhasil").html(rows)
      });
    }, 1000);

    // JavaScript untuk menampilkan pesan dari PHP dalam alert
    <?php
    if (isset($_POST['tanggal'])) {
      echo "alert('Anda memilih tanggal: " . $tanggal_indonesia . "');";
    }


    // ========================================== filter pencarian berdasarkan tanggal ===========
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $tanggal = $_POST["tanggal"];

      // // Set locale ke bahasa Indonesia
      // setlocale(LC_TIME, 'id_ID');

      // // Set locale ke bahasa Indonesia
      // setlocale(LC_TIME, 'id_ID');

      // // Format tanggal dalam bahasa Indonesia
      // $timestamp = strtotime($tanggal); // Ubah string tanggal ke timestamp
      // $tanggal_indonesia = ucfirst(strftime('%A, %d %B %Y', $timestamp)); // ucfirst untuk mengkapitalkan huruf pertama hari


      // echo "<script>alert('Anda memilih tanggal: $tanggal_indonesia');</script>";
      // }

      $tanggal_indonesia = tampilkanTanggalIndonesia($tanggal);

      // Mengirim hasil ke JavaScript
      echo "
  <script>
  alert('Anda memilih tanggal: $tanggal_indonesia');
  window.location.href = 'absen.php';

  </script>
  ";
    }

    // Fungsi untuk menampilkan tanggal dalam bahasa Indonesia
    function tampilkanTanggalIndonesia($tanggal)
    {
      $tanggal_array = explode('-', $tanggal);
      $tahun = $tanggal_array[0];
      $bulan = tampilkanNamaBulanIndonesia($tanggal_array[1]);
      $hari = tampilkanHariIndonesia(date('N', strtotime($tanggal)));

      return "$hari, {$tanggal_array[2]} $bulan $tahun";
    }

    // Fungsi untuk mengganti nama bulan dalam bahasa Indonesia
    function tampilkanNamaBulanIndonesia($bulan)
    {
      $nama_bulan = [
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
      ];

      return $nama_bulan[$bulan];
    }

    // Fungsi untuk mengganti nama hari dalam bahasa Indonesia
    function tampilkanHariIndonesia($hari)
    {
      $nama_hari = [
        '1' => 'Senin',
        '2' => 'Selasa',
        '3' => 'Rabu',
        '4' => 'Kamis',
        '5' => 'Jumat',
        '6' => 'Sabtu',
        '7' => 'Minggu',
      ];

      return $nama_hari[$hari];
    }

    // ========================================== filter pencarian berdasarkan tanggal ===========

    ?>
  </script>
</body>

</html>