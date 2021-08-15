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
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <div class="wrapper">
        <h1>Login</h1>
        <form method="POST" action="/login">
            <?php
            foreach ($error as $val) {
                echo "<div>{$val}</div>";
            }
            ?>
            <div class="input-infor">
                <input type="text" name="username" size="30" placeholder="Username">
                <input type="password" name="password" size="30" placeholder="Password"></input>
            </div>
            <div class="re-password">
                <a href="#">Forgot your password?</a>
            </div>
            <div class="btn-login">
                <button>Login</button>
            </div>
            <div class="register">Not a member? <a href="./register.php">Register</a></div>
        </form>
    </div>
</body>

</html>