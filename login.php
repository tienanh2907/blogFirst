<?php

include("connect.php");
$error = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    (!empty($_POST['username'])) ? $username = trim($_POST['username']) : $error[] = 'Enter the username';
    (!empty($_POST['password'])) ?  $password = trim($_POST['password']) : $error[] = 'Enter the password';

    if (count($error) == 0 && !$_SESSION['username']) {
        $password = md5($password);

        $sql = mysqli_query($conn, "SELECT `username`,`password` FROM account WHERE `username` = '$username'");
        if (mysqli_num_rows($sql) == 0) {
            echo "Username does not exist";
            exit;
        }

        $row = mysqli_fetch_array($sql);

        if ($password != $row['password']) {
            echo "Password Fail";
            exit;
        } else {
            $_SESSION['username'] = $username;
            header('location: http://' . $_SERVER['HTTP_HOST']);
            die();
        }
    }
    echo "Dang nhap thanh cong";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng nhập</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./style.css/login.css">
</head>

<body>
    <div class="wrapper">
        <form method="POST" action="/login">
            <h2>ĐĂNG NHẬP</h2>
            <?php
            foreach ($error as $val) {
                echo "<div>{$val}</div>";
            }
            ?>
            <div class="input-infor">
                <input type="text" name="username" size="30" placeholder="Username">
                <input type="password" name="password" size="30" placeholder="Password"></input>
            </div>
            <a href="#">Forgot your password</a>
            <button type="submit" name="btn_submit">Log in</button>
        </form>
        <a href="./register.php">Register</a>
    </div>
</body>

</html>