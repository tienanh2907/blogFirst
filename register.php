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


<html>

<head>
    <title>Register account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/register.css">
    <script type="text/javascript" src="./js/validate-account.js"></script>
</head>

<body>
    <div class="wrapper">
        <form method="POST" action="/register">
            <h2>Register</h2>
            <div>
                <span>Fullname</span>
                <input type="text" name="fullname" size="30">
                <label>Username</label>
                <input type="text" name="username" size="30">
                <span>Password</span>
                <input type="password" name="password" size="30">
                <span>Confirm Password</span>
                <input type="password" name="confirm-password" size="30">
                <input type="submit" name="btn_submit" value="Register">
            </div>
        </form>
    </div>
</body>

</html>