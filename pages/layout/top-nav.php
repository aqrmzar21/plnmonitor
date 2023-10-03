<!-- Navbar dalam pages/../ -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- ZoomOut Halaman  
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li> -->
    <!-- Navbar UserLegacy -->
    <li class="nav-item dropdown user-menu">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        <img src="../../dist/img/logo 40x30.png" class="user-image img-circle elevation-2" alt="User Image">
        <span class="d-none d-md-inline">Admin Operator</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <!-- User image -->
        <li class="user-header bg-dark">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

          <p>
            <?php
            // $us = mysqli_query($conn, "SELECT * FROM t_datauser WHERE username = '$username'");

            echo $d['nama_pengguna'];
            ?>
            <small>since 2023</small>
          </p>
        </li>
        <!-- Menu Body -->
        <!-- Menu Footer-->
        <li class="user-footer">
          <a href="#" class="btn btn-default btn-flat"><i class="fa fa-id-badge" aria-hidden="true"></i> Profile</a>
          <a href="#" class="btn btn-default btn-flat float-right"><i class="fa fa-power-off" aria-hidden="true"></i>
            Sign out</a>
        </li>
      </ul>
    </li>
    <!-- Messages Dropdown Menu -->
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <!-- Notifications Dropdown Menu -->

  </ul>
</nav>
<!-- /.navbar -->