<?php
    const DEFAULT_CONTROLLER = 'login';
    const CONTROLLER_FOLDER = './controller/';
    define('DEFAULT_ACTION', 'login');

    if(!empty($_GET['controller']))
        $controller = $_GET['controller'];
    else 
        $controller = DEFAULT_CONTROLLER;

    if(!empty($_GET['action']))
        $action = $_GET['action'];
    else 
        $action = DEFAULT_ACTION;

    $controller = CONTROLLER_FOLDER . $controller . '-controller.php';

    if(is_file($controller)) {
        require_once($controller);
    }

    if(is_callable($action)) {
        $action();
    } else {
        die('404 - Not found');
    }
?>