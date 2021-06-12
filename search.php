<?php
include 'connect.php';

if (!empty($_GET['s'])) {
    $seach = $_GET['s'];
    $sql = "SELECT * FROM blog WHERE id LIKE '%$seach%' or tittle LIKE '%$seach%'";
    $data = [];
    $data = mysqli_query($conn, $sql);

    if (mysqli_num_rows($data) > 0) {

        foreach ($data as $d) {
            $title = $d['tittle'];
            $content = $d['content'];
            $timeup = $d['timeup'];
        }
    } else {
        echo "khong tim thay file";
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
        /* .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        } */

        .search-submit {
            display: none;
        }
    </style>
</head>

<body>
        <header>
            <div class="navbar navbar-dark bg-dark shadow-sm">
                <div class="container">
                    <a href="/">
                        <img scr='public/logo/home.png' alt="home" width="50" height="50">
                    </a>
                    <div class="">
                        <form method="GET" action="/search">
                            <input type="search" name="s" placeholder="Search..." aria-label="Search" value="">
                        </form>
                    </div>
                    <div class="">
                        <div class="social-header">
                            <ul class="mom-social-icons">
                                <li class="facebook"><a href="#" class=""><i class="fa fa-facebook"></i></a>></li>
                                <li class="youtube"><a href="#" class=""><i class="fa fa-youtube"></i></a></li>
                                <li class="google"><a href="#" class=""><i class="fa fa-google"></i></a>></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main>

            <div class="containe">
                <div class="ow">
                    <h3>Tìm kiếm</h3>
                    <div class="album py-5 bg-light">
                        <div class="container">

                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                <?php
                                foreach ($data as $d) {
                                ?>
                                    <div class="col">
                                        <div class="card shadow-sm">
                                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                                <title>Placeholder</title>
                                                <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                            </svg>

                                            <div class="card-body">
                                                <p class="card-text"><?php
                                                                        echo $d['tittle'];
                                                                        ?></p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">

                                                        <a href="/blog?id=<?php echo $d['id']; ?>" class="btn btn-sm btn-outline-secondary">View</a>
                                                        <?php
                                                        if (isset($_SESSION['username'])) {
                                                        ?>
                                                            <a href="/create_blog?id=<?php echo $d['id']; ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                                                        <?php
                                                        }
                                                        ?>

                                                    </div>
                                                    <small class="text-muted"></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
</body>

</html>