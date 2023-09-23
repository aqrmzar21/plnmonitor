<?php
// pangggil koneksi ke database
require 'proses/prosesa.php';

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

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a href="absen.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="../tables/data.php" class="nav-link">Data Detail</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="#" class="dropdown-item">Some action </a></li>
                                <li><a href="absensi.php" class="dropdown-item">Data Detail</a></li>

                                <li class="dropdown-divider"></li>

                                <!-- Level two dropdown-->
                                <li class="dropdown-submenu dropdown-hover">
                                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                        <li>
                                            <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                                        </li>

                                        <!-- Level three dropdown-->
                                        <li class="dropdown-submenu">
                                            <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                                            <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                                                <li><a href="#" class="dropdown-item">3rd level</a></li>
                                                <li><a href="#" class="dropdown-item">3rd level</a></li>
                                            </ul>
                                        </li>
                                        <!-- End Level three -->

                                        <li><a href="#" class="dropdown-item">level 2</a></li>
                                        <li><a href="#" class="dropdown-item">level 2</a></li>
                                    </ul>
                                </li>
                                <!-- End Level two -->
                            </ul>
                        </li>
                    </ul>


                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- SEARCH FORM -->
                    <form class="form-inline ml-0 ml-md-3">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>

                </ul>
            </div>
        </nav>
        <!-- /.navbar -->


        <div w3-include-html="../layout/sidebar.html"></div>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"> Tambah Absensi <small>Data</small></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Layout</a></li>
                                <li class="breadcrumb-item active">Top Navigation</li>
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
                        <div class="col-lg-6">

                            <!-- CARD FORM INPUT  -->
                            <div class="card card-primary">
                                <!-- Horizontal Form -->
                                <div class="card-header">
                                    <h3 class="card-title">Form Input</h3>
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
                                            <input type="text" class="form-control" id="name" name="nm_absen" placeholder="Enter Fullname" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">No HP</label>
                                            <input type="text" class="form-control" id="nohp" name="nope" placeholder="Enter +62" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="agenda">Unit</label>
                                            <input type="text" class="form-control" id="agenda" name="unit" placeholder="Enter nama Unit/Perusahaan" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="kabid">Jabatan</label>
                                            <!-- <input type="text" class="form-control" id="leader" name="bidang" required> -->
                                            <select name="bidang" id="kabid" class="form-control custom-select" placeholder="Enter Jabatan">
                                                <option value="" disabled selected>Jabatan/Bidang</option>
                                                <option value="REN">Perencanaan</option>
                                                <option value="Pengadaan">Pengadaan</option>
                                                <option value="Pembangkitan">Pembangkitan</option>
                                                <option value="Jaringan">Jaringan</option>
                                                <option value="SDM">Pemberdayaan</option>
                                                <option value="PAD">Keuangan</option>
                                                <option value="UP2K">UP2K</option>
                                                <option value="TEL">Transaksi Energi Listrik</option>
                                            </select>
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

                        <div class="col-lg-6">

                            <!-- card-outline -->
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title m-0">Form Data</h5>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-sm">

                                        <tr>
                                            <th style="width: 50px">#</th>
                                            <th>Nama</th>
                                            <th style="width: 20px">Status</th>
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


    <!-- <form method="POST" action="upload.php">
            <h5>Tanda Tangan Touch Screen</h5>
            <label class="" for="">Tanda Tangan:</label>
            <br />
            <div id="sig"></div>
            <textarea id="signature64" name="signed" style="display: none"></textarea>
            <br />
            <button id="clear" class="btn btn-danger">Hapus Tanda Tangan</button>
            <button class="btn btn-success">Submit</button>
        </form> -->
    <!-- /.container -->


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

            return [year, month, day].join('-');
        }

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
                url: 'http://localhost/plnmonitor/post_absen.php',
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
            $.get("http://localhost/plnmonitor/get_absen.php", function(data, status) {
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
    </script>

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