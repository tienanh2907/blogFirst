<?php
include("connect.php");

function validate($post) {
    $post = (object)$post;

    if($post->confirmpassword != $post->password) {
        return false;
    }

    return true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user =  $_POST['username'];
    $fullname = $_POST['fullname'];
    $pass = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    if(validate($_POST)) {
        $pass = md5($pass);
        $sql ="INSERT INTO `account`(`username`, `fullname`, `password`) 
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
    <title>Trang đăng ky</title>
    <meta charset="utf-8">
</head>

<body>
    <form method="POST" action="/register">
        <fieldset>
            <legend>Đăng ky</legend>
            <table>
                <tr>
                    <td>Fullname</td>
                    <td><input type="text" name="fullname" size="30"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" size="30"></td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" size="30"></td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td><input type="password" name="confirmpassword" size="30"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="btn_submit" value="Đăng ky">
                    </td>
                </tr>

            </table>
        </fieldset>
    </form>
</body>

</html>