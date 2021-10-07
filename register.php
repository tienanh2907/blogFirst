<?php
include 'connect.php';
$db = new Database();
$conn = $db->getConnection();
define('USERNAME', '/^(?!.*\.\.)(?!.*\.$)[^\W][\w.]{0,29}$/im');
define('PASSWORD', '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/m');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username =  $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];
    $error = [];

    if (empty($username)) {
        $error['username'] = "Please enter the username";
    } else if (!preg_match(USERNAME, $username)) {
        $error['username'] = "Invalid username";
    }

    $selectUsername = "SELECT `username` FROM `account`";
    foreach ($conn->query($selectUsername) as $data) {
        if ($username == $data) {
            $error['username'] = "Username already exists";
            break;
        }
    }

    if (empty($email)) {
        $error['email'] = "Please enter your email";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "Invalid email format";
    }

    if (empty($password)) {
        $error['password'] = "Please enter password";
    } else if (!preg_match(PASSWORD, $password)) {
        $error['password'] = "Invalid password";
    }

    // validate confirm password
    if (empty($confirmPassword)) {
        $error['confirm password'] = "Please enter confirm password";
    } else if ($confirmPassword != $password) {
        $error['confirm password'] = "Password do not match";
    }

    if (empty($error)) {
        $password = md5($password);
        $sql = "INSERT INTO `account`(`username`, `fullname`, `password`) 
          VALUES('$username','$email','$password')";
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/10b69a6de3.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="wrapper">
        <form method="POST" action="/register" id="form-register" onsubmit="return false">
            <h3 class="title">Register</h3>
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-input">
                <span class="form-error"><?php echo $error['username']; ?></span>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="text" id="email" name="email" class="form-input" />
                <span class="form-error"><?php echo $error['email']; ?></span>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-input">
                <span class="form-error"><?php echo $error['password']; ?></span>
            </div>
            <div class="form-group">
                <label for="confirm-password" class="form-label">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" class="form-input">
                <span class="form-error"><?php echo $error['confirm password']; ?></span>
            </div>
            <button>Register</button>
        </form>
    </div>
    <script type="text/javascript" src="./js/validator.js"></script>
</body>

</html>