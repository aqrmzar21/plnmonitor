<?php
require '../../../db/function.php';

$id = $_GET['id'];

// query atau cari data berdasarkan id
$ubah = query("SELECT * FROM t_datapengunjung WHERE id_absen=$id");

if (isset($_POST['edit'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
        alert('data berhasil diubah');  
        document.location.href ='../absen.php';
        </script>";
  } else {
    echo "<script>
        alert('data gagal diubah');
        document.location.href ='../signature.php';
        </script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIMPLN | Ubah Data</title>

  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
</head>

<body>

  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Editing Form</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="" class="form-horizontal">
      <div class="card-body">
        <div class="form-group row">
          <label for="inputName3" class="col-sm-2 col-form-label">Nama Lengkap</label>
          <div class="col-sm-10">
            <input type="hidden" class="form-control" name="id_absen" value="<?= $ubah['id_absen']; ?>">
            <input type="text" class="form-control" id="inputName3" name="nm_pgnjng" value="<?= $ubah['nm_pgnjng']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail3" name="email" value="<?= $ubah['email']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputNoHP" class="col-sm-2 col-form-label">Nomor HP</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="inputNoHP" name="nohp" value="<?= $ubah['nohp']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputTema3" class="col-sm-2 col-form-label">Unit/Perusahaan</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="agenda" id="inputTema3" value="<?= $ubah['agenda']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputJob" class="col-sm-2 col-form-label">Bidang</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="kprluan" value="<?= $ubah['kprluan']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" name="tgl" value="<?= $ubah['tgl']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputTime" class="col-sm-2 col-form-label">Time</label>
          <div class="col-sm-10">
            <input type="time" class="form-control" name="waktu" value="<?= $ubah['waktu']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label" for="sig">Tanda Tangan</label>
          <div id="sig" class="col-sm-10">
            <!-- <textarea id="signature64" name="signed" class="form-control"></textarea> -->
            <!-- <input type="image" class="form-control" name="gmbr" value=" "> -->

            <img src="../img/<?= $ubah['gambar']; ?>" alt="mysignature">
          </div>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary" name="edit">Save</button>
        <button type="submit" class="btn btn-default float-right"><a href="../absen.php">Back</a></button>
      </div>
      <!-- /.card-footer -->
    </form>
  </div>
  <!-- /.card -->

</body>

</html>