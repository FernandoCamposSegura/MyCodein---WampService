<?php
    function showIncidences()
    {
        require_once("./model/user.php");
        require_once("./model/language.php");
        require_once("./model/incidence.php");
        include("./view/show-incidences.php");
    }

    function showIncidence()
    {
        require_once("./model/user.php");
        require_once("./model/language.php");
        require_once("./model/message.php");
        require_once("./model/incidence.php");
        include("./view/add-comment-form.php");
    }

    function publishIncidence() {
        require_once("./model/user.php");
        require_once("./model/language.php");
        require_once("./model/message.php");
        require_once("./model/incidence.php");
        include('./view/add-incidence-form.php');
    }

    function updateIncidence() {
        require_once("./model/incidence.php");
        $id = $_GET['id'];
        $title = $_GET['title'];
        incidence::updateIncidence();
    }

    function updateStateToResolve() {
        require_once("./model/incidence.php");
        $id = $_GET['id'];
        incidence::updateStateToResolve($id);
    }

    function deleteIncidence() {
        require_once("./model/incidence.php");
        $id = $_GET['id'];
        incidence::deleteIncidence($id);
    }

    function updateMessage() {
        require_once("./model/message.php");
        $id = $_GET['id'];
        $message = $_GET['description'];
        message::updateMessage();
    }

    function deleteMessage() {
        require_once("./model/message.php");
        $id = $_GET['id'];
        message::deleteMessage($id);
    }
 
    function getColourStatus($state) {
        switch($state) {
            case "Unanswered":
                $colour = "#ffee93";
                break;
            case "Pending":
                $colour = "#779ecb";
                break;
            case "Resolved": 
                $colour = "#b0f2c2";
                break;
        }
        return $colour;
    }
?>