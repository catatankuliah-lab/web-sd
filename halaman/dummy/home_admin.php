<?php
// Create database connection using config file
include_once("../../php/connection.php");
session_start();
echo $_SESSION['message'];
//
$id_admin_session = $_SESSION['id_admin'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Admin</title>
</head>
<body>
<h1>Berhasil</h1>
</body>
</html>