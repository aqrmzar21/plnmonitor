<?php
// pangggil koneksi ke database
require '../../db/function.php';

// $absen = query("SELECT * FROM t_dataabsen");

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
            <div class="col-12">
              <a href="export_word.php" class="btn btn-md btn-secondary float-right my-3" target="_blank"><i class="mr-1 fas fa-print" aria-hidden="true"></i> Export Word</a>
              <a href="export_excel.php" class="btn btn-md btn-secondary float-right my-3 mr-2" target="_blank"><i class="mr-1 fas fa-print" aria-hidden="true"></i> Export Excel</a>
              <a href="export_pdf.php" class="btn btn-md btn-secondary float-right my-3 mr-2" target="_blank"><i class="mr-1 fas fa-print" aria-hidden="true"></i> Export PDF</a>
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
                <p class="float-right">Tanggal : <?= $tanggal_sekarang; ?></p>
                <p>Lokasi :
                  <span id="displayLocation"></span>
                </p>
                <button class="btn btn-xs btn-primary float-right" type="button" id="clearCookies">Reset</button>
                <p>Kegiatan :
                  <span id="displayActivity"></span>
                </p>
                <!-- HTML -->
              </div>

              <div class="card card-outline card-gray">
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
                        echo '<tr><td colspan="7" class="text-danger text-center">Belum ada yang melakukan Absensi untuk Rapat hari ini</td></tr>';
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