<?php
    $mpid = $_GET['mpid'];
    $id = $_GET['id'];
    $nilai_harian_1 = $_GET['nilai_harian_1'];
    $nilai_harian_2 = $_GET['nilai_harian_2'];
    $nilai_harian_3 = $_GET['nilai_harian_3'];
    $nilai_pts_1 = $_GET['nilai_pts_1'];
    $nilai_pts_2 = $_GET['nilai_pts_2'];
    $nilai_pts_3 = $_GET['nilai_pts_3'];
    $nilai_pas_1 = $_GET['nilai_pas_1'];
    $nilai_pas_2 = $_GET['nilai_pas_2'];
    $nilai_pas_3 = $_GET['nilai_pas_3'];
    $nilai_kd_1 = $_GET['nilai_kd_1'];
    $nilai_kd_2 = $_GET['nilai_kd_2'];
    $nilai_kd_3 = $_GET['nilai_kd_3'];
    $nilai = $_GET['nilai'];

    $result = mysqli_query($conn, "UPDATE table_nilai_matapelajaran SET nilai_harian_1=$nilai_harian_1, nilai_harian_2=$nilai_harian_2, nilai_harian_3=$nilai_harian_3, nilai_pts_1=$nilai_pts_1, nilai_pts_2=$nilai_pts_2, nilai_pts_3=$nilai_pts_3, nilai_pas_1=$nilai_pas_1, nilai_pas_2=$nilai_pas_2, nilai_pas_3=$nilai_pas_3, nilai_kd_1=$nilai_kd_1, nilai_kd_2=$nilai_kd_2, nilai_kd_3=$nilai_kd_3, nilai=$nilai WHERE id=$id");


?>
<script>window.location = "http://localhost/web-sd/halaman/user/guru.php?mpid=<?=$mpid;?>&page=1";</script>