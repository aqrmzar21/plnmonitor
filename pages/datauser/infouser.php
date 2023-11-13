<?php
session_start();

// cek jika belum login maka akan mengarahkan ke hal login
if (!isset($_SESSION['login'])) {
  header("Location: pages/examples/login.php");
  exit;
}

require '../../db/function.php';
// ambil dari URL id
$id = $_GET['id'];

// query data berdasarkan id_user
$user = query("SELECT * FROM t_datauser WHERE id_user = $id");

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

<body class="hold-transition sidebar-mini layout-boxed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php
    // include '../layout/header.php';
    ?>
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
              <p><?= $user['nama_pengguna']; ?>
                <small><?= $user['level']; ?></small>
              </p>
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
    <?php include '../layout/sidebar.php'; ?>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Info User</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Data User</li>
                <li class="breadcrumb-item active">Info User</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="container-fluid">
          <div class="row">
            <div class="col-6">

              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">Data Pengguna</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>User</th>
                        <th>Level</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1;
                      foreach ($user as $u) : ?>
                        <tr>
                          <td><?= $i++; ?></td>
                          <td><?= $u['nama_pengguna']; ?></td>
                          <td><?= $u['level']; ?></td>
                          <td><a href="infouser.php?id=<?= $u['id_user']; ?>">more</a></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
            <!-- <div col-6"> -->
            <div class="col-6">
              <!-- /.card -->
              <div class="card card-primary collapsed-card">
                <div class="card-header">
                  <h3 class="card-title">Expandable</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Admin</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th width="10px">#</th>
                            <th>Nama Admin</th>
                            <th>NIP</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $i = 1;
                          ?>
                          <tr>
                            <td style="text-align: center"><?php echo $i; ?>.</td>
                            <td><?php echo $u['nama_pengguna']; ?> </td>
                            <td><?php echo $u['nip']; ?></td>
                            <td width="130px">
                              <div style="text-align: center;">
                                <a href="infouser.php?id=<?php echo $u['id_user'] ?>" class="btn btn-info btn-xs btn-flat" style="margin: 0 5px 0 0;"><i class="fa fa-eye"></i></a>
                                <a href="editadmin.php?id=<?php echo $u['id_user']; ?>" class="btn btn-default btn-xs btn-flat" style="margin: 0 5px 0 0;"><i class="fas fa-edit"></i></a>
                                <a onclick="deleteme(<?php echo $u['id_user']; ?>)" class="btn btn-danger btn-xs btn-flat" style="margin: 0 5px 0 0;"><i class="fa fa-trash"></i></a>
                              </div>
                            </td>
                          </tr>
                          <?php
                          $i++;
                          ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <!-- </div> -->
              <!-- /.col-md-6 -->

              <!-- /.login-box -->
              <!-- <div class="col-6"> -->
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