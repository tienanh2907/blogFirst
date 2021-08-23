<?php
include("connect.php");
$db = new Database();
$conn = $db->getConnection();
define('FULLNAME', '/^[A-Za-z]+([\ A-Za-z]+)*$/m');
define('USENAME', '/^(?!.*\.\.)(?!.*\.$)[^\W][\w.]{0,29}$/im');
define('PASSWORD', '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/m');

function validate($post)
{
   $error = [];
    $post = (object)$post;
    if (empty($post->fullname)) {
        $error['fullname'] = "Please enter your full name";
    } else if (!preg_match(FULLNAME, $post->fullname)) {
        $error['fullname'] = "Name invalid";
    }

    if (empty($post->username)) {
        $error['usernae'] = 'Please enter the username';
    } else if (!preg_match(USENAME, $post->username)) {
        $error['username'] = "Username invalid";
    }
    if (empty($post->password)) {
        $error['password'] = "Please enter password";
    } else if (!preg_match(PASSWORD, $post->password)) {
        $error['password'] = "Password invalid";
    }

    // validate confirm password
    if (empty($post->confirmPassword)) {
        $error['confirm password'] = "Please enter confirm password";
    } else if ($post->confirmPassword != $post->password) {
        $error['confirm password'] = "Password do not match";
    }
   
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user =  $_POST['username'];
    $fullname = $_POST['fullname'];
    $pass = $_POST['password'];
    $confirmpassword = $_POST['confirmPassword'];
 
    validate($_POST);
    var_dump($error);
    if (empty($error)) {
        $pass = md5($pass);
        $sql = "INSERT INTO `account`(`username`, `fullname`, `password`) 
          VALUES('$user','$fullname','$pass');";
        if (mysqli_query($conn, $sql)) {
            echo "Register successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo 'Xac thuc pass ko dung';
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
    <script type="text/javascript" src="./js/validate-register.js"></script>
    <script src="https://kit.fontawesome.com/10b69a6de3.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="wrapper">
        <div class="title">Register</div>
        <form method="POST" action="/register" name="register-form" onsubmit="return validate()">
            <div class="text-field">
                <label>Fullname</label>
                <input type="text" name="fullname" id="name">
                <p id="error__fullname" class="validate-error"></p>
            </div>
            <div class="text-field">
                <label>Username</label>
                <input type="text" name="username" id="usename">
                <p id="error__username" class="validate-error"></p>
            </div>
            <div class="text-field">
                <label>Password</label>
                <input type="password" name="password" id="password">
                <p id="error__password" class="validate-error"></p>
            </div>
            <div class="text-field">
                <label>Confirm Password</label>
                <input type="password" name="confirmPassword" id="confirmPassword">
                <p id="error__confirmPassword" class="validate-error"></p>
            </div>
            <button onclick="validate()">Register</button>
        </form>
    </div>
</body>

</html>