<?php
include("connect.php");
$keyword;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $keyword = (!empty($_GET['keyword'])) ?  $_GET['keyword'] : '';

    if ($keyword) {
        $sql = "SELECT * FROM blog WHERE tittle = '$keyword'";
        $result = [];
        $result = mysqli_query($conn, $sql);
        // var_dump($result);die();
        if (mysqli_num_rows($result) > 0) {

            foreach ($result as $i) {
                $result = $i;
                break;
            }
        } else {
            echo "Tittle does not exist";
        }
    }
}
?>


<html>

<head>
    <title>Trang tim kiem</title>
    <meta charset="utf-8">
</head>

<body>
    <form method="GET" action="/search">
        <fieldset>
            <legend>Tim kiem</legend>
            <table>
                <tr>
                    <td>Tiêu đề blog</td>
                    <td><input type="text" name="keyword" size="30" value=""></td>

                </tr>

                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="btn_submit" value="Search">
                    </td>
                </tr>

            </table>
        </fieldset>
    </form>
    <hr>
</body>

</html>