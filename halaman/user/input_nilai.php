
<?php
  include_once("header.php");
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
  $result_query_nilai_matapelajaran = mysqli_query($conn, "SELECT table_nilai_matapelajaran.*, table_siswa.nama_siswa FROM table_nilai_matapelajaran INNER JOIN table_siswa ON table_nilai_matapelajaran.id_siswa = table_siswa.id_siswa WHERE id=$id_url");
  while($data_nilai_matapelajaran = mysqli_fetch_array($result_query_nilai_matapelajaran)) {
      $id = $data_nilai_matapelajaran['id'];
      $nama = $data_nilai_matapelajaran['nama_siswa'];
      $nilai_harian_1 = $data_nilai_matapelajaran['nilai_harian_1'];
      $nilai_harian_2 = $data_nilai_matapelajaran['nilai_harian_2'];
      $nilai_harian_3 = $data_nilai_matapelajaran['nilai_harian_3'];
      $nilai_pts_1 = $data_nilai_matapelajaran['nilai_pts_1'];
      $nilai_pts_2 = $data_nilai_matapelajaran['nilai_pts_2'];
      $nilai_pts_3 = $data_nilai_matapelajaran['nilai_pts_3'];
      $nilai_pas_1 = $data_nilai_matapelajaran['nilai_pas_1'];
      $nilai_pas_2 = $data_nilai_matapelajaran['nilai_pas_2'];
      $nilai_pas_3 = $data_nilai_matapelajaran['nilai_pas_3'];
      $nilai_kd_1 = $data_nilai_matapelajaran['nilai_kd_1'];
      $nilai_kd_2 = $data_nilai_matapelajaran['nilai_kd_2'];
      $nilai_kd_3 = $data_nilai_matapelajaran['nilai_kd_3'];
      $predikat = $data_nilai_matapelajaran['predikat'];
  }
  $nilai_angka = ($nilai_harian_1 + $nilai_harian_2 + $nilai_harian_3 + $nilai_pts_1 + $nilai_pts_2 + $nilai_pts_3 + $nilai_pas_1 + $nilai_pas_2 + $nilai_pas_3 + $nilai_kd_1 + $nilai_kd_2 +$nilai_kd_3) / 12;
?>
  <div class="wrapper">
   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../home.html" class="nav-link">Dashboard</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../home.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

     <!-- Sidebar -->
     <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">SDN 1 MANDIRANCAN</a>
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Input Nilai Mata Pelajaran <?= $_SESSION['nama_matapelajaran'] ;?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Input Nilai </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
            <div class="row">
                <div class="col-md-12">
                  <div class="card-header" style="background-color: #3f6791;">
                    <h3 class="card-title">Data Siswa</h3>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="labelNamaSiswa">Nama Siswa</label>
                      <input type="text" name="nama_siswa" class="form-control" id="labelNamaSiswa" placeholder="Masukan Nilai" value="<?= $nama ;?>" required readonly>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card-header" style="background-color: #3f6791;">
                    <h3 class="card-title">Nilai Harian</h3>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="labelHarian1">Tema 3.1</label>
                      <input type="number" name="nilai_harian_1" class="form-control" id="labelHarian1" placeholder="Masukan Nilai" value="<?= $nilai_harian_1 ;?>" required>
                    </div>
                    <div class="form-group">
                      <label for="labelHarian2">Tema 3.1</label>
                      <input type="number" name="nilai_harian_2" class="form-control" id="labelHarian2" placeholder="Masukan Nilai" value="<?= $nilai_harian_2 ;?>" required>
                    </div>
                    <div class="form-group">
                      <label for="labelHarian3">Tema 3.1</label>
                      <input type="number" name="nilai_harian_3" class="form-control" id="labelHarian3" placeholder="Masukan Nilai" value="<?= $nilai_harian_3 ;?>" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card-header" style="background-color: #3f6791;">
                    <h3 class="card-title">Nilai PTS</h3>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="labelPTS1">Tema 3.1</label>
                      <input type="number" name="nilai_pts_1" class="form-control" id="labelPTS1" placeholder="Masukan Nilai" value="<?= $nilai_pts_1 ;?>" required>
                    </div>
                    <div class="form-group">
                      <label for="labelPTS2">Tema 3.1</label>
                      <input type="number" name="nilai_pts_2" class="form-control" id="labelPTS2" placeholder="Masukan Nilai" value="<?= $nilai_pts_2 ;?>" required>
                    </div>
                    <div class="form-group">
                      <label for="labelPTS3">Tema 3.1</label>
                      <input type="number" name="nilai_pts_3" class="form-control" id="labelPTS3" placeholder="Masukan Nilai" value="<?= $nilai_pts_3 ;?>" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card-header" style="background-color: #3f6791;">
                    <h3 class="card-title">Nilai PAS</h3>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="labelPAS1">Tema 3.1</label>
                      <input type="number" name="nilai_pas_1" class="form-control" id="labelPAS1" placeholder="Masukan Nilai" value="<?= $nilai_pas_1 ;?>" required>
                    </div>
                    <div class="form-group">
                      <label for="labelPAS2">Tema 3.1</label>
                      <input type="number" name="nilai_pas_2" class="form-control" id="labelPAS2" placeholder="Masukan Nilai" value="<?= $nilai_pas_2 ;?>" required>
                    </div>
                    <div class="form-group">
                      <label for="labelPAS13">Tema 3.1</label>
                      <input type="number" name="nilai_pas_3" class="form-control" id="labelPAS3" placeholder="Masukan Nilai" value="<?= $nilai_pas_3 ;?>" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card-header" style="background-color: #3f6791;">
                    <h3 class="card-title">Nilai KD</h3>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="labelKD1">Tema 3.1</label>
                      <input type="number" name="nilai_kd_1" class="form-control" id="labelKD1" placeholder="Masukan Nilai" value="<?= $nilai_kd_1 ;?>" required>
                    </div>
                    <div class="form-group">
                      <label for="labelKD2">Tema 3.1</label>
                      <input type="number" name="nilai_kd_2" class="form-control" id="labelKD2" placeholder="Masukan Nilai" value="<?= $nilai_kd_2 ;?>" required>
                    </div>
                    <div class="form-group">
                      <label for="labelKD3">Tema 3.1</label>
                      <input type="number" name="nilai_kd_3" class="form-control" id="labelKD3" placeholder="Masukan Nilai" value="<?= $nilai_kd_3 ;?>" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card-header" style="background-color: #3f6791;">
                    <h3 class="card-title">Nilai dan Predikat</h3>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="labelNilai">Nilai Angka</label>
                      <input type="number" name="nilai" class="form-control" id="labelNilai" placeholder="Masukan Nilai" value="<?= round($nilai_angka, 0) ;?>" required readonly>
                    </div>
                    <div class="form-group">
                      <label for="labelPredikat">Predikat</label>
                      <input type="text" name="predikat" class="form-control" id="labelPredikat" placeholder="Masukan Nilai" value="<?= $predikat ;?>" required readonly>
                    </div>
                    <div class="form-group text-right">
                      <button type="button" id="Update" class="btn btn-primary mt-2" style="width: 200px;" onclick="konfirmasi()">Perbaharui</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
    <!-- /.content -->
  </div>

<script>
  function konfirmasi() {
    Swal.fire({
      title: "Apakah Anda Yakin ?",
      text: "Nilai <?= $nama ;?> Akan Diperbaharui",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: "Batalkan",
      confirmButtonText: "Perbaharui"
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })
  }
</script>
<?php 
    include_once("footer.php");
  }
?>
