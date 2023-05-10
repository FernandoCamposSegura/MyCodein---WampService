<?php
    function showLanguages() {
        require_once('./model/user.php');
        require_once("./model/language.php");
        include("./view/main.php");
    }

    function publishLanguage() {
        require_once("./model/user.php");
        require_once("./model/language.php");
        include("./view/add-language-form.php");
    }

    function _deleteLanguage() {
        require_once("./model/user.php");
        require_once("./model/language.php");
        include("./view/delete-language-form.php");
    }
?>