<?php
$server = 'localhost';
$username = "root";
$password = "";
$dbname = "blog";
// $port=  $_SERVER["SERVER_PORT"];

$conn = mysqli_connect($server, $username, $password, $dbname) or die("Connection database failed: " );

?>

