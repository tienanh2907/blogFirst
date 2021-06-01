<?php session_start(); 

if (isset($_SESSION['username'])){
    unset($_SESSION['username']); // xóa session login
    header('location: http://' . $_SERVER['HTTP_HOST'] );//
}
?>
