<?php
session_start();
//define route
$input = (!empty($_SERVER['PATH_INFO'])) ? $_SERVER['PATH_INFO'] : $_SERVER['REQUEST_URI'];

switch ($input) {
    case "/":
        include 'home.php';
        break;
    case "/login":
        include 'login.php';
        break;
    case '/register':
        include 'register.php';
        break;
    case '/search':
        include 'search.php';
        break;
    case '/create_blog':
        include 'create_blog.php';
        break;
    case '/delete_blog':
        include 'delete_blog.php';
        break;
    case '/blog':
        include 'blog.php';
        break;
    case '/logout':
        include 'logout.php';
        break;
    case '/uploadfile':
        include 'uploadfile.php';
        break;
    default:
        include '404.php';
}

//Global value
