<?php
// pangggil koneksi ke database
require '../../db/function.php';

// $absen = query("SELECT * FROM t_dataabsen");
// $absen = query("SELECT * FROM t_datapengunjung");

// tombol pencarian
if (isset($_POST['cari'])) {
  $absen = cari($_POST['keyword']);
}
// Membaca data dari cookie
$location = $_COOKIE['location'] ?? '';
$activity = $_COOKIE['activity'] ?? '';
$document = $_COOKIE['document'] ?? '';

// ============================================================================
// INI ADALAH KODE UNTUK MELIHAT DATA ABSEN TANPA HARUS LOGIN terlebih dahulu 
// =============================================================================
$koneksi = koneksi();
$tanggal_sekarang = date("Y-m-d"); // Mendapatkan tanggal saat ini

?>

<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PLNMeetSign | Data Absen</title>
  <link rel="icon" href="../../dist/img/favicon.ico">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-collapse layout-top-nav">
  <div class="container">

    <!-- Main Header Container -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav navbar-no-expand">
          <!-- SEARCH FORM -->

          <li class="nav-item">
            <a class="nav-link" href="../absensi/signature.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
          </li>

        </ul>
        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav ml-auto">
          <li class="nav-item">
            <a href="../examples/login.php" class="nav-link"><i class="fa fa-power-off" aria-hidden="true"></i> Login</a>
          </li>
          <li class="nav-item">
            <a href="../../index.php" class="nav-link"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
          </li>
        </ul>


      </div>

    </nav>
    <!-- INNER HTML Sidebar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg-white">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Data Absensi</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Daftar Hadir</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content-footer">
        <div class="container">
          <div class="row">
            <div class="col-8">
              <a href="export_word.php" class="btn btn-md btn-primary my-1 mr-2" target="_blank"><i class="mr-1 fas fa-print" aria-hidden="true"></i> Copy Word</a>
              <a href="export_excel.php" class="btn btn-md btn-primary my-1 mr-2" target="_blank"><i class="mr-1 fas fa-print" aria-hidden="true"></i> Copy Excel</a>
              <!-- <a href="export_pdf.php" class="btn btn-md btn-primary my-1 mr-2" target="_blank"><i class="mr-1 fas fa-print" aria-hidden="true"></i> Export PDF</a> -->
            </div>
            <div class="col-4 justify-content-center">
              <form action="" method="POST">
                <button type="submit" name="cari" class="btn btn-block btn-primary col-2 float-right my-1"><i class="fas fa-search"></i></button>
                <input type="search" placeholder="Cari data...." name="keyword" class="form-control col-6 float-right my-1 mr-2">
              </form>
            </div>
            <div class="col">
              <div class="card-header">
                <h4 class="float-left"><strong>FORMULIR DAFTAR HADIR</strong></h4>
                <h5 class="float-right">No. Dokumen : <b><?= $document; ?></b></h5>
              </div>
              <div class="card-header">
                <p>Tanggal : <?= $tanggal_sekarang; ?></p>
                <p>Lokasi : <?= $location; ?></p>
                <p>Kegiatan : <?= $activity; ?></p>
                <!-- HTML -->
              </div>

              <div class="card card-outline card-primary">
                <!-- /.card-body -->
                <div class="card-body">
                  <table class="table">

                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama Lengkap</th>
                        <th>Unit/Perusahaan</th>
                        <th>Jabatan/Bidang</th>
                        <th>No Telp</th>
                        <th>Email</th>
                        <th>Tanda Tangan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $query = "SELECT * FROM t_dataabsen WHERE DATE(tanggal) = '$tanggal_sekarang'";
                      $absensi = mysqli_query($koneksi, $query);
                      $i = 1;
                      if (mysqli_num_rows($absensi) > 0) {
                        while ($ab = mysqli_fetch_array($absensi)) {
                      ?>
                          <tr>
                            <td><?= $i; ?></td>
                            <td><?= $ab['nm_absen']; ?></td>
                            <td><?= $ab['unit']; ?></td>
                            <td><?= $ab['bidang']; ?></td>
                            <td><?= $ab['nope']; ?></td>
                            <td><?= $ab['email']; ?></td>
                            <td><img src="../absensi/upload/<?= $ab['signed']; ?>" alt="mysign" width="150px"></td>
                          </tr>
                      <?php
                          $i++;
                        }
                      } else {
                        echo '<tr><td colspan="7" class="text-danger text-center">Silahkan lakukan Absensi untuk Rapat terlebih dahulu</td></tr>';
                      }
                      ?>

                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->

              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- Default to the left -->
      <div class="container">
        <strong>Copyright &copy; 2023 PT. PLN UP3 KOTA GORONTALO.</strong> All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 4.0
        </div>
      </div>
    </footer>

  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../../plugins/jszip/jszip.min.js"></script>
  <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

</body>

</html>