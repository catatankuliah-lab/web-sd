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
    $id_guru_session = $_SESSION['id_guru'];
    $result_query_guru = mysqli_query($conn, "SELECT * FROM table_guru WHERE id_guru= $id_guru_session");
    while($data_guru = mysqli_fetch_array($result_query_guru))
    {
        $nama_guru = $data_guru['nama_guru'];
        $kelas = $data_guru['kelas'];
        $nip = $data_guru['nip'];
    }
    $_SESSION['kelas'] = $kelas;
    $result_query_matapelajaran = mysqli_query($conn, "SELECT * FROM table_matapelajaran WHERE kelas=$kelas ORDER BY id_matapelajaran ASC");
    $result_query_jumlah_matapelajaran = mysqli_num_rows($result_query_matapelajaran);
    $result_query_siswa = mysqli_query($conn, "SELECT * FROM table_siswa WHERE kelas=$kelas ORDER BY nama_siswa");
    $result_query_jumlah_siswa = mysqli_num_rows($result_query_siswa);
?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>

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
      <a href="home.html" class="nav-link">Dashboard</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Sub</a>
    </li>
  </ul> 

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item"><button class="btn btn-primary">Sign Out</button></li>
  <!-- Navbar Search -->
  <!-- <li class="nav-item">
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
  </li> -->
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
      <a href="#" class="d-block">SD NEGERI 1 KERTAWINANGUN</a>
    </div>
  </div>
  
    <!-- Sidebar Menu -->
    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
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
            <a href="detail_nilai_matapelajaran.php?id=<?= $data_matapelajaran['id_matapelajaran']; ?>" class="nav-link">
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
  <div class="content-wrapper">
  <!-- /.card-header -->
  <div class="row mt-3">
  <div class="col-sm-12 ml-1 mt-5">
    <div class="row-sm-3">
      <div class="col-sm-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Profil Sekolah</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <h3 class="profile-username text-center">SD NEGERI 1 KERTAWINANGUN</h3>
          <p class="text-muted text-center">Jln. Buyut Pringga N0.123 Dusun Pon Desa Kertawinangun</p>
          <ul class="list-group list-group-unbordered mb-1">
            <li class="list-group-item">
              <b>NPSN</b> <a class="float-right">20212788</a>
            </li>
            <li class="list-group-item">
              <b>Kepala Sekolah</b> <a class="float-right">NANA YUHANA, S.Pd.SD.</a>
            </li>
            <li class="list-group-item">
              <b>NIP</b> <a class="float-right">19650917 198610 1 004</a>
            </li>
            <li class="list-group-item">
              <b>DESA/KELURAHAN</b> <a class="float-right">KERTAWINANGUN</a>
            </li>
            <li class="list-group-item">
              <b>KECAMATAN</b> <a class="float-right">MANDIRANCAN</a>
            </li>
            <li class="list-group-item">
              <b>KABUPATEN/KOTA</b> <a class="float-right">KUNINGAN</a>
            </li>
            <li class="list-group-item">
              <b>PROVINSI</b> <a class="float-right">JAWA BARAT</a>
            </li>
          </ul>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
  <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- .row -->
  <div class="row">
  <div class="col-sm-12 ml-1">
    <div class="row-sm-3">
      <div class="col-sm-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Profil Kelas</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <strong><i class="fas fa-bars"></i> KELAS</strong>
            <p class="text-muted">Kelas <?= $kelas ;?></p>
            <hr>
            <strong><i class="fas fa-user"></i> NAMA GURU</strong>
            <p class="text-muted"><?= $nama_guru ;?></p>
            <hr>
            <strong><i class="fas fa-key"></i> NIP</strong>
            <p class="text-muted"><?= $nip ;?></p>
            <hr>
            <strong><i class="fas fa-users"></i> Jumlah Data Siswa Yang Masuk</strong>
            <p class="text-muted"><?= $result_query_jumlah_siswa ;?> Siswa</p>
            <hr>
            <strong><i class="fas fa-book"></i> Jumlah Mata Pelajaran</strong>
            <p class="text-muted"><?= $result_query_jumlah_matapelajaran ;?> Mata Pelajaran</p>              
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
  <!-- /.col -->
  </div>
  <!-- /.row -->
  </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->




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

  </body>
  </html>
<?php
  }
?>