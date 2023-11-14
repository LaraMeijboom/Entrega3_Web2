<?php

require_once "./libs/Router.php";
require_once './controllers/ChapterController.php';
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');


    $router = new Router();
    $router->addRoute('chapters', 'GET','ChapterController','showAllChapters');
    $router->addRoute('chapter', 'POST', 'ChapterController', 'addChapter');
    $router->addRoute('chapter/:ID','PUT','ChapterController','editChapter');
    $router->addRoute('chapter/:ID', 'GET', 'ChapterController', 'showChapterById');
    $router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);