<?php
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