<?php
session_start();

// cek jika belum login maka akan mengarahkan ke hal login
if (!isset($_SESSION['login'])) {
  header("Location: pages/examples/login.php");
  exit;
}

require 'proses/proses-form.php';

$pb1 = query("SELECT * FROM pascabayar1")[0];
$pr1 = query("SELECT * FROM prabayar1")[0];

if (isset($_POST['subk'])) {
  if (subk($_POST) > 0) {
    echo "<script>
          alert('data berhasil ditambahkan');
          </script>";
  } else {
    echo "<script>
          alert('data gagal ditambahkan');
          </script>";
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PLNMeetSign | Form Kinerja</title>
  <link rel="icon" href="../../dist/img/favicon.ico">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?php
    include '../layout/top-nav.php'
    ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php
    include '../layout/sidebar.php'
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>General Form</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">General Form</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- Horizontal Form -->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Data KWh</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                  <form action="" method="POST" class="form-horizontal">

                    <div class="form-group row">
                      <label for="inputwarning" class="col-sm-1 col-form-label">Pra Bayar</label>

                      <div class="input-group col-sm-2">
                        <input type="text" name="cols1" class="form-control is-warning">
                        <span class="input-group-append">
                          <button type="button" class="btn btn-warning btn-flat">S</button>
                        </span>
                      </div>
                      <!-- /input-group -->
                      <div class="input-group col-sm-2">
                        <input type="text" name="colr1" class="form-control is-warning">
                        <span class="input-group-append">
                          <button type="button" class="btn btn-warning btn-flat">R</button>
                        </span>
                      </div>
                      <!-- /input-group -->
                      <div class="input-group col-sm-2">
                        <input type="text" name="colb1" class="form-control is-warning">
                        <span class="input-group-append">
                          <button type="button" class="btn btn-warning btn-flat">B</button>
                        </span>
                      </div>
                      <!-- /input-group -->
                      <div class="input-group col-sm-2">
                        <input type="text" name="coli1" class="form-control is-warning">
                        <span class="input-group-append">
                          <button type="button" class="btn btn-warning btn-flat">I</button>
                        </span>
                      </div>
                      <!-- /input-group -->
                      <div class="input-group col-sm-2">
                        <input type="text" name="colp1" class="form-control is-warning">
                        <span class="input-group-append">
                          <button type="button" class="btn btn-warning btn-flat">P</button>
                        </span>
                      </div>
                      <!-- /input-group -->
                    </div>

                    <div class="form-group row">
                      <label for="input2" class="col-sm-1 col-form-label">Pasca Bayar</label>
                      <div class="input-group col-sm-2">
                        <input type="text" name="pr_s1" class="form-control is-info">
                        <span class="input-group-append">
                          <button type="button" class="btn btn-info btn-flat">S</button>
                        </span>
                      </div>
                      <!-- /input-group -->
                      <div class="input-group col-sm-2">
                        <input type="text" name="pr_r1" class="form-control is-info">
                        <span class="input-group-append">
                          <button type="button" class="btn btn-info btn-flat">R</button>
                        </span>
                      </div>
                      <!-- /input-group -->
                      <div class="input-group col-sm-2">
                        <input type="text" name="pr_b1" class="form-control is-info">
                        <span class="input-group-append">
                          <button type="button" class="btn btn-info btn-flat">B</button>
                        </span>
                      </div>
                      <!-- /input-group -->
                      <div class="input-group col-sm-2">
                        <input type="text" name="pr_i1" class="form-control is-info">
                        <span class="input-group-append">
                          <button type="button" class="btn btn-info btn-flat">I</button>
                        </span>
                      </div>
                      <!-- /input-group -->
                      <div class="input-group col-sm-2">
                        <input type="text" name="pr_p1" class="form-control is-info">
                        <span class="input-group-append">
                          <button type="button" class="btn btn-info btn-flat">P</button>
                        </span>
                      </div>
                      <!-- /input-group -->
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info" name="subk">Submit</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
                </form>
              </div>
              <!-- /.card -->
            </div>
            <!-- left column -->
            <div class="col-md-6">

              <!-- general form elements -->
              <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Data KWh</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="row card-body">
                  <div class="col-sm-6">

                    <form action="">
                      <h4 class="h4">Pasca Bayar</h4>

                      <div class="input-group mb-3">
                        <div class="input-group-prepend ">
                          <span class="input-group-text bg-orange">
                            <img class="img-circle img-bordered-md" src="../../dist/img/img-3.png" alt="user image" width="25px">
                          </span>
                        </div>
                        <input type="number" class="form-control-lg form-control" name="cols1" value="<?= $pb1['cols1']; ?>">
                        <div class="input-group-append">
                          <span class="input-group-text bg-orange" name="gols"><strong>S</strong></span>
                        </div>
                      </div>

                      <div class="input-group mb-3">
                        <div class="input-group-prepend ">
                          <span class="input-group-text bg-danger">
                            <img class="img-circle img-bordered-md" src="../../dist/img/img-4.png" alt="user image" width="25px">
                          </span>
                        </div>
                        <input type="number" class="form-control-lg form-control" name="colr1" value="<?= $pb1['colr1']; ?>">
                        <div class="input-group-append">
                          <span class="input-group-text bg-danger" name="golr"><strong>R</strong></span>
                        </div>
                      </div>

                      <div class="input-group mt-3">
                        <div class="input-group-prepend ">
                          <span class="input-group-text bg-lightblue">
                            <img class="img-circle img-bordered-md" src="../../dist/img/img-5.png" alt="user image" width="25px">
                          </span>
                        </div>
                        <input type="number" class="form-control-lg form-control" name="colb1" value="<?= $pb1['colb1']; ?>">
                        <div class="input-group-append">
                          <span class="input-group-text bg-lightblue" name="golb"><strong>B</strong></span>
                        </div>
                      </div>

                      <div class="input-group mt-3">
                        <div class="input-group-prepend ">
                          <span class="input-group-text bg-olive">
                            <img class="img-circle img-bordered-md" src="../../dist/img/img-6.png" alt="user image" width="25px">
                          </span>
                        </div>
                        <input type="number" class="form-control-lg form-control" name="coli1" value="<?= $pb1['coli1']; ?>">
                        <div class="input-group-append">
                          <span class="input-group-text bg-olive" name="goli"><strong>I</strong></span>
                        </div>
                      </div>

                      <div class="input-group mt-3">
                        <div class="input-group-prepend ">
                          <span class="input-group-text bg-warning">
                            <img class="img-circle img-bordered-md" src="../../dist/img/img-7.png" alt="user image" width="25px">
                          </span>
                        </div>
                        <input type="number" class="form-control-lg form-control" name="colp1" value="<?= $pb1['colp1']; ?>">
                        <div class="input-group-append">
                          <span class="input-group-text bg-warning" name="golp"><strong>P</strong></span>
                        </div>
                      </div>

                      <p>Small <code>.input-group.input-group-sm</code></p>
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control">
                        <span class="input-group-append">
                          <button type="button" class="btn btn-secondary btn-flat">Go!</button>
                        </span>
                      </div>
                      <!-- /input-group -->
                    </form>
                  </div>
                  <div class="col-sm-6">
                    <form>

                      <h4 class="h4">Pra Bayar</h4>

                      <div class="input-group mb-3">
                        <div class="input-group-prepend ">
                          <span class="input-group-text bg-orange">
                            <img class="img-circle img-bordered-md" src="../../dist/img/img-3.png" alt="user image" width="25px">
                          </span>
                        </div>
                        <input type="number" class="form-control-lg form-control" value="<?= $pr1['pr_s1']; ?>">
                        <div class="input-group-append">
                          <span class="input-group-text bg-orange" name="gols"><strong>S</strong></span>
                        </div>
                      </div>

                      <div class="input-group mb-3">
                        <div class="input-group-prepend ">
                          <span class="input-group-text bg-danger">
                            <img class="img-circle img-bordered-md" src="../../dist/img/img-4.png" alt="user image" width="25px">
                          </span>
                        </div>
                        <input type="number" class="form-control-lg form-control" value="<?= $pr1['pr_r1']; ?>">
                        <div class="input-group-append">
                          <span class="input-group-text bg-danger" name="golr"><strong>R</strong></span>
                        </div>
                      </div>

                      <div class="input-group mt-3">
                        <div class="input-group-prepend ">
                          <span class="input-group-text bg-lightblue">
                            <img class="img-circle img-bordered-md" src="../../dist/img/img-5.png" alt="user image" width="25px">
                          </span>
                        </div>
                        <input type="number" class="form-control-lg form-control" value="<?= $pr1['pr_b1']; ?>">
                        <div class="input-group-append">
                          <span class="input-group-text bg-lightblue" name="golb"><strong>B</strong></span>
                        </div>
                      </div>

                      <div class="input-group mt-3">
                        <div class="input-group-prepend ">
                          <span class="input-group-text bg-olive">
                            <img class="img-circle img-bordered-md" src="../../dist/img/img-6.png" alt="user image" width="25px">
                          </span>
                        </div>
                        <input type="number" class="form-control-lg form-control" value="<?= $pr1['pr_i1']; ?>">
                        <div class="input-group-append">
                          <span class="input-group-text bg-olive" name="goli"><strong>I</strong></span>
                        </div>
                      </div>

                      <div class="input-group mt-3">
                        <div class="input-group-prepend ">
                          <span class="input-group-text bg-warning">
                            <img class="img-circle img-bordered-md" src="../../dist/img/img-7.png" alt="user image" width="25px">
                          </span>
                        </div>
                        <input type="number" class="form-control-lg form-control" value="<?= $pr1['pr_p1']; ?>">
                        <div class="input-group-append">
                          <span class="input-group-text bg-warning" name="golp"><strong>P</strong></span>
                        </div>
                      </div>

                      <p>Small <code>.input-group.input-group-sm</code></p>
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control">
                        <span class="input-group-append">
                          <button type="button" class="btn btn-secondary btn-flat">Go!</button>
                        </span>
                      </div>
                      <!-- /input-group -->


                    </form>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
              <!-- /.card -->

              <!-- general form elements -->

              <!-- /.card -->

            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
              <!-- Form Element sizes -->
              <div class="row">
                <div class="col-sm-6">
                  <div class="card card-danger">
                    <div class="card-header">
                      <h3 class="card-title">Pra Bayar</h3>
                    </div>
                    <div class="card-body">
                      <div class="input-group row">
                        <div class="mb-2">
                          <input type="text" class="form-control" placeholder="col-S">
                        </div>
                        <div class="mb-2">
                          <input type="text" class="form-control" placeholder=".col-R">
                        </div>
                        <div class="mb-2">
                          <input type="text" class="form-control" placeholder=".col-B">
                        </div>
                        <div class="mb-2">
                          <input type="text" class="form-control" placeholder=".col-P">
                        </div>
                        <div class="mb-2">
                          <input type="text" class="form-control" placeholder=".col-P">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <div class="col-6">
                  <!-- Input addon -->
                  <div class="card card-secondary">
                    <div class="card-header">
                      <h3 class="card-title">Pasca Bayar</h3>
                    </div>
                    <div class="card-body">
                      <div class="input-group row">
                        <div class="mb-2">
                          <input type="text" class="form-control" placeholder="col-S">
                        </div>
                        <div class="mb-2">
                          <input type="text" class="form-control" placeholder=".col-R">
                        </div>
                        <div class="mb-2">
                          <input type="text" class="form-control" placeholder=".col-B">
                        </div>
                        <div class="mb-2">
                          <input type="text" class="form-control" placeholder=".col-P">
                        </div>
                        <div class="mb-2">
                          <input type="text" class="form-control" placeholder=".col-P">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card -->
                </div>
              </div>

              <!-- general form elements disabled -->

              <!-- /.card -->
              <!-- general form elements disabled -->
            </div>
            <!-- /.card -->


          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->
    <?php
    include '../layout/footer.php';
    ?>
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      bsCustomFileInput.init();
    });
  </script>
</body>

</html>