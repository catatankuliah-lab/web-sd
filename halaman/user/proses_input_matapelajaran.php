<?php
    $nama_matapelajaran = $_GET['nama_matapelajaran'];
    $kelas = $_GET['kelas'];
    $result = mysqli_query($conn, "INSERT INTO table_matapelajaran VALUE (NULL,'$nama_matapelajaran','$kelas','0')");
?>
<script>window.location = "http://localhost/web-sd/halaman/user/admin.php?page=2";</script>