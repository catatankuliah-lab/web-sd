<?php
  include_once("../../php/connection.php");
  session_start();
  if (!isset($_SESSION['login'])) {
?>
      <script>
          window.location = "http://localhost/web-sd/halaman/login.php";
      </script>
<?php
  } else {
  $id_url = $_GET['id'];
  $kelas = $_SESSION['kelas'];
  $result_query_li = mysqli_query($conn, "SELECT * FROM table_matapelajaran WHERE kelas=$kelas ORDER BY id_matapelajaran ASC");
  $query_nama_matapelajaran = mysqli_query($conn, "SELECT nama_matapelajaran FROM table_matapelajaran WHERE id_matapelajaran=$id_url");
  while($data_namapelajaran = mysqli_fetch_array($query_nama_matapelajaran)) {
      $nama_matapelajaran = $data_namapelajaran['nama_matapelajaran'];
  }
  $_SESSION['nama_matapelajaran'] = $nama_matapelajaran;
  $query_matapelajaran = "SELECT table_nilai_matapelajaran.*, table_siswa.nis, table_siswa.nama_siswa FROM table_nilai_matapelajaran INNER JOIN table_siswa ON table_nilai_matapelajaran.id_siswa = table_siswa.id_siswa WHERE id_matapelajaran=$id_url ORDER BY id_siswa ASC";
  $result_query_matapelajaran = mysqli_query($conn, $query_matapelajaran);
  $result_query_siswa = mysqli_query($conn, "SELECT * FROM table_siswa WHERE kelas=$kelas ORDER BY nama_siswa");
  if($result_query_matapelajaran -> num_rows > 0) {
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
      <li class="nav-item d-none d-sm-inline-block">
        <a href="home.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

     <!-- Sidebar -->
     <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">SD NEGERI 1 KERTAWINANGUN</a>
        </div>
      </div>

       <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

       <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<?php
          while($data_matapelajaran = mysqli_fetch_array($result_query_li)) {
?>
            <li class="nav-item">
              <a href="detail_nilai_matapelajaran.php?id=<?= $data_matapelajaran['id_matapelajaran']; ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p><?= $data_matapelajaran['nama_matapelajaran']; ?></p>
              </a>
            </li>
<?php
          }
?>
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper">
    <div class="row">
      <div class="col-12">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Mata Pelajaran <?= $nama_matapelajaran ;?></h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                  <li class="breadcrumb-item active">Mata Pelajaran <?= $nama_matapelajaran ;?></li>
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
          <div class="card ml-2">
            <div class="card-header" style="background-color: #3f6791;">
              <h3 class="card-title">Detail Nilai</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
              <table class="table table-bordered table-hover text-center table-fixed">
                <tr>
                  <td rowspan="2" class="align-middle">No</td>
                  <td rowspan="2" class="align-middle">NIS</td>
                  <td rowspan="2" class="align-middle" style="min-width: 300px;">Nama Siswa</td>
                  <td colspan="3" class="align-middle">Harian</td>
                  <td colspan="3" class="align-middle">PTS</td>
                  <td colspan="3" class="align-middle">PAS</td>
                  <td colspan="3" class="align-middle">KD</td>
                  <td rowspan="2" class="align-middle" style="min-width: 100px;">Niali</td>
                  <td rowspan="2" class="align-middle" style="min-width: 100px;">Predikat</td>
                  <td colspan="2" class="align-middle">Hasil</td>
                  <td rowspan="2" class="align-middle" style="min-width: 300px;">Deskripsi</td>
                  <td rowspan="2" class="align-middle">Action</td>
                </tr>
                <tr>
                  <td>H1</td>
                  <td>H2</td>
                  <td>H3</td>
                  <td>T1</td>
                  <td>T2</td>
                  <td>T3</td>
                  <td>A1</td>
                  <td>A2</td>
                  <td>A3</td>
                  <td>K1</td>
                  <td>K2</td>
                  <td>K3</td>
                  <td>MIN</td>
                  <td>MAX</td>
                </tr>
<?php
              while($data_nilai_matapelajaran = mysqli_fetch_array($result_query_matapelajaran)) {         
?>
                <tr>
                  <td>1</td>
                  <td><?= $data_nilai_matapelajaran['nis'] ;?></td>
                  <td class="text-left"><?= $data_nilai_matapelajaran['nama_siswa'] ;?></td>
                  <td><?= $data_nilai_matapelajaran['nilai_harian_1'] ;?></td>
                  <td><?= $data_nilai_matapelajaran['nilai_harian_2'] ;?></td>
                  <td><?= $data_nilai_matapelajaran['nilai_harian_3'] ;?></td>
                  <td><?= $data_nilai_matapelajaran['nilai_pts_1'] ;?></td>
                  <td><?= $data_nilai_matapelajaran['nilai_pts_2'] ;?></td>
                  <td><?= $data_nilai_matapelajaran['nilai_pts_3'] ;?></td>
                  <td><?= $data_nilai_matapelajaran['nilai_pas_1'] ;?></td>
                  <td><?= $data_nilai_matapelajaran['nilai_pas_2'] ;?></td>
                  <td><?= $data_nilai_matapelajaran['nilai_pas_3'] ;?></td>
                  <td><?= $data_nilai_matapelajaran['nilai_kd_1'] ;?></td>
                  <td><?= $data_nilai_matapelajaran['nilai_kd_2'] ;?></td>
                  <td><?= $data_nilai_matapelajaran['nilai_kd_3'] ;?></td>
                  <td><?= $data_nilai_matapelajaran['nilai'] ;?></td>
                  <td><?= $data_nilai_matapelajaran['predikat'] ;?></td>
                  <td>
                    <?php
                      $min = $data_nilai_matapelajaran['nilai'] - 2;
                      echo $min;
                    ?>
                  </td>
                  <td>
                    <?php
                      $max = $data_nilai_matapelajaran['nilai'] + 2;
                      echo $max;
                    ?>
                  </td>
                  <td>21</td>
                  <td>
                    <form action="input_nilai.php?id=<?= $data_nilai_matapelajaran['id'] ;?>" method="POST">
                        <button class="btn btn-primary" name="update" type="submit">Perbaharui</button>
                    </form>
                  </td>
                </tr>
<?php 
             }
?>
              </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </section>
  </div>
  <!-- /.card -->
  </div>
</div>

 <?php
    } else {
        while($data_siswa = mysqli_fetch_array($result_query_siswa)) {         
            $id_siswa = $data_siswa['id_siswa'];
            mysqli_query($conn, "INSERT INTO table_nilai_matapelajaran (id_siswa, id_matapelajaran) VALUES('$id_siswa','$id_url')");
        }
        header("Refresh:0");
    }
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
<script src="../../plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../../plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard2.js"></script>
</body>
</html>
<?php } ?>