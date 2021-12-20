<?php
    $i = $_GET['i'];
    $username = $_GET['a'];
    $password = $_GET['b'];
    $role = "2";
    $ta = $_GET['c'];
    $nip = $_GET['d'];
    $nama = $_GET['e'];
    $kelas = $_GET['kelas'];
    $result = mysqli_query($conn, "UPDATE table_user SET username=$a WHERE id_user=$i");
?>
<!-- <script>window.location = "http://localhost/web-sd/halaman/user/admin.php?page=1";</script> -->