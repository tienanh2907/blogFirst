<?php
include 'connect.php';
$database = new Database();
$conn = $database->getConnection();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tittle =  $_POST['tittle'];
    $context = $_POST['content'];
    $id =  $_POST['id'];

    function upfile()
    {
        if ($_FILES["fileupload"]["error"] > 0) {
            echo "error uploading your file";
        } else {
            $target_dir = 'upload/';
            $target_file = $target_dir . basename($_FILES["fileupload"]["name"]);
            move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file);
        }
    }


    if (!$id) {
        //tao moi blog
        $sql = "INSERT INTO `blog`(`tittle`, `content`, `iduser`) VALUES('$tittle','$context','')";
        if (mysqli_query($conn, $sql)) {
            //dang anh
            upfile();
            echo "dang thanh cong";
            header('location: http://' . $_SERVER['HTTP_HOST']);
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        //chinh sua blog
        $sql = "UPDATE `blog` SET tittle = '$tittle',content = '$context', iduser = '' WHERE `id` = '$id'; ";

        if (mysqli_query($conn, $sql)) {
            upfile();
            echo "chinh sua thanh cong";
            header('location: http://' . $_SERVER['HTTP_HOST']);
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

//get blog
$id = (!empty($_GET['id'])) ?  $_GET['id'] : '';
$blog = [];

if ($id) {
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Blog</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body>
    <form method="POST" action="/create_blog" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <header>
            <div class="navbar navbar-dark bg-dark shadow-sm">
                <div class="container">
                    <a href="/home" class="">
                        <img scr="">
                    </a>
                    <div class="header__bottom__right">
                        <div class="social-header">
                            <ul class="mom-social-icons">
                                <li class="facebook"><a href="#" class="vector_icon"><i class="fa fa-facebook"></i></a>></li>
                                <li class="youtube"><a href="#" class="vector_icon"><i class="fa fa-youtube"></i></a></li>
                                <li class="google"><a href="#" class="vector_icon"><i class="fa fa-google"></i></a>></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main>
        <fieldset>
            <legend>Tao blog</legend>
            <table>
                <tr>
                    <td>Tittle</td>
                    <td><input type="text" name="tittle" placeholder="Nhập tiêu đề" required="true" value="<?php
                                                                                                            if (!empty($blog['tittle'])) {
                                                                                                                echo $blog['tittle'];
                                                                                                            }
                                                                                                            ?>"></td>
                </tr>
                <tr>
                    <td>Context</td>
                    <td><textarea id="" name="content" placeholder="Nhập nội dung" required="true" rows="4" cols="50"><?php
                                                                                                                        if (!empty($blog['tittle'])) {
                                                                                                                            echo $blog['content'];
                                                                                                                        }
                                                                                                                        ?>
                    </textarea>

                </tr>
                <tr>
                    <input type="file" name="fileupload" id="fileupload">

                </tr>

                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="btn_submit" value="Đăng">
                    </td>
                </tr>

            </table>
        </fieldset>
        </main>
       
        <footer class="text-muted py-5">
            <div class="container">
                <p class="float-end mb-1">
                    <a href="#">Back to top</a>
                </p>
                <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
                <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p>
            </div>
        </footer>
    </form>
</body>

</html>