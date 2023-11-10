<?php

require_once "./libs/Router.php";
require_once './controllers/ChapterController.php';
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');


    $router = new Router();
    $router->addRoute('chapters', 'GET','ChapterController','showAllChapters');
    $router->addRoute('chapters', 'POST', 'ChapterController', 'addChapter');
//juana    
    $router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);