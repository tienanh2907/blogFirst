<?php
$server = $_SERVER["SERVER_NAME"];
$username = "root";
$password = "";
$dbname = "db_blog";
$port=  $_SERVER["SERVER_PORT"];

$conn = mysqli_connect($server.":".$port, $username, $password, $dbname) or die("Connection database failed: " );

?>

