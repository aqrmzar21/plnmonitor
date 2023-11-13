<?php
// session_start();

// // cek jika belum login maka akan mengarahkan ke hal login
// if (!isset($_SESSION['login'])) {
//   header("Location: pages/examples/login.php");
//   exit;
// }

// $now = new DateTime();
// // Format tanggal dan waktu menggunakan format tertentu
// $formattedDate = $now->format('l, d F Y H:i:s');
// // Menampilkan hasil
// echo "Tanggal dan Waktu Sekarang: " . $formattedDate;
$formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::SHORT, IntlDateFormatter::NONE);
$tgl = $formatter->format(new DateTime());
$formatterID = new IntlDateFormatter('id_ID', IntlDateFormatter::MEDIUM, IntlDateFormatter::NONE);
$now = $formatterID->format(new DateTime());
$month = explode(" ", $now)[2];
$formatID = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
$live = $formatID->format(new DateTime());

$day = explode(" ", $live)[0];
$day = str_replace(",", "", $day);
$year = explode(" ", $live)[3];

require 'db/function.php';
$koneksi = koneksi();
// include 'pages/forms/proses/proses-form.php';
$absen = mysqli_query($koneksi, "SELECT COUNT(*) AS totalpengunjung FROM t_dataabsen");
$dab = mysqli_fetch_assoc($absen);
$unit = 'UP3 Gorontalo';
$absen2 = mysqli_query($koneksi, "SELECT COUNT(*) AS totalpengunjung FROM t_dataabsen WHERE unit = '$unit' ");
$dab2 = mysqli_fetch_assoc($absen2);
$absen3 = mysqli_query($koneksi, "SELECT COUNT(*) AS totalpengunjung FROM t_dataabsen WHERE unit != '$unit' ");
$dab3 = mysqli_fetch_assoc($absen3);
$anggota = mysqli_query($koneksi, "SELECT COUNT(*) AS totalanggota FROM t_datapengunjung");
$danggota = mysqli_fetch_assoc($anggota);
// tampung ke variabel datanya
// $pr1 = query("SELECT * FROM pascabayar1")[0];
$absens = query("SELECT * FROM t_dataabsen");
// print_r($dab2);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMPLN | Home</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/bg.css">
</head>

