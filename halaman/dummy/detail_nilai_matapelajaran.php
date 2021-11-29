<?php
    include_once("../../php/connection.php");
    session_start();
    $id_url = $_GET['id'];
    $kelas = $_SESSION['kelas'];
    $query_nama_matapelajaran = mysqli_query($conn, "SELECT nama_matapelajaran FROM table_matapelajaran WHERE id_matapelajaran=$id_url");
    while($data_namapelajaran = mysqli_fetch_array($query_nama_matapelajaran)) {
        $nama_matapelajaran = $data_namapelajaran['nama_matapelajaran'];
    }
    $_SESSION['nama_matapelajaran'] = $nama_matapelajaran;
    $query_matapelajaran = "SELECT table_nilai_matapelajaran.*, table_siswa.nama_siswa FROM table_nilai_matapelajaran INNER JOIN table_siswa ON table_nilai_matapelajaran.id_siswa = table_siswa.id_siswa WHERE id_matapelajaran=$id_url ORDER BY id_siswa ASC";
    $result_query_matapelajaran = mysqli_query($conn, $query_matapelajaran);
    $result_query_siswa = mysqli_query($conn, "SELECT * FROM table_siswa WHERE kelas=$kelas ORDER BY nama_siswa");
    if($result_query_matapelajaran -> num_rows > 0) {
?>
        <table>
            <tr>
                <td>Nama Siswa</td>
                <td>Nilai Harian 1</td>
                <td>Nilai Harian 2</td>
                <td>Nilai Harian 3</td>
                <td>Nilai PTS 1</td>
                <td>Nilai PTS 2</td>
                <td>Nilai PTS 3</td>
                <td>Nilai PAS 1</td>
                <td>Nilai PAS 2</td>
                <td>Nilai PAS 3</td>
                <td>Nilai KD 1</td>
                <td>Nilai KD 2</td>
                <td>Nilai KD 3</td>
                <td>Action</td>
            </tr>
<?php
            while($data_nilai_matapelajaran = mysqli_fetch_array($result_query_matapelajaran)) {         
?>
            <tr>
                <td><?= $data_nilai_matapelajaran['nama_siswa'] ;?></td>
                <td><?= $data_nilai_matapelajaran['nilai_harian_1'] ;?></td>
                <td><?= $data_nilai_matapelajaran['nilai_harian_2'] ;?></td>
                <td><?= $data_nilai_matapelajaran['nilai_harian_3'] ;?></td>
                <td><?= $data_nilai_matapelajaran['nilai_pts_1'] ;?></td>
                <td><?= $data_nilai_matapelajaran['nilai_pts_2'] ;?></td>
                <td><?= $data_nilai_matapelajaran['nilai_pts_3'] ;?></td>
                <td><?= $data_nilai_matapelajaran['nilai_pas_1'] ;?></td>
                <td><?= $data_nilai_matapelajaran['nilai_pas_2'] ;?></td>
                <td><?= $data_nilai_matapelajaran['nilai_pas_3'] ;?></td>
                <td><?= $data_nilai_matapelajaran['nilai_kd_1'] ;?></td>
                <td><?= $data_nilai_matapelajaran['nilai_kd_2'] ;?></td>
                <td><?= $data_nilai_matapelajaran['nilai_kd_3'] ;?></td>
                <td>
                    <form action="input_nilai.php?id=<?= $data_nilai_matapelajaran['id'] ;?>" method="POST">
                        <button>SUBMIT</button>
                    </form>
                </td>
            </tr>
<?php 
             }
?>
        </table>
<?php
    } else {
        while($data_siswa = mysqli_fetch_array($result_query_siswa)) {         
            $id_siswa = $data_siswa['id_siswa'];
            mysqli_query($conn, "INSERT INTO table_nilai_matapelajaran (id_siswa, id_matapelajaran) VALUES('$id_siswa','$id_url')");
        }
        header("Refresh:0");
    }
?>