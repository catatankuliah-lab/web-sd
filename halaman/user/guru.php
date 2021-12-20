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
    include_once('header_dashboard_guru.php');
?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SDN 1 Kertawinangun | Guru</title>
<?php
    include_once("header.php");
?>
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
<?php
                $nilai_active = "";
                $dashboard_active = "";
                $persiswa_active = "";
                if($_GET['page'] == "1") {
?>
                    <a href="#" class="nav-link">Nilai Mata Pelajaran</a>
<?php
                    $nilai_active = "active";
                    $dashboard_active = "";
                    $persiswa_active = "";
                } else if ($_GET['page'] == "2"){
?>
                    <a href="#" class="nav-link">Nilai Mata Pelajaran ( <?=$_SESSION['nama_matapelajaran'];?> )</a>
                    
<?php
                    $nilai_active = "active";
                    $dashboard_active = "";
                    $persiswa_active = "";
                } else if($_GET['page'] == "0"){
?>
                    <a href="#" class="nav-link">Dashboard</a>
<?php
                    $dashboard_active = "active";
                    $nilai_active = "";
                    $persiswa_active = "";
                } else if ($_GET['page'] == "3"){
?>
                    <a href="#" class="nav-link">Nilai Mata Pelajaran ( <?=$_SESSION['nama_matapelajaran'];?> )</a>
                    
<?php
                    $nilai_active = "active";
                    $dashboard_active = "";
                    $persiswa_active = "";
                } else if ($_GET['page'] == "6" || $_GET['page'] == "7"){
?>
                    <a href="#" class="nav-link">Nilai Siswa</a>
                    
<?php
                    $nilai_active = "";
                    $dashboard_active = "";
                    $persiswa_active = "active";
                }
?>
            </li>
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
        <a href="#" class="brand-link text-center">
            <span>SD N 1 KERTAWINANGUN</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                <a href="#" class="d-block"><?=$_SESSION['nama'];?></a>
                </div>
            </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="guru.php?mpid=0&page=0" class="nav-link <?=$dashboard_active;?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link <?=$nilai_active;?>">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Nilai Mata Pelajaran
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
            <?php
                            while($data_matapelajaran = mysqli_fetch_array($result_query_matapelajaran)) {
            ?>
                            <li class="nav-item">
                                <a href="guru.php?mpid=<?= $data_matapelajaran['id_matapelajaran']; ?>&page=1" class="nav-link">
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
                            <a href="guru.php?page=6" class="nav-link <?=$persiswa_active;?>">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Nilai Siswa
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
    $page = $_GET['page'];
    if($page == "1") {
        include("content_detai_nilai.php");
    } else if($page == "2") {
        include("content_input_nilai.php");
    } else if($page == "3") {
        include("content_input_kkm.php");
    } else if($page == "4") {
        include("proses_update_kkm.php");
    } else if($page == "5") {
        include("proses_update_nilai.php");
    } else if($page == "6") {
        include("content_nilai_siswa.php");
    } else if($page == "7") {
        include("content_rincian_nilai.php");
    } else {
        include('content_dashboard.php');
    }
    include_once("footer.php");
?>
  </body>
  </html>
<?php
  }
?>
