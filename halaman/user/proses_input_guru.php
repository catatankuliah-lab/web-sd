<?php
    $username = $_GET['username'];
    $password = $_GET['password'];
    $role = "2";
    $ta = $_GET['tahun'];
    $nip = $_GET['nip'];
    $nama = $_GET['nama_guru'];
    $kelas = $_GET['kelas'];
    $result = mysqli_query($conn, "INSERT INTO table_user VALUE (NULL,'$username','$password','$role','$ta','$nip','$nama','$kelas')");
?>
<script>window.location = "http://localhost/web-sd/halaman/user/admin.php?page=1";</script>