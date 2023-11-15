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
// ambil dari URL id
$id = $_GET['id'];

// query data berdasarkan id_user
$user = query("SELECT * FROM t_datauser WHERE id_user = $id");

if (isset($_POST['edit'])) {
  if (edit($_POST) > 0) {
    echo "<script>
        alert('data berhasil diubah');  
        document.location.href ='infouser.php';
        </script>";
  } else {
    echo "<script>
        alert('data gagal diubah');
        document.location.href ='edituser.php';
        </script>";
  }
}
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
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item">
            <a href="../absensi/absensi.php" class="nav-link">Daftar Absen</a>
          </li>
          <li class="nav-item">
            <a href="infouser.php" class="nav-link">Data Admin</a>
          </li>
          <!-- Messages Dropdown Menu -->
          <li class="nav-item">
            <a href="../../index.php" class="nav-link"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
          </li>
          <!-- USER FORM -->
          <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/img/user2-160x160.jpg" class="user-image img-circle elevation-1" alt="User Image">
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <!-- User image -->
              <li class="user-header bg-dark">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

                <p>
                  <?= $user['nama_pengguna']; ?>
                  <small><?= $username; ?></small>
                </p>
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

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit User</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Info User</li>
                <li class="breadcrumb-item active">Edit User</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container -->
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="container">
          <div class="row">
            <div class="col">

              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">Data Operator</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <form method="POST" action="">
                  <div class="card-body">
                    <div class="row">
                      <input type="hidden" name="id_user" class="form-control" value="<?= $user['id_user']; ?>">
                      <div class="col-6">
                        <div class="form-group">
                          <label>Username</label>
                          <input type="text" name="username" class="form-control" value="<?= $user['username']; ?>" placeholder="Enter ..." style="text-transform: lowercase">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" value="<?= $user['password']; ?>" placeholder="Enter ...">
                        </div>
                      </div>
                      <div class="col-9">
                        <div class="form-group">
                          <label>Nama</label>
                          <input type="text" name="nama_pengguna" class="form-control" value="<?= $user['nama_pengguna']; ?>" placeholder="Enter ...">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="form-group">
                          <label>Level</label>
                          <input type="text" name="level" class="form-control" value="<?= $user['level']; ?>" placeholder="Enter ...">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="row justify-content-center">
                    <a href="../datauser/infouser.php" class="btn btn-sm btn-primary m-2">Cancel</a>
                    <button type="submit" name="edit" class="btn btn-sm btn-primary m-2">Save</button>
                  </div>
              </div>
              </form>
            </div>
            <!-- <div col-6"> -->

            <!-- /.col-md-4 -->

          </div>
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
  <div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-sm">
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
              <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" name="level" value="<?= $p['level']; ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputBorder">Password</label>
              <input type="password" class="form-control form-control-border" id="exampleInputBorder" name="password" value="<?= $p['password']; ?>">
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