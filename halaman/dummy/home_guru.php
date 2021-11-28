<?php
    include_once("../../php/connection.php");
    session_start();
    echo $_SESSION['message'];
    $id_guru_session = $_SESSION['id_guru'];
    $result_query_guru = mysqli_query($conn, "SELECT * FROM table_guru WHERE id_guru= $id_guru_session");
    while($data_guru = mysqli_fetch_array($result_query_guru))
    {
        $nama_guru = $data_guru['nama_guru'];
        $kelas = $data_guru['kelas'];
    }
    $_SESSION['kelas'] = $kelas;
    $result_query_matapelajaran = mysqli_query($conn, "SELECT * FROM table_matapelajaran WHERE kelas=$kelas ORDER BY id_matapelajaran ASC");
    $result_query_jumlah_matapelajaran = mysqli_num_rows($result_query_matapelajaran);
    $result_query_siswa = mysqli_query($conn, "SELECT * FROM table_siswa WHERE kelas=$kelas ORDER BY nama_siswa");
    $result_query_jumlah_siswa = mysqli_num_rows($result_query_siswa);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Guru</title>
</head>
    <body>
        <fieldset>
            <legend>Konten Data Guru</legend>
            <table>
                <tr>
                    <td>Nama Guru</td>
                    <td>:</td>
                    <td><?= $nama_guru ;?></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td><?= $kelas ;?></td>
                </tr>
            </table>
        </fieldset>
        <br>
        <fieldset>
            <legend>Konten Side Menu</legend>
<?php
            while($data_matapelajaran = mysqli_fetch_array($result_query_matapelajaran)) {         
?>
                <a href="detail_nilai_matapelajaran.php?id=<?= $data_matapelajaran['id_matapelajaran']; ?>"><?= $data_matapelajaran['nama_matapelajaran']; ?></a><br>
<?php 
             }
?> 
        </fieldset>
        <br>
        <fieldset>
            <legend>Konten Home Guru</legend>
            <table>
                <tr>
                    <td>Jumlah Mata Pelajaran</td>
                    <td>:</td>
                    <td><?= $result_query_jumlah_matapelajaran ;?></td>
                </tr>
                <tr>
                    <td>Jumlah Siswa</td>
                    <td>:</td>
                    <td><?= $result_query_jumlah_siswa ;?></td>
                </tr>
            </table>
        </fieldset>
    </body>
</html>