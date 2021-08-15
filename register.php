<?php
include("connect.php");

function validate($post)
{
    $post = (object)$post;

    if ($post->confirmpassword != $post->password) {
        return false;
    }

    return true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user =  $_POST['username'];
    $fullname = $_POST['fullname'];
    $pass = $_POST['password'];
    $confirmpassword = $_POST['confirm-password'];

    if (validate($_POST)) {
        $pass = md5($pass);
        $sql = "INSERT INTO `account`(`username`, `fullname`, `password`) 
          VALUES('$user','$fullname','$pass');";
        //mysqli_query($conn, $sql);
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
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
    <script type="text/javascript" src="./js/validate-account.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="title">Register</div>
        <form method="POST" action="/register">
            <div class="text-field">
                <label>Fullname</label>
                <input type="text" name="fullname" size="30">
                <div class="validate-error"></div>
            </div>
            <div class="text-field">
                <label>Username</label>
                <input type="text" name="username" size="30">
                <div class="validate-error"></div>
            </div>
            <div class="text-field">
                <label>Password</label>
                <input type="password" name="password" size="30">
                <div class="validate-error"></div>
            </div>
            <div class="text-field">
                <label>Confirm Password</label>
                <input type="password" name="confirm-password" size="30">
                <div class="validate-error"></div>
            </div>
            <button>Register</button>
        </form>
    </div>
</body>

</html>