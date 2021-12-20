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
?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SDN 1 Kertawinangun | Admin</title>
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
                $guru_active = "";
                $dashboard_active = "";
                $siswa_active = "";
                $mp = "";
                if($_GET['page'] == "1" || $_GET['page'] == "4" || $_GET['page'] == "5" | $_GET['page'] == "6") {
?>
                    <a href="#" class="nav-link">Data Guru</a>
<?php
                    $guru_active = "active";
                    $dashboard_active = "";
                    $siswa_active = "";
                    $mp = "";
                } else if ($_GET['page'] == "2"){
?>
                    <a href="#" class="nav-link">Data Mata Pelajaran</a>
                    
<?php
                    $guru_active = "";
                    $dashboard_active = "";
                    $siswa_active = "";
                    $mp = "active";
                } else if($_GET['page'] == "0"){
?>
                    <a href="#" class="nav-link">Dashboard</a>
<?php
                    $dashboard_active = "active";
                    $nilai_active = "";
                    $persiswa_active = "";
                } else if ($_GET['page'] == "3"){
?>
                    <a href="#" class="nav-link">Data Siswa</a>
                    
<?php
                    $guru_active = "";
                    $dashboard_active = "";
                    $siswa_active = "active";
                    $mp = "";
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
                <a href="#" class="d-block">Nama Pengguna (Admin)</a>
                </div>
            </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="admin.php?page=0" class="nav-link <?=$dashboard_active;?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin.php?page=1" class="nav-link <?=$guru_active;?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Data Guru
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin.php?page=2" class="nav-link <?=$mp;?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Data Mata Pelajaran
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin.php?page=3" class="nav-link <?=$siswa_active;?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Data Siswa
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
        include("content_guru.php");
    } else if($page == "2") {
        include("content_guru.php");
    } else if($page == "4") {
        include("content_input_guru.php");
    } else if($page == "5") {
        include("proses_input_guru.php");
    } else if($page == "6") {
        include("content_update_guru.php");
    } else if($page == "7") {
        include("proses_update_guru.php");
    } else if($page == "8") {
        include("content_rincian_nilai.php");
    } else {
        include('content_dashboard_admin.php');
    }
    include_once("footer.php");
?>
  </body>
  </html>
<?php
  }
?>