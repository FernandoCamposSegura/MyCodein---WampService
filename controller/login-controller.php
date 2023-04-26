<?php
    function login() {
        require_once('./model/user.php');
        include('./view/login.php');
    }

    function register() {
        require_once('./model/user.php');
        require_once("./utils/utils.php");
        include('./view/register.php');
    }

    function signout() {
        session_start();
        session_destroy();
        header('refresh:1;url=index.php');
    }
?>