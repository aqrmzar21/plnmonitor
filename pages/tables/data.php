<?php
// pangggil koneksi ke database
require '../../db/function.php';

// $absen = query("SELECT * FROM t_dataabsen");

// ============================================================================
// INI ADALAH KODE UNTUK MELIHAT DATA ABSEN TANPA HARUS LOGIN terlebih dahulu 
// =============================================================================


?>

<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMPLN | Data Absen</title>
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
    <header class="main-header navbar navbar-expand navbar-light navbar-white">

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

          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">PerKategori</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="#" class="dropdown-item">Internal </a></li>
              <li><a href="#" class="dropdown-item">External</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="../examples/login.php" class="nav-link">Login</a>
          </li>
          <li class="nav-item">
            <a href="../../index.php" class="nav-link"><i class="fa fa-home" aria-hidden="true"></i></a>
          </li>
        </ul>


      </div>

    </header>
    <!-- INNER HTML Sidebar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
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
                <li class="breadcrumb-item active">DataTables</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content-footer">
        <div class="container">
          <div class="row">
            <div class="col-10 mx-auto">

              <div class="card">
                <!-- /.card-body -->
                <?php
                $tanggal_sekarang = date("Y-m-d"); // Mendapatkan tanggal saat ini

                $query = "SELECT * FROM t_dataabsen WHERE DATE(tanggal) = '$tanggal_sekarang'";
                $absensi = query($query);

                ?>
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
                      if (count($absensi) > 0) {
                        $i = 1;
                        foreach ($absensi as $ab) :
                      ?>
                          <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $ab['nm_absen']; ?></td>
                            <td><?= $ab['unit']; ?></td>
                            <td><?= $ab['bidang']; ?></td>
                            <td><?= $ab['nope']; ?></td>
                            <td><?= $ab['email']; ?></td>
                            <td><img src="../absensi/upload/<?= $ab['signed']; ?>" alt="mysign" width="150px"></td>
                          </tr>
                      <?php
                        endforeach;
                      } else {
                        echo '<tr><td colspan="7">Tidak ada data yang tersedia</td></tr>';
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