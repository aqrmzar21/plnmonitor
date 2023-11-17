<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: ../examples/login.php");
  exit;
}

require '../../db/function.php';
require '../../plugins/dompdf/vendor/autoload.php'; // Lokasi autoload.php sesuaikan dengan proyek Anda
$koneksi = koneksi();
$tanggal_sekarang = date("Y-m-d");

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
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
      <!-- <nav class="main-header navbar navbar-expand-md navbar-light bg-white"> -->
      <div class="container">
        <h3 class="brand-text">
          <span class="text-white mt-1 pt-2"><strong>Meet</strong>Signature</span>
        </h3>


        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
          </ul>

        </div>
        <!-- ./div navbar -->

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <li class="nav-item">
            <a href="absen.php" class="nav-link"><i class="fa fa-address-book mr-1" aria-hidden="true"></i> Form Absen</a>
          </li>
          <!-- Messages Dropdown Menu -->
          <li class="nav-item">
            <a href="absensi.php" class="nav-link"><i class="fa fa-id-badge mr-1" aria-hidden="true"></i> Daftar Absen</a>
          </li>
          <!-- Notifications Dropdown Menu -->
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
      <!-- Content Header (Page header) -->
      <section class="content-header">
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
          <div class="alert alert-secondary alert-dismissible">
            <h5><i class="icon fas fa-info"></i> Info!</h5>
            <b>Silahkan masukan keterangan yang di perlukanan di bawah.</b> <span class="text-md">Tambahakan lokasi, no dokumen, dan keterangan kegiatan untuk di tambahkan.</span>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content-header -->

      <!-- Main content -->
      <!-- <section class="content-footer"> -->
      <section class="container">
        <div class="row">
          <div class="col-12">
            <a href="../tables/export_word.php" class="btn btn-md btn-secondary float-right my-3" target="_blank"><i class="mr-1 fas fa-print" aria-hidden="true"></i> Export Word</a>
            <a href="print-pdf.php" class="btn btn-md btn-secondary float-right my-3 mr-2" target="_blank"><i class="mr-1 fas fa-print" aria-hidden="true"></i> Export PDF</a>
            <button type="button" class="btn btn-md btn-secondary my-3 mr-2" data-toggle="modal" data-target="#modal-lg">
              <i class="mr-1 far fa-plus-square" aria-hidden="true"></i>
              Add Informasi
            </button>
          </div>
          <div class="col-12">
            <div class="card-header">
              <h4 class="float-left"><strong>FORMULIR DAFTAR HADIR</strong></h4>
              <h5 class="float-right">No. Dokumen : <b><span id="displayDocument"></span></b></h5>
            </div>
            <div class="card-header">
              <p class="float-right"><i>Tanggal</i> : <?= $tanggal_sekarang; ?></p>
              <p><i>Lokasi</i> :
                <span id="displayLocation"></span>
              </p>
              <button class="btn btn-xs btn-dark float-right" type="button" id="clearCookies">Reset</button>
              <p><i>Kegiatan</i> :
                <span id="displayActivity"></span>
              </p>
              <!-- HTML -->
            </div>

            <div class="card card-outline card-secondary">
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
                      echo '<tr><td colspan="7" class="text-danger text-center my-2"><b>Belum ada yang melakukan Absensi untuk Rapat hari ini</b></td></tr>';
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
      </section>
      <!-- /.container-fluid -->
      <!-- </section> -->
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
    // JavaScript (jQuery)
    $(document).ready(function() {
      // Tombol untuk menghapus cookie
      $("#clearCookies").click(function() {
        // Menghapus cookie dengan mengatur tanggal kedaluwarsa ke masa lalu
        document.cookie = "location=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "activity=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "document=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

        // Mereset nilai-nilai di elemen HTML
        $("#displayLocation").html("");
        $("#displayActivity").html("");
        $("#displayDocument").html("");
      });

      // Tombol untuk menyimpan data ke dalam cookie
      $("#saveButton").click(function() {
        var inputLocation = $("#inputLocation").val();
        var inputActivity = $("#inputActivity").val();
        var inputDocument = $("#inputDocument").val();

        // Menyimpan data ke dalam cookie
        document.cookie = "location=" + inputLocation;
        document.cookie = "activity=" + inputActivity;
        document.cookie = "document=" + inputDocument;

        // Mengambil nilai dari cookie
        var locationCookie = getCookie("location");
        var activityCookie = getCookie("activity");
        var documentCookie = getCookie("document");

        // Menampilkan data dari cookie ke dalam elemen HTML
        $("#displayLocation").html(locationCookie);
        $("#displayActivity").html(activityCookie);
        $("#displayDocument").html(documentCookie);

        // Menutup modal
        $('#myModal').modal('hide');
      });

      // Fungsi untuk mendapatkan nilai cookie berdasarkan nama
      function getCookie(name) {
        var cookies = document.cookie.split(';');
        for (var i = 0; i < cookies.length; i++) {
          var cookie = cookies[i].trim();
          if (cookie.startsWith(name + '=')) {
            return cookie.substring(name.length + 1);
          }
        }
        return '';
      }
    });
  </script>
  <!-- =============== ========================================== ini modal usaha =========== -->
  <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Caption</h4>
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
  <!-- /.modal -->
</body>

</html>