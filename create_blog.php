<?php
include("connect.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tittle =  $_POST['tittle'];
    $context = $_POST['content'];
    $id =  $_POST['id'];

    if (!$id) {
        //tao moi
        $sql = "INSERT INTO `blog`(`tittle`, `content`, `iduser`) 
        VALUES('$tittle','$context','')";

        if (mysqli_query($conn, $sql)) {
            echo "dang thanh cong";
            header('location: http://' . $_SERVER['HTTP_HOST']);
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        //chinh sua blog
        $sql = "UPDATE `blog` SET tittle = '$tittle',content = '$context', iduser = '' WHERE `id` = '$id'; ";

        if (mysqli_query($conn, $sql)) {
            echo "chinh sua thanh cong";
            header('location: http://' . $_SERVER['HTTP_HOST']);
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

$id = (!empty($_GET['id'])) ?  $_GET['id'] : '';
$blog = [];

if ($id) {
    //select duieura man hnh
    // if(!empty($blog['tittle'])) {
    //     echo $blog['tittle'];
    // }
    $sql = "SELECT * FROM blog WHERE id = '$id' ";

    $blog = mysqli_query($conn, $sql);

    if (mysqli_num_rows($blog) > 0) {
        foreach ($blog as $a) {
            $blog = $a;
            break;
        }
    }
}



?>

<html>

<head>
    <title>Tao blog</title>
    <meta charset="utf-8">
</head>

<body>
    <form method="POST" action="/create_blog">
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <fieldset>
            <legend>Tao blog</legend>
            <table>
                <tr>
                    <td>Tittle</td>
                    <td><input type="text" name="tittle" value="<?php
                                                                if (!empty($blog['tittle'])) {
                                                                    echo $blog['tittle'];
                                                                }
                                                                ?>"></td>
                </tr>
                <tr>
                    <td>Context</td>
                    <td><textarea id="" name="content" rows="4" cols="50"><?php
                                                                            if (!empty($blog['tittle'])) {
                                                                                echo $blog['content'];
                                                                            }
                                                                            ?>
                    </textarea>

                </tr>

                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="btn_submit" value="Đăng">
                    </td>
                </tr>

            </table>
        </fieldset>
    </form>
</body>

</html>