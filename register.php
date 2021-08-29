<?php
include("connect.php");
$db = new Database();
$conn = $db->getConnection();
define('FULLNAME', '/^[A-Za-z]+([\ A-Za-z]+)*$/m');
define('USENAME', '/^(?!.*\.\.)(?!.*\.$)[^\W][\w.]{0,29}$/im');
define('PASSWORD', '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/m');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username =  $_POST['username'];
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $error = [];
    if (empty($fullname)) {
        $error['fullname'] = "Please enter your full name";
    } else if (!preg_match(FULLNAME, $fullname)) {
        $error['fullname'] = "Name invalid";
    }

    if (empty($username)) {
        $error['username'] = "Please enter the username";
    } else if (!preg_match(USENAME, $username)) {
        $error['username'] = "Username invalid";
    }

    $selectUsername = "SELECT `username` FROM `account`";
    foreach ($conn->query($selectUsername) as $data) {
        if ($username == $data) {
            $error['username'] = "Username already exists ";
            break;
        }
    }

    if (empty($password)) {
        $error['password'] = "Please enter password";
    } else if (!preg_match(PASSWORD, $password)) {
        $error['password'] = "Password invalid";
    }

    // validate confirm password
    if (empty($confirmPassword)) {
        $error['confirm password'] = "Please enter confirm password";
    } else if ($confirmPassword != $password) {
        $error['confirm password'] = "Password do not match";
    }

    if (empty($error)) {
        $pass = md5($pass);
        $sql = "INSERT INTO `account`(`username`, `fullname`, `password`) 
          VALUES('$user','$fullname','$pass')";
        if (mysqli_query($conn, $sql)) {
            echo "Register successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo 'Loi validate';
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/register.css">
 
    <script src="https://kit.fontawesome.com/10b69a6de3.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="wrapper">
        <div class="title">Register</div>
        <form method="POST" action="/register" name="register-form" onSubmit="return validator()">
            <div class="text-field">
                <label>Fullname</label>
                <input type="text" name="fullname" id="name">
                <span id="error__fullname" class="validate-error"></span>
            </div>
            <div class="text-field">
                <label>Username</label>
                <input type="text" name="username" id="usename">
                <span id="error__username" class="validate-error"></span>
            </div>
            <div class="text-field">
                <label>Password</label>
                <input type="password" name="password" id="password">
                <span id="error__password" class="validate-error"></span>
            </div>
            <div class="text-field">
                <label>Confirm Password</label>
                <input type="password" name="confirmPassword" id="confirmPassword">
                <span id="error__confirmPassword" class="validate-error"></span>
            </div>
            <button onclick="validate()">Register</button>
        </form>
    </div>
    <script type="text/javascript" src="./js/validate-register.js"></script>
</body>

</html>