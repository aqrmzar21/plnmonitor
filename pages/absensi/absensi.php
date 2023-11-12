<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: ../examples/login.php");
  exit;
}

require 'proses.php';
$koneksi = koneksi();
// $absensi = query("SELECT * FROM t_dataabsen");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMPLN | Data Absensi</title>
  <link rel="icon" href="../../dist/img/icons.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
</head>

<body class="hold-transition sidebar-collapse layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">
        <h3 class="brand-text"><b>PLN</b>Monitor</h3>


        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <!-- <a href="signature.php" class="nav-link">Back</a> -->
            </li>

          </ul>

        </div>
        <!-- ./div navbar -->

        <!-- SEARCH FORM -->
        <!-- <form class="form-inline ml-0 ml-md-3">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </form> -->


        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <!-- Messages Dropdown Menu -->
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <!-- Notifications Dropdown Menu -->
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg-white">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h3 class="m-0"> Data Absensi <small></small></h3>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Absensi</a></li>
                <!-- <li class="breadcrumb-item"><a href="printpdf.php">DOMPDF</a></li> -->
                <li class="breadcrumb-item active">Edit Data</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content-header -->
      <div class="content-footer">
        <div class="container">
          <div class="row">
            <div class="col-8 mb-4">
              <form method="post" class="form-inline">
                <input type="date" name="tgl_mulai" class="form-control">
                <input type="date" name="tgl_selesai" class="form-control ml-3">
                <button type="submit" name="filter_tgl" class="btn btn-secondary ml-3">Filter</button>
                <span class="ml-3">
                  <!-- <a href="printphpexcel.php" class="btn btn-gray"><i class="fa fa-print" aria-hidden="true"> Print Excel </i></a> -->
                </span>
              </form>
              <?php
              if (isset($_POST['filter'])) {
                $tgl_mulai = mysqli_real_escape_string($koneksi, $_POST['tgl_mulai']);
                $tgl_selesai = mysqli_real_escape_string($koneksi, $_POST['tgl_selesai']);
                echo "Mulai" . $tgl_mulai . "Sampai" . $tgl_selesai;
              }
              ?>
            </div>
            <div class="col-4 ml-auto">
              <a href="printdomdf.php" class="btn btn-default float-right">
                <i class="fa fa-print" aria-hidden="true"> Print PDF </i>
              </a>
              <!-- <a href="printexcel.php" class="btn btn-primary mr-3">
                <i class="fa fa-print" aria-hidden="true"> Print Excel </i>
              </a> -->
            </div>

          </div>
        </div>
      </div>

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="row">

            <!-- col-12 -->
            <div class="col-md-12">
              <div class="card card-secondary card-outline">
                <div class="card-body">
                  <div class="box" id="demo_info">
                    <table id="example" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama Lengkap</th>
                          <th>Email</th>
                          <th>No Handphone</th>
                          <th>Unit</th>
                          <th>Jabatan/Bidang</th>
                          <!-- <th>Tanggal Rapat</th> -->
                          <!-- <th>Waktu Rapat</th> -->
                          <th>Signature</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        if (isset($_POST['filter_tgl'])) {
                          $tgl_mulai = mysqli_real_escape_string($koneksi, $_POST['tgl_mulai']);
                          $tgl_selesai = mysqli_real_escape_string($koneksi, $_POST['tgl_selesai']);
                          $absensi = mysqli_query($koneksi, "SELECT * FROM t_dataabsen WHERE tanggal BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
                        } else {
                          $absensi = mysqli_query($koneksi, "SELECT * FROM t_dataabsen ORDER BY id_absen DESC");
                        }

                        if ($absensi) {
                          $absensi = mysqli_fetch_all($absensi, MYSQLI_ASSOC);

                          $i = 1;
                          foreach ($absensi as $ab) {
                        ?>
                            <tr>
                              <td><?= $i++; ?>.</td>
                              <td><?= $ab['nm_absen']; ?></td>
                              <td><?= $ab['email']; ?></td>
                              <td><?= $ab['nope']; ?></td>
                              <td><?= $ab['unit']; ?></td>
                              <td><?= $ab['bidang']; ?></td>
                              <!-- <td><?= $ab['tanggal']; ?></td> -->
                              <!-- <td><?= $ab['waktu']; ?></td> -->
                              <td><img src="upload/<?= $ab['signed']; ?>" alt="mysign" width="200px"></td>
                              <td>
                                <div>
                                  <a href="proses/ubahabsen.php?id=<?php echo $ab['id_absen']; ?>" class="btn btn-xs btn-default btn-flat"><i class="fas fa-edit"></i></a>
                                  <a href="proses/hapusabsen.php?id=<?= $ab['id_absen']; ?>" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash" onclick="return confirm('apakah anda yakin?');"></i></a>
                                </div>
                              </td>
                            </tr>
                        <?php
                          };
                        } else {
                          echo "Query gagal dieksekusi: " . mysqli_error($koneksi);
                        }
                        ?>

                      </tbody>
                    </table>
                    <!-- </div> -->
                  </div>
                  <!-- /.box-body -->

                </div><!-- /.table -->
              </div><!-- /.card -->

            </div>
            <!-- ./ col-12  -->

          </div>
          <!-- /.row -->

        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

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

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../../plugins/jszip/jszip.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script>
    $(function() {
      $('#example').DataTable({
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
      });
    });
  </script>

</body>

</html>