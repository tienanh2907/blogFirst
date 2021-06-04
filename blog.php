<?php
include("connect.php");

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
    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24">
                        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
                        <circle cx="12" cy="13" r="4" />
                    </svg>
                </a>
                <div class="header__bottom__right">
                    <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#" class="google"><i class="fa fa-google"></i></a></li>
                </div>
            </div>
        </div>
    </header>

    <main>
        <?php
        $id = (!empty($_GET['id'])) ?  $_GET['id'] : '';
        if ($id) {
            $sql = "SELECT * FROM blog WHERE id = '$id'";
            $data = mysqli_query($conn, $sql);
            $title = '';
            $content = '';
            $timeup ='';

            foreach ($data as $d) {
                $title= $d['tittle'];
                $content = $d['content'];
                $timeup = $d['timeup'];
                break;
            }
        }
        ?>

        <div class="container">
            <div class="posts-container mx-auto px-3 my-5">
                <div class="posts">


                    <div class="post">
                        <h1 class="post-title fw-500">
                            <a href="/blog?id="<?php echo $id;?>>
                            <?php
                                echo $title;
                                ?>
                            </a>
                        </h1>
                        <div class="d-flex align-items-center mb-4 text-muted author-info">
                            <span class="d-flex align-items-center ml-3" title="">
                                <?php echo $timeup;  ?>
                            </span>
                        </div>
                        <p><?php echo $content;?></p>
                    </div>
                </div>


            </div>

        </div>

    </main>
    <footer class ="text-muted py-5">
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
