<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Form HTML</title>
</head>

<body>
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
</body>

</html>