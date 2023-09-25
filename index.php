<?php
// session_start();

// // cek jika belum login maka akan mengarahkan ke hal login
// if (!isset($_SESSION['login'])) {
//   header("Location: pages/examples/login.php");
//   exit;
// }


require 'db/function.php';
// tampung ke variabel datanya
$user = query("SELECT * FROM t_datauser");

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
          <a href="index3.html" class="nav-link h5 text-primary" id="tx-light"><strong>SI</strong>Monitoring</a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block"><a class="nav-link">Home</a></li> -->
        <li class="nav-item d-none d-sm-inline-block">
          <a href="pages/examples/login.php" class="nav-link">Login</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="pages/absensi/signature.php" class="nav-link">Absensi</a>
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
            <a href="pages/datauser/infouser.php" class="dropdown-item">
              <i class="fas fa-user-circle mr-2"></i> My Profile
              <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-cog mr-2"></i> 8 friend requests
              <!-- <span class="float-right text-muted text-sm">12 hours</span> -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="pages/examples/logout.php" class="dropdown-item">
              <i class="fa fa-power-off mr-2"></i> Log Out
              <!-- <span class="float-right text-muted text-sm">2 days</span> -->
            </a>

          </div>
        </li>
        <!-- <li class="nav-item"><a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a></li> -->

      </ul>

    </nav>
    <!-- /.navbar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg-wt">
      <!-- Main content ============================================================================================ -->
      <div class="content">

        <div class="container-fluid">

          <div class="container">
            <div class="row mt-4">
              <div class="col-6 mx-auto">
                <img src="dist/img/imgPLN.png" alt="" width="200" class="bgxl">
                <div class="card mx-auto">
                  <span class="h2 text-center">12 : 12 : 12</span>

                </div>
              </div>
            </div>
          </div>

          <!-- Container INFO Box -->
          <div class="container mt-4">
            <div class="row">

              <div class="col-lg-2 col-6 ">
                <!-- small card -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>S</h3>

                    <p>7842</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-2 col-6">
                <!-- small card -->
                <div class="small-box bg-primary">
                  <div class="inner">
                    <h3>R</h3>

                    <p>315553</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user-plus"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-2 col-6">
                <!-- small card -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>B</h3>

                    <p>7842</p>
                  </div>
                  <div class="icon">
                    <i class="far fa-bell"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-2 col-6">
                <!-- small card -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>I</h3>

                    <p>1687</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-chart-pie"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-2 col-6">
                <!-- small card -->
                <div class="small-box bg-orange">
                  <div class="inner">
                    <h3>P</h3>

                    <p>2888</p>
                  </div>
                  <div class="icon">
                    <i class="far fa-flag"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-2 col-6">
                <!-- small card -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                    <p>Bounce Rate</p>
                  </div>
                  <div class="icon">
                    <i class="far fa-star"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->
            </div>
            <!-- /.row -->

          </div>


        </div><!-- /.container-fluid -->


        <div class="container">
          <div class="row">

            <div class="col-md-4">
              <!-- Widget: user widget style 1 -->
              <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-primary">
                  <h3 class="widget-user-username text-left">Penjualan Listrik</h3>
                  <h5 class="widget-user-desc text-left">Data (KWh)</h5>
                </div>
                <div class="widget-user-image">
                  <img class="img-circle elevation-1" src="dist/img/user1-128x128.jpg" alt="User Avatar">
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm-6 border-right">
                      <div class="description-block">
                        <h5 class="description-header">238.437 PLG</h5>
                        <span class="description-text">PRA BAYAR</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <div class="description-block">
                        <h5 class="description-header">97.909 PLG</h5>
                        <span class="description-text">PASCA BAYAR</span>
                      </div>
                      <!-- /.description-block -->
                    </div>

                    <!-- /.col -->
                  </div>

                  <div class="row text-sm text-white">
                    <div class="col-lg-6">
                      <!-- Info Boxes Style 2 -->
                      <div class="info-box-xs mt-2 bg-warning">
                        <div class="info-box-content m-2">
                          <span class="info-box-text">S</span>
                          <!-- <span class="info-box-icon"><i class="fas fa-tag"></i></span> -->
                          <span class="info-box-number float-right">5,101</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box-xs mt-2 bg-danger">
                        <div class="info-box-content m-2">
                          <span class="info-box-text">R</span>
                          <!-- <span class="info-box-icon"><i class="fas fa-tag"></i></span> -->
                          <span class="info-box-number float-right">225,612</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box-xs mb-2 bg-olive">
                        <div class="info-box-content m-2">
                          <span class="info-box-text"><b>B</b></span>
                          <!-- <span class="info-box-icon"><i class="far fa-heart"></i></span> -->
                          <span class="info-box-number float-right">5,977</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box-xs mb-2 bg-orange">
                        <div class="info-box-content m-2">
                          <span class="info-box-text"><b>I</b></span>
                          <!-- <span class="info-box-icon"><i class="far fa-heart"></i></span> -->
                          <span class="info-box-number float-right">29</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box-xs mt-2 bg-lightblue">
                        <div class="info-box-content m-2">
                          <span class="info-box-text">P</span>
                          <!-- <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span> -->
                          <span class="info-box-number float-right">1,657</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>

                    <div class="col-lg-6">
                      <div class="info-box-xs mt-2 bg-warning">
                        <div class="info-box-content m-2">
                          <span class="info-box-text">S</span>
                          <!-- <span class="info-box-icon"><i class="fas fa-tag"></i></span> -->
                          <span class="info-box-number float-right">5,101</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box-xs mt-2 bg-danger">
                        <div class="info-box-content m-2">
                          <span class="info-box-text">R</span>
                          <!-- <span class="info-box-icon"><i class="fas fa-tag"></i></span> -->
                          <span class="info-box-number float-right">225,612</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box-xs mb-2 bg-olive">
                        <div class="info-box-content m-2">
                          <span class="info-box-text">B</span>
                          <!-- <span class="info-box-icon"><i class="far fa-heart"></i></span> -->
                          <span class="info-box-number float-right">5,977</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box-xs mb-2 bg-orange">
                        <div class="info-box-content m-2">
                          <span class="info-box-text">I</span>
                          <!-- <span class="info-box-icon"><i class="far fa-heart"></i></span> -->
                          <span class="info-box-number float-right">29</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box-xs mt-2 bg-lightblue">
                        <div class="info-box-content m-2">
                          <span class="info-box-text"><b>P</b></span>
                          <!-- <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span> -->
                          <span class="info-box-number float-right">1,657</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                  </div>
                  <!-- /.row -->

                </div>
              </div>
              <!-- /.widget-user -->
            </div>
            <!-- /.col KIRI-->

            <div class="col-md-4">
              <!-- Widget: user widget style 1 -->
              <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-info">
                  <h3 class="widget-user-username">Daya Terpasang</h3>
                  <h5 class="widget-user-desc">Data (VA)</h5>
                </div>
                <div class="widget-user-image">
                  <img class="img-circle elevation-2" src="dist/img/user8-128x128.jpg" alt="User Avatar">
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm-6 border-right">
                      <div class="description-block">
                        <h5 class="description-header">3,200</h5>
                        <span class="description-text">PRA BAYAR</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <div class="description-block">
                        <h5 class="description-header">35</h5>
                        <span class="description-text">PASCA BAYAR</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <div class="row text-sm text-white">
                    <div class="col-lg-6">
                      <!-- Info Boxes Style 2 -->
                      <div class="info-box-xs mt-2 bg-warning">
                        <div class="info-box-content m-2">
                          <span class="info-box-text float-right">S</span>
                          <!-- <span class="info-box-icon float-right"><i class="fas fa-tag"></i></span> -->
                          <span class="info-box-number">5,101</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box-xs mt-2 bg-danger">
                        <div class="info-box-content m-2">
                          <span class="info-box-text float-right">R</span>
                          <!-- <span class="info-box-icon"><i class="fas fa-tag"></i></span> -->
                          <span class="info-box-number">225,612</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box-xs mb-2 bg-olive">
                        <div class="info-box-content m-2">
                          <span class="info-box-text float-right"><b>B</b></span>
                          <!-- <span class="info-box-icon"><i class="far fa-heart"></i></span> -->
                          <span class="info-box-number">5,977</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box-xs mb-2 bg-orange">
                        <div class="info-box-content m-2">
                          <span class="info-box-text float-right"><b>I</b></span>
                          <!-- <span class="info-box-icon"><i class="far fa-heart"></i></span> -->
                          <span class="info-box-number">29</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box-xs mt-2 bg-lightblue">
                        <div class="info-box-content m-2">
                          <span class="info-box-text float-right"><b>P</b></span>
                          <!-- <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span> -->
                          <span class="info-box-number">1,657</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>

                    <div class="col-lg-6">
                      <div class="info-box-xs mt-2 bg-warning">
                        <div class="info-box-content m-2">
                          <span class="info-box-text">S</span>
                          <!-- <span class="info-box-icon"><i class="fas fa-tag"></i></span> -->
                          <span class="info-box-number float-right">5,101</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box-xs mt-2 bg-danger">
                        <div class="info-box-content m-2">
                          <span class="info-box-text">R</span>
                          <!-- <span class="info-box-icon"><i class="fas fa-tag"></i></span> -->
                          <span class="info-box-number float-right">225,612</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box-xs mb-2 bg-olive">
                        <div class="info-box-content m-2">
                          <span class="info-box-text">B</span>
                          <!-- <span class="info-box-icon"><i class="far fa-heart"></i></span> -->
                          <span class="info-box-number float-right">5,977</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box-xs mb-2 bg-orange">
                        <div class="info-box-content m-2">
                          <span class="info-box-text">I</span>
                          <!-- <span class="info-box-icon"><i class="far fa-heart"></i></span> -->
                          <span class="info-box-number float-right">29</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box-xs mt-2 bg-lightblue">
                        <div class="info-box-content m-2">
                          <span class="info-box-text">P</span>
                          <!-- <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span> -->
                          <span class="info-box-number float-right">1,657</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                  </div>
                  <!-- /.row -->

                </div>


              </div>
              <!-- /.widget-user -->
            </div>
            <!-- /.col TENGAH-->

            <div class="col-md-4">
              <!-- Widget: user widget style 1 -->
              <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header text-white bg-primary">
                  <h3 class="widget-user-username text-right">Jumlah Pelanggan</h3>
                  <h5 class="widget-user-desc text-right">Data (Plg)</h5>
                </div>
                <div class="widget-user-image mb-6">
                  <img class="img-circle" src="dist/img/user3-128x128.jpg" alt="User Avatar">
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm-6 border-right">
                      <div class="description-block">
                        <h5 class="description-header">3,200</h5>
                        <span class="description-text">PRA BAYAR</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <div class="description-block">
                        <h5 class="description-header">35</h5>
                        <span class="description-text">PASCA BAYAR</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <div class="row text-sm text-white">
                    <div class="col-lg-6">
                      <!-- Info Boxes Style 2 -->
                      <div class="info-box-xs mt-2 bg-warning">
                        <div class="info-box-content m-2">
                          <span class="info-box-text"><b>S</b></span>
                          <!-- <span class="info-box-icon"><i class="fas fa-tag"></i></span> -->
                          <span class="info-box-number float-right">5,291</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box-xs mt-2 bg-danger">
                        <div class="info-box-content m-2">
                          <span class="info-box-text"><b>R</b></span>
                          <!-- <span class="info-box-icon"><i class="fas fa-tag"></i></span> -->
                          <span class="info-box-number float-right">232,805</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box-xs mb-2 bg-olive">
                        <div class="info-box-content m-2">
                          <span class="info-box-text"><b>B</b></span>
                          <!-- <span class="info-box-icon"><i class="far fa-heart"></i></span> -->
                          <span class="info-box-number float-right">5,977</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box-xs mb-2 bg-orange">
                        <div class="info-box-content m-2">
                          <span class="info-box-text"><b>I</b></span>
                          <!-- <span class="info-box-icon"><i class="far fa-heart"></i></span> -->
                          <span class="info-box-number float-right">29</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box-xs mt-2 bg-lightblue">
                        <div class="info-box-content m-2">
                          <span class="info-box-text"><b>P</b></span>
                          <!-- <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span> -->
                          <span class="info-box-number float-right">1,657</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>

                    <div class="col-lg-6">
                      <div class="info-box-xs mt-2 bg-warning">
                        <div class="info-box-content m-2">
                          <span class="info-box-text">S</span>
                          <!-- <span class="info-box-icon"><i class="fas fa-tag"></i></span> -->
                          <span class="info-box-number float-right">5,101</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box-xs mt-2 bg-danger">
                        <div class="info-box-content m-2">
                          <span class="info-box-text">R</span>
                          <!-- <span class="info-box-icon"><i class="fas fa-tag"></i></span> -->
                          <span class="info-box-number float-right">225,612</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box-xs mb-2 bg-olive">
                        <div class="info-box-content m-2">
                          <span class="info-box-text">B</span>
                          <!-- <span class="info-box-icon"><i class="far fa-heart"></i></span> -->
                          <span class="info-box-number float-right">5,977</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box-xs mb-2 bg-orange">
                        <div class="info-box-content m-2">
                          <span class="info-box-text">I</span>
                          <!-- <span class="info-box-icon"><i class="far fa-heart"></i></span> -->
                          <span class="info-box-number float-right">29</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box-xs mt-2 bg-lightblue">
                        <div class="info-box-content m-2">
                          <span class="info-box-text">P</span>
                          <!-- <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span> -->
                          <span class="info-box-number float-right">1,657</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                  </div>
                  <!-- /.row -->
                </div>
                <div class="card-body">
                  <div class="card mx-auto bg-dark text-center"> Total</div>

                </div>
              </div>
              <!-- /.widget-user -->
            </div>
            <!-- /.col KANAN-->
          </div>
        </div>
        <!-- ./div container cardbox -->

      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Contact Footer =========================================================== -->
    <!-- <footer>
      <div class="container bg-primary text-white">
        <div class="row">
          <div class="col-lg-3 mt-3">
            <h4 class="tx-wt pl-2">Hubungi Kami</h4>

          </div>
          <div class="col-lg-9 mt-3">
            <h4 class="tx-wt">Ikuti Kami</h4>

          </div>
        </div>
      </div>
    </footer> -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        4.0
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2023 PT. PLN UP3 KOTA GORONTALO |</strong> All rights reserved.
      <!-- <span><i class="fa fa-facebook">PLN UP3 Kota Gorontalo</i></span>
      <span><i class="fa fa-instagram">PLN UP3 Kota Gorontalo</i></span>
      <span><i class="fa fa-youtube-play">PLN UP3 Kota Gorontalo</i></span> -->
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
</body>

</html>