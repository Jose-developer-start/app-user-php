<?php
    session_start();
    require_once "./vendor/autoload.php";

    require_once "./helpers/url.php";

    require_once "./config/database.php";
    require_once "./models/user.php";

    $controller = $_GET['c'];
    $metodo = $_GET['m'];

    $fileController = "./controllers/".$controller."Controller.php";
    $controllerClass = $controller."Controller";
    require_once $fileController;

    $controller = new $controllerClass;

    if(!isset($metodo)){
        $controller->index();
    }else{
        call_user_func(array($controller,$metodo));
    }


?>