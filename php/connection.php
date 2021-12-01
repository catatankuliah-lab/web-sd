<?php
    // setup koneksi 
    $servername = "localhost";
    $database = "sd-ku";
    $username = "root";
    $password = "";

    // connect ke database
    $conn = mysqli_connect($servername, $username, $password, $database);
    
    // mengecek koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
?>