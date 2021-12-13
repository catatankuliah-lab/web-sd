<?php
  include_once '../../php/connection.php';
  session_start();
  if (!isset($_SESSION['login'])) {
?>
  <script>
      window.location = "http://localhost/web-sd/halaman/login.php";
  </script>
<?php
  } else {
      include_once('header_dashboard.php');
?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  </head>
  <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
    <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block active">
                <a href="home.html" class="nav-link">Dashboard</a>
            </li>
<?php
            if(isset($_SESSION['sub_page'])) {
                $main_page = "";
                $sub_page = "active";
                if($_SESSION['sub_page'] == "2_1") {

                }
            } else {
                $main_page = "active";
                $sub_page = "";
?>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link"></a>
            </li>
<?php
            }
?>
        </ul> 

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li><button class="btn btn-primary">Sign Out</button></li>
        </ul>
        </nav>
        <!-- /.navbar -->

    <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                <a href="#" class="d-block">Nama Pengguna (Guru)</a>
                </div>
            </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Nilai Siswa
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
            <?php
                            while($data_matapelajaran = mysqli_fetch_array($result_query_matapelajaran)) {
            ?>
                            <li class="nav-item">
                                <a href="guru.php?mpid=<?= $data_matapelajaran['id_matapelajaran']; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?= $data_matapelajaran['nama_matapelajaran']; ?></p>
                                </a>
                            </li>
            <?php
                        }
            ?>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="inputkkm.php?id=<?= $kelas ;?>" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                KMM
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
    </div>


    <!-- Content Wrapper. Contains page content -->
<?php
    // if($sub_page=='') {
    //     include('content_detai_nilai.php');
    // } else {
    //     include('content_dashboard.php');
    // }
?>
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="../../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="../../plugins/raphael/raphael.min.js"></script>
  </body>
  </html>
<?php
  }
?>
