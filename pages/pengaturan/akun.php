<?php
session_start();

// cek jika belum login maka akan mengarahkan ke hal login
if (!isset($_SESSION['login'])) {
  header("Location: pages/examples/login.php");
  exit;
}

require '../../db/function.php';
$koneksi = koneksi();
$username = $_SESSION['username'];
// $id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM t_datauser WHERE username = '$username'");
while ($d = mysqli_fetch_array($data)) {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PLNMeetSign | Info User</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
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
              <a href="signature.php" class="nav-link">Absensi</a>
            </li>
            <!-- Messages Dropdown Menu -->
            <li class="nav-item">
              <a href="../../index.php" class="nav-link"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <!-- USER FORM -->
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="../../dist/img/user2-160x160.jpg" class="user-image img-circle elevation-1" alt="User Image">
                <span class="d-none d-md-inline"><?= $d['nama_pengguna']; ?></span>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-dark">
                  <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

                  <p>
                    <?= $d['nama_pengguna']; ?>
                    <small>Operator Sistem</small>
                  </p>
                </li>
                <!-- Menu Body -->
                <!-- Menu Footer-->
                <li class="user-footer">
                  <a href="../datauser/infouser.php" class="btn btn-dark btn-sm"><i class="far fa-address-book" aria-hidden="true"></i> Profile</a>
                  <a href="../examples/logout.php" class="btn btn-dark btn-sm float-right"><i class="fa fa-power-off" aria-hidden="true"></i> Log out</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      <!-- /.navbar -->

      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Info Admin</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active">Data User</li>
                  <li class="breadcrumb-item active">Info User</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container -->
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="register-box mx-auto">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="../../dist/img/AdminLTELogo.png" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">MeetSignature</h3>

                <p class="text-muted text-center">Informasi Profile</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Nama Lengkap</b>
                    <p class="float-right"><?= $d['nama_pengguna']; ?></p>
                  </li>
                  <li class="list-group-item">
                    <b>Jabatan</b>
                    <p class="float-right"><?= $d['level']; ?></p>
                  </li>
                  <li class="list-group-item">
                    <b>NIP</b>
                    <p class="float-right"><?= $d['nip']; ?></p>
                  </li>
                  <li class="list-group-item">
                    <b>Nama Pengguna</b>
                    <p class="float-right"><?= $d['username']; ?></p>
                  </li>
                </ul>

                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-lg">
                  <b>Ubah</b>
                </button>
                <a href="../datauser/infouser.php" class="btn btn-dark btn-block"><b>Back</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.row -->
          </div>

        </section>
      </div>
      <!-- /.div content-wrapper -->
      <?php include '../layout/footer.php'; ?>
    </div>


    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script>
      $(function() {
        bsCustomFileInput.init();
      });
    </script>
    <!-- INi modal Edit User ==================================================  -->
    <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body justify-center">
            <form action="" method="POST">
              <div class="form-group">
                <label for="exampleInputBorderWidth2">Username</label>
                <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" name="level" value="<?= $d['level']; ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputBorder">Password</label>
                <input type="password" class="form-control form-control-border" id="exampleInputBorder" name="password" value="<?= $d['password']; ?>">
              </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" name="ubah">Save changes</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal ===================================================================== -->

  </body>

  </html>
<?php } ?>