<body class="hold-transition layout-top-nav">
  <div class="container">

    <!-- Navbar ============================================================================================ -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li>
          <h3>
            <!-- <a href="index3.html" class="nav-link text-primary brand-text" id="tx-light"><strong>SI</strong>Monitoring</a> -->
            <img class="mx-auto nav-item" src="dist/img/imgPLN.png" alt="" width="20%">

          </h3>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block"><a class="nav-link">Home</a></li> -->

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
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-bars"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- <span class="dropdown-header text-center">My Profile</span> -->
            <div class="dropdown-divider"></div>
            <!-- <a href="pages/datauser/infouser.php" class="dropdown-item"> -->
            <a href="pages/absensi/signature.php" class="dropdown-item">
              <i class="fas fa-user-circle mr-2"></i> Absensi
              <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-cog mr-2"></i> 8 friend requests
              <!-- <span class="float-right text-muted text-sm">12 hours</span> -->
            </a>
            <div class="dropdown-divider"></div>
            <!-- <a href="pages/examples/logout.php" class="dropdown-item"> -->
            <a href="pages/examples/login.php" class="dropdown-item">
              <i class="fa fa-power-off mr-2"></i> Log In
              <!-- <span class="float-right text-muted text-sm">2 days</span> -->
            </a>

          </div>
        </li>
        <!-- <li class="nav-item"><a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a></li> -->

      </ul>

    </nav>
    <!-- /.navbar -->


    <!-- Content Wrapper. Contains page content -->
    <section class="content-wrapper bg-wt">
      <?php
      // include 'pages/layout/top-nav.php'
      ?>

      <!-- INNER HTML Navbar  -->

      <?php
      // include 'pages/layout/sidebar.php'

      ?>
      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>
      <!-- <div class="col-xs-12"> -->
      <div class="col-xs-2">
        <div class="" style="background-color: rgb(255, 255, 255); color: white;">
          <span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>
          <div class="info-box-content ">
            <span class="info-box-text">Tarif S</span>
            <span class="info-box-number"><?php echo $dab['totalpengunjung']; ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- Main content ============================================================================================ -->
      <section class="container py-5 px-4">


        <div class="card py-4 px-5 bg-green">
          <div class="card bg-white my-3 p-2">
            <div class="widget-user-header">
              <h3 class="text-olive mx-4 my-2 float-right"><b id="clock">Hi, World!</b></h3>
              <h2 class="brand-text ml-3 mt-2"><strong>Dashbord Info</strong></h2>
              <p class="widget-user-desc ml-3 mb-4 text-xs"><?= $live; ?></p>
            </div>
            <!-- <<div class="card mx-auto col-4"> -->
            <!-- </div> -->
            <div class="row">
              <div class="col-8">

                <div class="row">
                  <div class="col-12">
                    <div class="widget-user-header card bg-green ml-4">
                      <h4 class="brand-text my-2 p-2 ml-3">
                        <i class="px-2 fas fa-address-book"></i>
                        <strong>Data Absensi</strong>
                      </h4>
                    </div>
                  </div>

                  <div class="col-12 ml-2">
                    <!-- <div class="card"> -->
                    <!-- <div class="card-body ml-4"> -->
                    <ul class="pagination pagination-xs pagination-month justify-content-center">
                      <li class="page-item"><a class="page-link" disabled href="#">«</a></li>
                      <li class="page-item  <?= $day == 'Senin' ? 'active' : '' ?>">
                        <a class="page-link" href="#">
                          <p class="page-month">Senin</p>
                          <p class="page-year"><?= $month; ?></p>
                        </a>
                      </li>
                      <li class="page-item  <?= $day == 'Selasa' ? 'active' : '' ?>">
                        <a class="page-link" href="#">
                          <p class="page-month">Selasa</p>
                          <p class="page-year"><?= $year; ?></p>
                        </a>
                      </li>
                      <li class="page-item  <?= $day == 'Rabu' ? 'active' : '' ?>">
                        <a class="page-link" href="#">
                          <p class="page-month">Rabu</p>
                          <p class="page-year"><?= $year; ?></p>
                        </a>
                      </li>
                      <li class="page-item  <?= $day == 'Kamis' ? 'active' : '' ?>">
                        <a class="page-link" href="#">
                          <p class="page-month">Kamis</p>
                          <p class="page-year"><?= $year; ?></p>
                        </a>
                      </li>
                      <li class="page-item  <?= $day == 'Jumat' ? 'active' : '' ?>">
                        <a class="page-link" href="#">
                          <p class="page-month">Jumat</p>
                          <p class="page-year"><?= $year; ?></p>
                        </a>
                      </li>
                      <li class="page-item <?= $day == 'Sabtu' ? 'active' : '' ?>">
                        <a class="page-link" href="#">
                          <p class="page-month">Sabtu</p>
                          <p class="page-year"><?= $year; ?></p>
                        </a>
                      </li>
                      <li class="page-item  <?= $day == 'Minggu' ? 'active' : '' ?>">
                        <a class="page-link" href="#">
                          <p class="page-month">Ahad</p>
                          <p class="page-year"><?= $year; ?></p>
                        </a>
                      </li>
                      <li class="page-item"><a class="page-link" disabled href="#">»</a></li>
                    </ul>
                    <!-- </div> -->

                  </div>
                  <!-- </div> -->
                </div>
                <!-- ./div row2 -->
              </div>
              <div class="col-4">
                <div class="row mx-4">
                  <div class="card col-12 p-2">
                    <h6 class="text-center text-olive pt-2" style="font-size: 18px"><b>Gorontalo</b></h6>
                  </div>
                  <div class="card col-5 mr-3 ml-1 p-2 bg-info">
                    <h6 class="text-black text-center" style="font-size: 22px;"><b>UP3</b></h6>
                    <!-- <h6 class="text-black text-center" style="font-size: 22px; margin-bottom: 1em;"><b>UP2K</b></h6> -->
                  </div>
                  <div class="card col-5 ml-3 p-2 bg-lightblue">
                    <h6 class="text-black text-center" style="font-size: 22px;"><b>UP2K</b></h6>
                  </div>
                  <!-- ./div info-box -->
                </div>
                <!-- ./div card -->
              </div>
            </div>
            <!-- Container INFO Box -->
            <div class="row mx-3">

              <!-- ./col -->
              <div class="col-lg-4 col-6">
                <!-- small card -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h6>Internal</h6>
                    <h3><?= $dab2['totalpengunjung']; ?></h3>
                  </div>
                  <div class="icon">
                    <i class="far fa-flag"></i>
                  </div>
                  <a href="#" class="text-left small-box-footer">
                    <i class="fas fa-user-circle mx-2"></i> People
                  </a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-4 col-6">
                <!-- small card -->
                <div class="small-box bg-lightblue">
                  <div class="inner">
                    <h6>Eksternal</h6>
                    <h3><?= $dab3['totalpengunjung']; ?></h3>
                  </div>
                  <div class="icon">
                    <i class="far fa-bookmark"></i>
                  </div>
                  <a href="#" class="text-left small-box-footer">
                    <i class="fas fa-user-circle mx-2"></i> People
                  </a>
                </div>
              </div>
              <!-- ./col -->

              <!-- ./col -->
              <div class="col-lg-4 col-6">
                <!-- small card -->
                <div class="small-box bg-olive">
                  <div class="inner text-center">
                    <h6>Total</h6>
                    <h3><?= $dab['totalpengunjung']; ?></h3>
                  </div>
                  <div class="icon">
                    <i class="fas fa-bell"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                    <i class="fas fa-user-circle mr-2"></i> People
                  </a>
                </div>
              </div>
              <!-- ./col -->

              <!-- ./col -->
            </div>
            <!-- /.row -->
            <div class="row mt-3">
              <div class="col-8">
                <div class="widget-user-header card bg-green ml-4">
                  <h4 class="brand-text my-2 p-2 ml-3">
                    <i class="px-2 far fa-calendar-alt"></i>
                    <strong>Unit Pelaksana Pelayanan Pelanggan </strong>
                  </h4>
                </div>
              </div>

              <div class="col-4">
                <button class="btn btn--lg bg-blue mr-4 my-3 float-right">
                  <a href="pages/absensi/signature.php" class="text-dark p-1">
                    <i class="fa fa-plus"></i> <b>Touch Me</b>
                    <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </button>
              </div>
              <!-- /.div col-4 -->
            </div>

            <div class="row mx-3 text-olive">

              <div class="col-3">
                <div class="info-box">
                  <!-- <span class="info-box-icon"><i class="far fa-envelope"></i></span> -->
                  <div class="info-box-content text-center">
                    <span class="info-box-text">Unit Layanan Pelanggan</span>
                    <h4 class="info-box-number">Telaga</h4>
                  </div>

                </div>
              </div>
              <!-- ./div row -->
              <div class="col-3">
                <div class="info-box">
                  <!-- <span class="info-box-icon"><i class="far fa-envelope"></i></span> -->
                  <div class="info-box-content text-center">
                    <span class="info-box-text">Unit Layanan Pelanggan</span>
                    <h4 class="info-box-number">Limboto</h4>
                  </div>

                </div>
              </div>
              <!-- ./div row -->
              <div class="col-3">
                <div class="info-box">
                  <!-- <span class="info-box-icon"><i class="far fa-envelope"></i></span> -->
                  <div class="info-box-content text-center">
                    <span class="info-box-text">Unit Layanan Pelanggan</span>
                    <h4 class="info-box-number">Marisa</h4>
                  </div>

                </div>
              </div>
              <!-- ./div row -->
              <div class="col-3">
                <div class="info-box">
                  <!-- <span class="info-box-icon"><i class="far fa-envelope"></i></span> -->
                  <div class="info-box-content text-center">
                    <span class="info-box-text">Unit Layanan Pelanggan</span>
                    <h4 class="info-box-number">Kwandang</h4>
                  </div>

                </div>
              </div>
              <!-- ./div row -->
            </div>
          </div>

        </div><!-- /.container-card -->

      </section>
      <!-- ./div container cardbox -->

    </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->

    <!-- Contact Footer =========================================================== -->
    <!-- Main Footer -->
    <div w3-include-html="pages/layout/footer.html"></div>
  </div>

  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>

  <!-- akhir dunia -->
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    function updateClock() {
      const now = new Date();
      const hours = now.getHours().toString().padStart(2, '0');
      const minutes = now.getMinutes().toString().padStart(2, '0');
      const seconds = now.getSeconds().toString().padStart(2, '0');

      const timeString = hours + ':' + minutes + ':' + seconds;
      document.getElementById('clock').innerHTML = '' + timeString;
    }

    // Panggil fungsi updateClock() setiap detik
    setInterval(updateClock, 1000);

    $(function() {
      $('#example').DataTable({
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': false
      });
    });
  </script>
</body>

</html>