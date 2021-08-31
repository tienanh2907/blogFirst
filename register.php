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
        <form method="POST" action="/register" id="form-register" onsubmit="return false">
            <h3 class="title">Register</h3>
            <div class="form-group">
                <label for="fullname" class="form-label">Fullname</label>
                <input type="text" name="fullname" id="fullname" class="form-input">
                <span id="error__fullname" class="form-error"></span>
            </div>
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-input">
                <span id="error__username" class="form-error"></span>
            </div>
            <div class="form-group">
                <label for="password"class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-input">
                <span id="error__password" class="form-error"></span>
            </div>
            <div class="form-group">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" name="confirmPassword" id="confirmPassword" class="form-input">
                <span id="error__confirmPassword" class="form-error"></span>
            </div>
            <button onclick="validator()">Register</button>
        </form>
    </div>
    <script type="text/javascript" src="./validator.js"></script>
    <script>
        Validator({
            form: '#form-register',
            rules: [
                Validator.isRequired('#fullname',"Please enter your full name")
            ]
        });
    </script>
</body>

</html>