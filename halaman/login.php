<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SDN 1 Mandirancan | Sign In</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Swal -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Swal -->
  <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">

  <!-- Swal -->
  <script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>
</head>
<body class="hold-transition login-page">

<?php
  include_once '../php/connection.php';
  session_start();

  if(isset($_POST['signin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query_login = "SELECT * FROM table_user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query_login);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        if($row['role'] == 1) {
            $_SESSION['id_admin'] = $row['id_admin'];
            $temp_id = $row['id_admin'];
            $query_admin = mysqli_query($conn, "SELECT * FROM table_admin WHERE id_admin=$temp_id");
            $data = mysqli_fetch_assoc($query_admin);
            $nama = $data['nama_admin'];
?>
          <script>
            Swal.fire({
              title: 'Berhasil',
              text: 'Selamat Datang, <?= $nama ;?>',
              icon:'success',
              showConfirmButton: false,
              timer: 2000,
            }).then((result) => {
              window.location = "http://localhost/web-sd/halaman/login.php";
            });
          </script>
<?php
        } else {
            $_SESSION['id_guru'] = $row['id_guru'];
            $temp_id = $row['id_guru'];
            $query_guru = mysqli_query($conn, "SELECT * FROM table_guru WHERE id_guru=$temp_id");
            $data = mysqli_fetch_assoc($query_guru);
            $nama = $data['nama_guru'];
?>
            <script>
              Swal.fire({
                title: 'Berhasil',
                text: 'Selamat Datang, <?= $nama ;?>',
                icon:'success',
                showConfirmButton: false,
                timer: 2000,
              }).then((result) => {
                window.location = "http://localhost/web-sd/halaman/user/home.php";
              });
            </script>
<?php
        }
    } else {
?>
        <script>
          Swal.fire({
            title: 'Gagal',
            text: 'Username atau Password Salah',
            icon:'error',
            showConfirmButton: false,
            timer: 2000,
          }).then((result) => {
            window.location = "http://localhost/web-sd/halaman/login.php";
          });
        </script>
<?php
    }
  } else {
?>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../index2.html" class="h1"><b>SDN 1 MANDIRANCAN</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Masukan Username Dan Password</p>

      <form action="" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-12">
            <button class="btn btn-primary btn-block" name="signin" id="signin">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
<?php
  }
?>
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>