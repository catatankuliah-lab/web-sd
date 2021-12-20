<?php
    $id_guru_session = $_SESSION['id_user'];
    $kelas = $_SESSION['kelas'];
    $result_query_matapelajaran = mysqli_query($conn, "SELECT * FROM table_matapelajaran WHERE kelas=$kelas ORDER BY id_matapelajaran ASC");
    $result_query_jumlah_matapelajaran = mysqli_num_rows($result_query_matapelajaran);
    $result_query_siswa = mysqli_query($conn, "SELECT * FROM table_siswa WHERE kelas=$kelas ORDER BY nama_siswa");
    $result_query_jumlah_siswa = mysqli_num_rows($result_query_siswa);
?>