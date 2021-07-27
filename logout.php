<?php 

if (isset($_SESSION['username'])){
    unset($_SESSION['username']); // xóa session login
    header('location: /login.php' );//
}
?>
