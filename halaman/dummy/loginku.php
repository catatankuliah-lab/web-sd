<?php
    include_once '../../php/connection.php';

    session_start();

    if(isset($_POST['login'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $query = "SELECT * FROM table_user WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $query);

        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            echo "<script>alert('Berhasil Login')</script>";
        } else {
            echo "<script>alert('Gagal Login')</script>";
        }

    } else {
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
    </head>
    <body>
        <fieldset>
            <legend>Loginv Form</legend>
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>Username</td>
                        <td>: <input type="text" name="username" required maxlength="20"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>: <input type="password" name="password" required maxlength="20"></td>
                    </tr>
                    <tr>
                        <td><button type="submit" name="login">Login</button></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </body>
    </html>
<?php
    }
?>