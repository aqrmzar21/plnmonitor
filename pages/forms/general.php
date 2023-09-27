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
  <title>SIMPLN | Form Kinerja</title>
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
                        <input type="text" name="cols1" class="form-control is-info">
                        <span class="input-group-append">
                          <button type="button" class="btn btn-info btn-flat">S</button>
                        </span>
                      </div>
                      <!-- /input-group -->
                      <div class="input-group col-sm-2">
                        <input type="text" name="pb_r1" class="form-control is-info">
                        <span class="input-group-append">
                          <button type="button" class="btn btn-info btn-flat">R</button>
                        </span>
                      </div>
                      <!-- /input-group -->
                      <div class="input-group col-sm-2">
                        <input type="text" name="colb1" class="form-control is-info">
                        <span class="input-group-append">
                          <button type="button" class="btn btn-info btn-flat">B</button>
                        </span>
                      </div>
                      <!-- /input-group -->
                      <div class="input-group col-sm-2">
                        <input type="text" name="coli1" class="form-control is-info">
                        <span class="input-group-append">
                          <button type="button" class="btn btn-info btn-flat">I</button>
                        </span>
                      </div>
                      <!-- /input-group -->
                      <div class="input-group col-sm-2">
                        <input type="text" name="colp1" class="form-control is-info">
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
                        <input type="number" class="form-control-lg form-control" value="<?= $pr1['cols1']; ?>">
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
                        <input type="number" class="form-control-lg form-control" value="<?= $pr1['colr1']; ?>">
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
                        <input type="number" class="form-control-lg form-control" value="<?= $pr1['colb1']; ?>">
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
                        <input type="number" class="form-control-lg form-control" value="<?= $pr1['coli1']; ?>">
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
                        <input type="number" class="form-control-lg form-control" value="<?= $pr1['colp1']; ?>">
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
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Different Styles</h3>
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
                <div class="card-body">
                  <h4>Input</h4>
                  <div class="form-group">
                    <label for="exampleInputBorder">Bottom Border only <code>.form-control-border</code></label>
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder=".form-control-border">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputBorderWidth2">Bottom Border only 2px Border
                      <code>.form-control-border.border-width-2</code></label>
                    <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder=".form-control-border.border-width-2">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputRounded0">Flat <code>.rounded-0</code></label>
                    <input type="text" class="form-control rounded-0" id="exampleInputRounded0" placeholder=".rounded-0">
                  </div>
                  <h4>Custom Select</h4>
                  <div class="form-group">
                    <label for="exampleSelectBorder">Bottom Border only <code>.form-control-border</code></label>
                    <select class="custom-select form-control-border" id="exampleSelectBorder">
                      <option>Value 1</option>
                      <option>Value 2</option>
                      <option>Value 3</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectBorderWidth2">Bottom Border only
                      <code>.form-control-border.border-width-2</code></label>
                    <select class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2">
                      <option>Value 1</option>
                      <option>Value 2</option>
                      <option>Value 3</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectRounded0">Flat <code>.rounded-0</code></label>
                    <select class="custom-select rounded-0" id="exampleSelectRounded0">
                      <option>Value 1</option>
                      <option>Value 2</option>
                      <option>Value 3</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
              <!-- Form Element sizes -->
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Different Height</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg">
                  <br>
                  <input class="form-control" type="text" placeholder="Default input">
                  <br>
                  <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm">
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

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
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">General Elements</h3>
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
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Text</label>
                          <input type="text" class="form-control" placeholder="Enter ...">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Text Disabled</label>
                          <input type="text" class="form-control" placeholder="Enter ..." disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                          <label>Textarea</label>
                          <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Textarea Disabled</label>
                          <textarea class="form-control" rows="3" placeholder="Enter ..." disabled></textarea>
                        </div>
                      </div>
                    </div>

                    <!-- input states -->
                    <div class="form-group">
                      <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Input with
                        success</label>
                      <input type="text" class="form-control is-valid" id="inputSuccess" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                      <label class="col-form-label" for="inputWarning"><i class="far fa-bell"></i> Input with
                        warning</label>
                      <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                      <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i> Input with
                        error</label>
                      <input type="text" class="form-control is-invalid" id="inputError" placeholder="Enter ...">
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <!-- checkbox -->
                        <div class="form-group">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">Checkbox</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" checked>
                            <label class="form-check-label">Checkbox checked</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" disabled>
                            <label class="form-check-label">Checkbox disabled</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <!-- radio -->
                        <div class="form-group">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio1">
                            <label class="form-check-label">Radio</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio1" checked>
                            <label class="form-check-label">Radio checked</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" disabled>
                            <label class="form-check-label">Radio disabled</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                          <label>Select</label>
                          <select class="form-control">
                            <option>option 1</option>
                            <option>option 2</option>
                            <option>option 3</option>
                            <option>option 4</option>
                            <option>option 5</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Select Disabled</label>
                          <select class="form-control" disabled>
                            <option>option 1</option>
                            <option>option 2</option>
                            <option>option 3</option>
                            <option>option 4</option>
                            <option>option 5</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <!-- Select multiple-->
                        <div class="form-group">
                          <label>Select Multiple</label>
                          <select multiple class="form-control">
                            <option>option 1</option>
                            <option>option 2</option>
                            <option>option 3</option>
                            <option>option 4</option>
                            <option>option 5</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Select Multiple Disabled</label>
                          <select multiple class="form-control" disabled>
                            <option>option 1</option>
                            <option>option 2</option>
                            <option>option 3</option>
                            <option>option 4</option>
                            <option>option 5</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.card-body -->
              </div>
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