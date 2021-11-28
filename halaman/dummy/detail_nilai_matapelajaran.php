<?php
    include_once("../../php/connection.php");
    session_start();
    $id_url = $_GET['id'];
    $kelas = $_SESSION['kelas'];
    $query_matapelajaran = "SELECT * FROM table_nilai_matapelajaran WHERE id_matapelajaran=$id_url ORDER BY id_siswa ASC";
    $result_query_matapelajaran = mysqli_query($conn, $query_matapelajaran);
    $result_query_siswa = mysqli_query($conn, "SELECT * FROM table_siswa WHERE kelas=$kelas ORDER BY nama_siswa");
    if($result_query_matapelajaran -> num_rows > 0) {
?>
        Sudah Input <br>
        <table>
            <tr>
                <td>Nama Siswa</td>
                <td>Action</td>
            </tr>
<?php
            while($data_siswa = mysqli_fetch_array($result_query_siswa)) {         
?>
            <tr>
                <td><?= $data_siswa['nama_siswa'] ;?></td>
                <td><button>Update</button></td>
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