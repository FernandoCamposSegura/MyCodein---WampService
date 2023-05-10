<?php
    function showProfile() {
        require_once('./model/user.php');
        require_once('./model/language.php');
        require_once('./model/incidence.php');
        require_once('./controller/incidence-controller.php');
        include('./view/profile.php');
    }

    function deleteAccount() {
        require_once("./model/user.php");
        $id = $_SESSION['id'];
        user::deleteUser($id);
    }
?>