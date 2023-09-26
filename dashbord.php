<?php
session_start();

// cek jika belum login maka akan mengarahkan ke hal login
if (!isset($_SESSION['login'])) {
  header("Location: pages/examples/login.php");
  exit;
}


require 'db/function.php';
// tampung ke variabel datanya
$user = query("SELECT * FROM t_datauser");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMPLN | FIXDashboard</title>
  <link rel="icon" href="dist/img/favicon.ico">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li> -->
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->

        <!-- Messages Dropdown Menu -->
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img src="dist/img/user1-128x128.jpg" class="user-image" alt="User Image">
          </a>
          <span class="badge badge-danger navbar-badge">0</span>

          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="dist/img/user1-128x128.jpg" class="img-circle" alt="User Image">

              <p>Aqram<small>Admin Operator</small></p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="float-left">
                <a href="pages/datauser/infouser.php" class="btn btn-default btn-flat">Profil</a>
              </div>
              <div class="float-sm-right">
                <a href="pages/examples/logout.php" class="btn btn-default btn-flat">Keluar</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Notifications Dropdown Menu -->

      </ul>
    </nav>
    <!-- /.navbar -->

    <?php
    include 'pages/layout/sidebarr.php';
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard v3</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Online Store Visitors</h3>
                    <a href="javascript:void(0);">View Report</a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex">
                    <p class="d-flex flex-column">
                      <span class="text-bold text-lg">820</span>
                      <span>Visitors Over Time</span>
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                      <span class="text-success">
                        <i class="fas fa-arrow-up"></i> 12.5%
                      </span>
                      <span class="text-muted">Since last week</span>
                    </p>
                  </div>
                  <!-- /.d-flex -->

                  <div class="position-relative mb-4">
                    <canvas id="visitors-chart" height="200"></canvas>
                  </div>

                  <div class="d-flex flex-row justify-content-end">
                    <span class="mr-2">
                      <i class="fas fa-square text-primary"></i> This Week
                    </span>

                    <span>
                      <i class="fas fa-square text-gray"></i> Last Week
                    </span>
                  </div>
                </div>
              </div>
              <!-- /.card -->

              <div class="card">
                <div class="card-header border-0">
                  <h3 class="card-title">Products</h3>
                  <div class="card-tools">
                    <a href="#" class="btn btn-tool btn-sm">
                      <i class="fas fa-download"></i>
                    </a>
                    <a href="#" class="btn btn-tool btn-sm">
                      <i class="fas fa-bars"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-striped table-valign-middle">
                    <thead>
                      <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Sales</th>
                        <th>More</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                          Some Product
                        </td>
                        <td>$13 USD</td>
                        <td>
                          <small class="text-success mr-1">
                            <i class="fas fa-arrow-up"></i>
                            12%
                          </small>
                          12,000 Sold
                        </td>
                        <td>
                          <a href="#" class="text-muted">
                            <i class="fas fa-search"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                          Another Product
                        </td>
                        <td>$29 USD</td>
                        <td>
                          <small class="text-warning mr-1">
                            <i class="fas fa-arrow-down"></i>
                            0.5%
                          </small>
                          123,234 Sold
                        </td>
                        <td>
                          <a href="#" class="text-muted">
                            <i class="fas fa-search"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                          Amazing Product
                        </td>
                        <td>$1,230 USD</td>
                        <td>
                          <small class="text-danger mr-1">
                            <i class="fas fa-arrow-down"></i>
                            3%
                          </small>
                          198 Sold
                        </td>
                        <td>
                          <a href="#" class="text-muted">
                            <i class="fas fa-search"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                          Perfect Item
                          <span class="badge bg-danger">NEW</span>
                        </td>
                        <td>$199 USD</td>
                        <td>
                          <small class="text-success mr-1">
                            <i class="fas fa-arrow-up"></i>
                            63%
                          </small>
                          87 Sold
                        </td>
                        <td>
                          <a href="#" class="text-muted">
                            <i class="fas fa-search"></i>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Sales</h3>
                    <a href="javascript:void(0);">View Report</a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex">
                    <p class="d-flex flex-column">
                      <span class="text-bold text-lg">$18,230.00</span>
                      <span>Sales Over Time</span>
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                      <span class="text-success">
                        <i class="fas fa-arrow-up"></i> 33.1%
                      </span>
                      <span class="text-muted">Since last month</span>
                    </p>
                  </div>
                  <!-- /.d-flex -->

                  <div class="position-relative mb-4">
                    <canvas id="sales-chart" height="200"></canvas>
                  </div>

                  <div class="d-flex flex-row justify-content-end">
                    <span class="mr-2">
                      <i class="fas fa-square text-primary"></i> This year
                    </span>

                    <span>
                      <i class="fas fa-square text-gray"></i> Last year
                    </span>
                  </div>
                </div>
              </div>
              <!-- /.card -->

              <div class="card">
                <div class="card-header border-0">
                  <h3 class="card-title">Online Store Overview</h3>
                  <div class="card-tools">
                    <a href="#" class="btn btn-sm btn-tool">
                      <i class="fas fa-download"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-tool">
                      <i class="fas fa-bars"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                    <p class="text-success text-xl">
                      <i class="ion ion-ios-refresh-empty"></i>
                    </p>
                    <p class="d-flex flex-column text-right">
                      <span class="font-weight-bold">
                        <i class="ion ion-android-arrow-up text-success"></i> 12%
                      </span>
                      <span class="text-muted">CONVERSION RATE</span>
                    </p>
                  </div>
                  <!-- /.d-flex -->
                  <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                    <p class="text-warning text-xl">
                      <i class="ion ion-ios-cart-outline"></i>
                    </p>
                    <p class="d-flex flex-column text-right">
                      <span class="font-weight-bold">
                        <i class="ion ion-android-arrow-up text-warning"></i> 0.8%
                      </span>
                      <span class="text-muted">SALES RATE</span>
                    </p>
                  </div>
                  <!-- /.d-flex -->
                  <div class="d-flex justify-content-between align-items-center mb-0">
                    <p class="text-danger text-xl">
                      <i class="ion ion-ios-people-outline"></i>
                    </p>
                    <p class="d-flex flex-column text-right">
                      <span class="font-weight-bold">
                        <i class="ion ion-android-arrow-down text-danger"></i> 1%
                      </span>
                      <span class="text-muted">REGISTRATION RATE</span>
                    </p>
                  </div>
                  <!-- /.d-flex -->
                </div>
              </div>
            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->


        </div>
        <!-- /.container-fluid -->
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
    <div w3-include-html="pages/layout/footer.html"></div>

  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE -->
  <script src="dist/js/adminlte.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard3.js"></script>
  <!-- awal include html -->
  <script>
    function includeHTML() {
      var z, i, elmnt, file, xhttp;
      /* Loop through a collection of all HTML elements: */
      z = document.getElementsByTagName("*");
      for (i = 0; i < z.length; i++) {
        elmnt = z[i];
        /*search for elements with a certain atrribute:*/
        file = elmnt.getAttribute("w3-include-html");
        if (file) {
          /* Make an HTTP request using the attribute value as the file name: */
          xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4) {
              if (this.status == 200) {
                elmnt.innerHTML = this.responseText;
              }
              if (this.status == 404) {
                elmnt.innerHTML = "Page not found.";
              }
              /* Remove the attribute, and call this function once more: */
              elmnt.removeAttribute("w3-include-html");
              includeHTML();
            }
          }
          xhttp.open("GET", file, true);
          xhttp.send();
          /* Exit the function: */
          return;
        }
      }
    }
  </script>

  <script>
    includeHTML();
  </script>
  <!-- akhir dunia -->
</body>

</html>