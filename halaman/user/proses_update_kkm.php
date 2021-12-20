<?php
    $mpid = $_GET['mpid'];
    $kkm = $_GET['kkm'];
    $result = mysqli_query($conn, "UPDATE table_matapelajaran SET kkm=$kkm WHERE id_matapelajaran=$mpid");
?>
<script>window.location = "http://localhost/web-sd/halaman/user/guru.php?mpid=<?=$mpid;?>&page=1";</script>