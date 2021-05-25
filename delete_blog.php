<?php
include("connect.php");
$id = (!empty($_GET['id'])) ?  $_GET['id'] : '';
$blog = [];
var_dump($blog);

if ($id) {

    $sql = " DELETE FROM blog WHERE id = '$id' ";

    $blog = mysqli_query($conn, $sql);
   
    header('location: http://' . $_SERVER['HTTP_HOST'] );
}
    