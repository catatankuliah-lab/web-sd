<?php
// Create database connection using config file
include_once("../../php/connection.php");
session_start();
echo $_SESSION['message'];
//
$id_guruSession = $_SESSION['id_guru'];
$result = mysqli_query($conn, "SELECT * FROM table_guru WHERE id_guru= $id_guruSession");
while($data_guru = mysqli_fetch_array($result))
{
    $kelas = $data_guru['kelas'];
}
$result = mysqli_query($conn, "SELECT * FROM table_matapelajaran WHERE kelas=$kelas ORDER BY id_matapelajaran ASC");
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
    <ul>
<?php
        while($data_matapelajaran = mysqli_fetch_array($result)) {         
?>
            <li><?= $data_matapelajaran['nama_matapelajaran']; ?></li>
<?php
            
        }
?> 
    </ul>
</body>
</html>