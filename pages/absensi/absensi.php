<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: ../examples/login.php");
  exit;
}

if (isset($_POST['tanggal'])) {
  $tanggalTerpilih = $_POST['tanggal'];
  // Menyimpan tanggal ke dalam cookie selama 1 hari
  setcookie("tanggal", $tanggalTerpilih, time() + (86400 * 1), "/"); // 86400 = 1 hari
}

require 'proses.php';
$username = $_SESSION['username'];
$koneksi = koneksi();

// print_r($_COOKIE['tanggal']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PLNMeetSign | Data Absensi</title>
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

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
      <!-- <nav class="main-header navbar navbar-expand-md navbar-light bg-white"> -->
      <div class="container">
        <h3 class="brand-text">
          <span class="text-blue mt-1 pt-2"><strong>Meet</strong>Signature</span>
        </h3>


        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
          </ul>

        </div>
        <!-- ./div navbar -->

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item">
            <a href="signature.php" class="nav-link"><i class="fa fa-id-badge mr-1" aria-hidden="true"></i> Daftar Absen</a>
          </li>
          <!-- Messages Dropdown Menu -->
          <li class="nav-item">
            <a href="../../index.php" class="nav-link"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
          </li>
          <!-- USER FORM -->
          <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
              <i class="user-image image-circle fa fa-user-circle" aria-hidden="true"></i>
              <!-- <span class="d-none d-md-inline"></span> -->
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <!-- User image -->
              <li class="user-header bg-dark">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                <?php $data = mysqli_query($koneksi, "SELECT * FROM t_datauser WHERE username = '$username'");
                while ($d = mysqli_fetch_array($data)) { ?>
                  <p>
                    <?= $d['nama_pengguna']; ?>
                    <small><?= $username; ?></small>
                  </p>
                <?php } ?>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <a href="../datauser/infouser.php" class="btn btn-dark btn-sm"><i class="fa fa-cogs" aria-hidden="true"></i> Setting</a>
                <a href="../examples/logout.php" class="btn btn-dark btn-sm float-right"><i class="fa fa-power-off" aria-hidden="true"></i> Log out</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg-white">
      <!-- Content Header (Page Navbar) -->
      <section class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <!-- <h3 class="m-0"> Data Absensi <small></small></h3> -->
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

      <!-- Content Header (Page Footer) -->
      <section class="content-footer">
        <div class="container">

          <div class="card-body">
            <div class="row">
              <div class="col-8">
                <form method="POST" class="form-inline">
                  <div class="form-group">
                    <select name="tanggal" class="custom-select form-control-border border-width-2">
                      <?php
                      $resultFilter = mysqli_query($koneksi, "SELECT DISTINCT tanggal FROM t_dataabsen ORDER BY tanggal DESC");
                      while ($row = mysqli_fetch_assoc($resultFilter)) {
                        $tanggal = date('d F Y', strtotime($row['tanggal'])); // Ubah ke format tanggal dalam bahasa Indonesia
                        echo "<option value='" . $row['tanggal'] . "'>" . $tanggal . "</option>";
                      }
                      ?>
                    </select>
                    <button type="submit" id="saveButton" name="filter_tgl" class="btn btn-secondary mx-2">Filter</button>
                  </div>
                </form>

              </div>
              <div class="col-4">
                <a href="printdomdf.php" class="btn btn-default float-right">
                  <i class="fa fa-print" aria-hidden="true"> Print PDF </i>
                </a>

              </div>
            </div>

          </div>
          <!-- /.div card-body -->
          <button class="btn btn-xs btn-primary mt-3 float-right" onclick="resetTanggal()">Reset</button>
          <button class="btn btn-xs float-right mt-3 mx-2">
            <p class="float-right">Tanggal :
              <?php
              // Mendapatkan tanggal saat ini
              $tanggal_sekarang = date("Y-m-d");

              // Memeriksa apakah cookie 'tanggal' sudah diatur
              if (isset($_COOKIE['tanggal'])) {
                // Jika cookie sudah diatur, mengambil nilai dari cookie
                $tgl_views = $_COOKIE['tanggal'];
              } else {
                // Jika cookie belum diatur, menggunakan tanggal sekarang sebagai nilai default
                $tgl_views = $tanggal_sekarang;
              }

              ?>
              <span id="displaytanggal"></span>
            </p>
          </button>
          <script>
            function resetTanggal() {
              document.cookie = "tanggal=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            }
          </script>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container">
          <!-- <div class="row"> -->

          <!-- col-12 -->
          <!-- <div class="col-md-12"> -->
          <!-- <div class="card card-secondary card-outline"> -->
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
                    <th>Tanggal Rapat</th>
                    <!-- <th>Waktu Rapat</th> -->
                    <th>Signature</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (isset($_POST['filter_tgl'])) {
                    $tanggalPilihan = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
                    $tanggalTerpilih = $tanggalPilihan;

                    $absensi = mysqli_query($koneksi, "SELECT * FROM t_dataabsen WHERE tanggal = '$tanggalTerpilih' ORDER BY id_absen DESC");
                    // print_r($tanggalTerpilih);
                  } else {
                    $absensi = mysqli_query($koneksi, "SELECT * FROM t_dataabsen ORDER BY id_absen ASC");
                  }

                  $i = 1;
                  while ($ab = mysqli_fetch_assoc($absensi)) :
                  ?>
                    <tr>
                      <td><?= $i++; ?>.</td>
                      <td><?= $ab['nm_absen']; ?></td>
                      <td><?= $ab['email']; ?></td>
                      <td><?= $ab['nope']; ?></td>
                      <td><?= $ab['unit']; ?></td>
                      <td><?= $ab['bidang']; ?></td>
                      <td><?= $ab['tanggal']; ?></td>
                      <td><img src="upload/<?= $ab['signed']; ?>" alt="mysign" width="200px"></td>
                      <td>
                        <div>
                          <a href="proses/ubahabsen.php?id=<?php echo $ab['id_absen']; ?>" class="btn btn-xs btn-default btn-flat"><i class="fas fa-edit"></i></a>
                          <a href="proses/hapusabsen.php?id=<?= $ab['id_absen']; ?>" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash" onclick="return confirm('apakah anda yakin?');"></i></a>
                        </div>
                      </td>
                    </tr>
                  <?php
                  endwhile;
                  ?>
                </tbody>
              </table>

              <!-- </div> -->
            </div>
            <!-- /.box-body -->

          </div><!-- /.table -->
          <!-- </div>/.card -->

          <!-- </div> -->
          <!-- ./ col-12  -->

          <!-- </div> -->
          <!-- /.row -->

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
    <!-- Main Footer -->
    <section class="main-footer">
      <!-- Default to the left -->
      <div class="container">
        <strong>Copyright &copy; 2023 PT. PLN UP3 KOTA GORONTALO.</strong> All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 4.0
        </div>
      </div>
    </section>

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
    // Fungsi untuk menampilkan tanggal
    function displayTanggal() {
      // Mengambil nilai dari cookie
      var tanggalCookie = getCookie("tanggal");

      // Menampilkan data dari cookie ke dalam elemen HTML
      $("#displaytanggal").html(tanggalCookie);
    }

    // Memanggil fungsi saat halaman dimuat
    $(document).ready(function() {
      displayTanggal();
    });

    // Memanggil fungsi saat tombol diklik
    $("#saveButton").click(function() {
      displayTanggal();
    });

    function getCookie(name) {
      var nameEQ = name + "=";
      var ca = document.cookie.split(';');
      for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
      }
      return " ";
    }
  </script>

  <!-- MODAL ============================================================================= -->
  <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Caption</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="">Lokasi</label>
                <input type="text" id="inputLocation" class="form-control" placeholder="Enter location info">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">No. Dokumen</label>
                <input type="text" id="inputDocument" class="form-control" placeholder="Enter document info" style="text-transform: uppercase">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label for="">Kegiatan</label>
                <input type="text" id="inputActivity" class="form-control" placeholder="Enter activity info">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="saveButton">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal =========================================================================== -->


</body>

</html>