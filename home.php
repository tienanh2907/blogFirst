<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Form HTML</title>
</head>

<body>
    <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">About</h4>
                        <p class="text-muted">Add some information about the album below, the author, or any other
                            background context. Make it a few sentences long so folks can pick up some informative
                            tidbits. Then, link them off to some social networking sites or contact information.</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Contact</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Follow on Twitter</a></li>
                            <li><a href="#" class="text-white">Like on Facebook</a></li>
                            <li><a href="#" class="text-white">Email me</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24">
                        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
                        <circle cx="12" cy="13" r="4" />
                    </svg>
                    <strong>Album</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>

    //main custom
    <main>
        
    <h1>Danh sách bài viết</h1>
    <a href="/create_blog"> tao moi </a>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tiêu Đề</th>
                <th>Noi dung</th>
                <th>Hanh dong</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("connect.php");

            $sql = "SELECT * FROM blog";
            $data = mysqli_query($conn, $sql);
            echo '<pre>';
            var_dump($conn);

            die();

            foreach ($data as $blog) {


            ?>

                <tr>
                    <td>
                        <?php
                        echo $blog['id'];
                        //stt == row
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $blog['tittle'];
                        ?>
                    </td>

                    <td>
                        <?php
                        echo $blog['content'];
                        ?>
                    </td>
                    <td>
                        <a href="/create_blog?id=<?php
                                                    echo $blog['id'];
                                                    ?>"> edit</a>
                    </td>
                    <td><a href="/delete_blog?id=<?php echo $blog['id']; ?>"> delete</a></td>
                </tr>

            <?php
            }
            ?>

        </tbody>
    </table>

    </main>

    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">Back to top</a>
            </p>
            <p class="mb-1"></p>
            <p class="mb-0"> <a href="../getting-started/introduction/">getting started guide</a>.</p>
        </div>
    </footer>

</body>

</html>