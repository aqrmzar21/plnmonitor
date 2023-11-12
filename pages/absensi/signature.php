<?php
// pangggil koneksi ke database
// require '../../db/function.php';
require 'proses.php';

if (isset($_POST['signed'])) {
    if (signed($_POST) > 0) {
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
<html>

<head>
    <title>SIMPLN | Absensi</title>
    <link rel="icon" href="../../dist/img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script type="text/javascript" src="js/jquery.signature.min.js"></script>
    <script type="text/javascript" src="js/jquery.ui.touch-punch.min.js"></script>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../dist/css/bg.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.signature.css">

    <style>
        .kbw-signature {
            width: 500px;
            height: 160px;
        }

        #sig canvas {
            width: 100% !important;
            height: auto;
        }

        .bgw {
            background-color: white;
        }
    </style>
</head>

<body class="hold-transition layout-top-nav">
    <div class="container">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light navbar-white">

            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                <!-- Left navbar links -->
                <ul class="navbar-nav navbar-no-expand">
                    <!-- SEARCH FORM -->

                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    </li>

                </ul>
                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav ml-auto">

                    <li class="nav-item dropdown">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">PerKategori</a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                            <li><a href="#" class="dropdown-item">Internal </a></li>
                            <li><a href="#" class="dropdown-item">External</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="../tables/data.php" class="nav-link">Data Detail</a>
                    </li>
                    <li class="nav-item">
                        <a href="absensi.php" class="nav-link"><i class="fa fa-home" aria-hidden="true"></i></a>
                    </li>
                </ul>


            </div>

        </nav>
        <!-- /.navbar -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper bg-wt">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"> <strong>Absensi</strong> <small class="text-md">Rapat</small></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb" id="currentDateTime"></li> -->
                                <ol class="breadcrumb float-sm-right">
                                    <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                                    <li class="breadcrumb-item"><a href="#">Tanggal : </a></li>
                                    <!-- <li class="breadcrumb"> Tanggal : </li> -->
                                    <!-- <li class="breadcrumb" id="currentDateTime">Waktu : </li> -->
                                    <li class="breadcrumb active" id="currentDate"> </li>
                                </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">

                        <!-- Colom Tanda Tangan form di Atas -->
                        <div class="col-lg-7">

                            <!-- CARD FORM INPUT  -->
                            <div class="card card-primary">
                                <!-- Horizontal Form -->
                                <div class="card-header">
                                    <h3 class="card-title">Form Absensi</h3>
                                </div>

                                <!-- /.card-header -->
                                <!-- form start -->
                                <form class="form-horizontal" id="form" enctype="multipart/form-data">
                                    <div class="card-body">

                                        <!-- <div class="form-group">
                                                <label for="tgl">Tanggal<input type="date" name="tanggal" class="form-control mt-2" required></label>
                                                <label for="time">Waktu<input type="time" name="waktu" class="form-control mt-2" required></label>
                                            </div> -->
                                        <div class="form-group">
                                            <label for="name">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="name" name="nm_absen" placeholder="Enter Fullname" autofocus required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">No HP</label>
                                            <input type="text" class="form-control" id="nohp" name="nope" placeholder="Enter 08xxxxxx" onkeypress="isInputNumber(event)" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="agenda">Unit</label>
                                            <input type="text" class="form-control" id="agenda" name="unit" placeholder="Enter nama Unit/Perusahaan" autocapitalize="word" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="kabid">Jabatan</label>
                                            <!-- <input type="text" class="form-control" id="leader" name="bidang" required> -->
                                            <?php
                                            include 'css/opsi.php';
                                            ?>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-10">
                                                <label class="col-form-label" for="sig">Tanda Tangan</label>
                                                <br />
                                                <div id="sig"></div>
                                                <textarea id="signature64" name="signed" style="display: none"></textarea>
                                            </div>
                                            <div class="col-2">
                                                <!-- <button id="clear" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button> -->
                                                <!-- <button class="btn btn-sm btn-outline-success"><i class="fa fa-paper-plane"></i></button> -->
                                            </div>
                                        </div>
                                        <button class="btn btn-sm btn-success float-right mx-2"><i class="fa fa-paper-plane"> Submit</i></button>
                                        <button id="clear" class="btn btn-sm btn-outline-danger float-right"><i class="fa fa-trash"></i></button>
                                        <!-- <button type="submit" class="btn btn-primary float-right" name="add">Next</button> -->
                                        <!-- <button type="submit" class="btn btn-primary float-right" name="signed">Next</button> -->
                                        <button type="submit" class="btn btn-default"><a href="absen.php">Cancel</a></button>
                                    </div>
                                    <!-- /.card-body -->
                                </form>
                                <!-- /.div-card -->
                            </div>
                            <!-- /.card -->

                        </div>
                        <!-- /.col-lg-6 -->

                        <div class="col-lg-5">

                            <!-- card-outline -->
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title m-0">Form Data</h5>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-sm">

                                        <tr>
                                            <th style="width: 50px">Time</th>
                                            <th>Nama</th>
                                            <th style="width: 20px">Unit</th>
                                        </tr>

                                        <tbody id="absensiBerhasil">

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <!-- /.card-primary -->

                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->

            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Main Footer -->
        <footer class="main-footer">

            <!-- Default to the left -->
            <strong>Copyright &copy; 2023 PT. PLN UP3 KOTA GORONTALO.</strong> All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 4.0
            </div>
        </footer>
        <!-- Akhir main Footer  -->

    </div>
    <!-- ./wrapper -->

    <script type="text/javascript">
        var sig = $('#sig').signature({
            syncField: '#signature64',
            syncFormat: 'PNG'
        });
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });

        function isInputNumber(evt) {

            var ch = String.fromCharCode(evt.which);

            // Mengecek apakah karakter adalah digit (0-9) atau titik (".")
            if (!/^\d*\.?\d*$/.test(ch)) {
                evt.preventDefault();
            }

        }
    </script>

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        })

        const formatDate = (date) => {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [year, month, day].join('/');
        }

        function updateDate() {
            const currentDate = new Date();
            const formattedDate = formatDate(currentDate);
            document.getElementById('currentDate').textContent = '  ' + formattedDate;
        }

        // Memanggil fungsi updateDate setiap detik
        setInterval(updateDate, 1000);

        const clearForm = (e) => {
            e.target[0].value = ''
            e.target[1].value = ''
            e.target[2].value = ''
            e.target[3].value = ''
            e.target[4].value = ''
            sig.signature('clear')
            $("#signature64").val('')
        }

        $("#form").on("submit", (e) => {
            e.preventDefault()

            // mengirim request
            // 1. mengambil semua value pada input form
            // 2. membuat request ke post_absen.php

            const today = new Date()
            const tanggal = today.toLocaleDateString()
            const waktu = today.toLocaleTimeString([], {
                hour12: false,
                hour: "2-digit",
                minute: "2-digit"
            })

            function updateDateTime() {
                const currentDateTime = `${waktu}`;
                document.getElementById('currentDateTime').textContent = 'Waktu saat ini: ' + currentDateTime;
            }

            // Memanggil fungsi updateDateTime setiap detik
            setInterval(updateDateTime, 1000);

            const data = new FormData()

            data.append('tanggal', formatDate(tanggal))
            data.append('waktu', waktu)
            data.append('nm_absen', e.target[0].value)
            data.append('email', e.target[1].value)
            data.append('nope', e.target[2].value)
            data.append('unit', e.target[3].value)
            data.append('bidang', e.target[4].value)
            data.append('signed', $("#signature64").val())

            $.ajax({
                // INI DISESUAIKAN LAGI DATA YANG DISIMPAN Setalah di Hosting
                // url: 'http://localhost/plnmonitor/post_absen.php',
                url: 'http://localhost/plnmonitor/pages/absensi/proses/post_absen.php',
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                success: function(data) {
                    const response = JSON.parse(data)

                    if (response.success) {
                        clearForm(e)
                        return Toast.fire({
                            icon: 'success',
                            title: response.message
                        })
                    }

                    Toast.fire({
                        icon: 'error',
                        title: response.message
                    })
                }
            })
        })

        setInterval(() => {
            // INI KETIKA DI HOSTING Harus di ubah sesuai dengann hal yang lainnya
            // $.get("http://localhost/plnmonitor/get_absen.php", function(data, status) {
            $.get("http://localhost/plnmonitor/pages/absensi/proses/get_absen.php", function(data, status) {
                let rows = ''
                for (let i = 0; i < data.length; i++) {
                    const row = `
                        <tr>
                            <td><span class="badge bg-info">${data[i].waktu}</span></td>
                            <td>${data[i].nm_absen}</td>
                            <td><span class="badge bg-success">${data[i].unit}</span></td>
                        </tr>`
                    rows += row
                }
                $("#absensiBerhasil").html(rows)
            });
        }, 1000)

        // setInterval(() => {
        //     $.get("http://localhost/plnmonitor/pages/absensi/proses/get_absen.php", function(data, status) {
        //         let rows = '';
        //         const currentTime = new Date(); // Waktu saat ini
        //         for (let i = 0; i < data.length; i++) {
        //             const waktuAbsen = new Date(data[i].waktu); // Waktu absen dari data
        //             // Bandingkan apakah waktu absen adalah di masa lalu
        //             if (waktuAbsen >= currentTime) {
        //                 const row = `
        //             <tr>
        //                 <td><span class="badge bg-info">${data[i].waktu}</span></td>
        //                 <td>${data[i].nm_absen}</td>
        //                 <td><span class="badge bg-success">${data[i].unit}</span></td>
        //             </tr>`;
        //                 rows += row;
        //             }
        //         }
        //         $("#absensiBerhasil").html(rows);
        //     });
        // }, 1000);
    </script>

</body>

</html>