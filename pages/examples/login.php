<?php
session_start();

// cek sudah login maka akan mengarahkan ke hal dasbord
if (isset($_SESSION['login'])) {
  header("location: ../../dashbord.php");
  exit;
}

// require 'proses/koneksi.php';
require '../../db/function.php';

if (isset($_POST['login'])) {
  $login = login($_POST);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMPLN | Log in</title>
  <link rel="icon" href="../../dist/img/favicon.ico">


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page bg-white">
  <div class="login-box">

    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <!-- <h2> -->
        <a href="../../index2.html" class="h2"><b class="brand-text">Absensi</b>PLN</a>
        <!-- </h2> -->
      </div>
      <div class="card-body">
        <p class="login-box-msg">Masuk untuk memulai sesi</p>

        <?php if (isset($login['error'])) : ?>
          <p class="login-box-msg text-danger"><?= $login['pesan']; ?></p>
        <?php endif; ?>

        <form action="" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <!-- <a href="register.php" class="btn btn-primary btn-block" name="register">Register</a> -->
              <a href="../../index.php" class="btn btn-default btn-block">In</a>
              <div class="icheck-primary">
                <!-- <input type="checkbox" id="remember"> -->
                <label for="remember">
                  <!-- Remember Me -->
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-6">
              <button type="submit" class="btn btn-primary btn-block" name="login">Masuk</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <!-- /.social-auth-links -->

        <p class="text-center"><a href="forgot-password.html">I forgot my password</a></p>
        <p class="text-center"><a href="register.php" class="text-center">Register a new membership</a></p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>