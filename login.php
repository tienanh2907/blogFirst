<?php
session_start();

include("connect.php");
$error = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    (!empty($_POST['username'])) ? $username = $_POST['username'] : $error[] = 'Enter the username';
    (!empty($_POST['password'])) ?  $password = $_POST['password'] : $error[] = 'Enter the password';

    if (count($error) == 0) {
        $password = md5($password);

        $sql = mysqli_query($conn, "SELECT username,password FROM tbl_account WHERE username = '$username'");
        if (mysqli_num_rows($sql) == 0) {
            echo "Username does not exist";
            exit;
        }

        $row = mysqli_fetch_array($sql);

        if ($password != $row['password']) {
            echo "Password Fail";
            exit;
        }else{
            $_SESSION['username'] = $username;
            header('location: http://' . $_SERVER['HTTP_HOST'] );
            die();
        }

    }
}
?>

<html>

<head>
    <title>Trang đăng nhập</title>
    <meta charset="utf-8">
</head>

<body>
<<<<<<< HEAD
    <form method="POST" action="/login">
        <fieldset>
            <legend>Đăng nhập</legend>
            <ul>
                <?php
                foreach ($error as $val) {
                    echo "<li>{$val}</li>";
                }
                ?>
            </ul>
=======
    <form method="POST" action="login.php">
        <fieldset>
            <legend>Đăng nhập</legend>
>>>>>>> origin/master
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" size="30"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" size="30"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="btn_submit" value="Đăng nhập">
                    </td>
                </tr>

            </table>
        </fieldset>
    </form>
</body>

</html>