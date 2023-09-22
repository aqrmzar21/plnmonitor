<?php
require '../../db/function.php';

// ambil dari URL id
$id = $_GET['id'];

// query data berdasarkan id_user
$u = query("SELECT * FROM t_datauser WHERE id_user = $id");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMPLN | Info User</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <!-- Messages Dropdown Menu -->
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img src="../../dist/img/user1-128x128.jpg" class="user-image" alt="User Image">
          </a>
          <span class="badge badge-danger navbar-badge">0</span>

          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="../../dist/img/user1-128x128.jpg" class="img-circle" alt="User Image">

              <p>Aqram Zar<small>Admin Operator</small></p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="float-left">
                <a href="pages/datauser/infouser.php" class="btn btn-default btn-flat">Profil</a>
              </div>
              <div class="float-sm-right">
                <a href="pages/login/logout-proses.php" class="btn btn-default btn-flat">Keluar</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Notifications Dropdown Menu -->
      </ul>
    </nav>
    <!-- /.navbar -->


    <div class="register-box">
      <!-- Profile Image -->
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
          </div>

          <h3 class="profile-username text-center">BOT System 4.0</h3>

          <p class="text-muted text-center">WEB Engineer</p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Nama Lengkap</b>
              <p class="float-right"><?= $u['nama_pengguna']; ?></p>
            </li>
            <li class="list-group-item">
              <b>Jabatan</b>
              <p class="float-right"><?= $u['level']; ?></p>
            </li>
            <li class="list-group-item">
              <b>NIP</b>
              <p class="float-right"><?= $u['nip']; ?></p>
            </li>
            <li class="list-group-item">
              <b>Nama Pengguna</b>
              <p class="float-right"><?= $u['username']; ?></p>
            </li>
          </ul>

          <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-sm">
            <b>Ubah</b>
          </button>
          <a href="../../index.php" class="btn btn-primary btn-block"><b>Back</b></a>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.register-box -->

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
              <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" name="level" value="<?= $u['level']; ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputBorder">Password</label>
              <input type="password" class="form-control form-control-border" id="exampleInputBorder" name="password" value="<?= $u['password']; ?>">
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