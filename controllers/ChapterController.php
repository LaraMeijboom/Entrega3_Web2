<?php
include_once('./models/ChapterModel.php');
include_once('./models/SeasonModel.php');
include_once('./View.php');

class ChapterController{
    private $chapterModel;
    private $seasonModel;
    private $view;
    private $data;

    function __construct(){
        $this->chapterModel = new ChapterModel();
        $this->seasonModel = new SeasonModel();
        $this->view = new View();
        $this->data = file_get_contents("php://input");
    }

    function getData(){
        return json_decode($this->data);
    }

    function showAllChapters($params = []){
        $sort = isset($_GET['sort']) ? ($_GET['sort']) :null;
        $order = isset($_GET['order']) ? ($_GET['order']) :"ASC";
        $offset = isset($_GET['offset']) ? ($_GET['offset']) : null;
        $limit = isset($_GET['limit']) ? ($_GET['limit']) : null;
        $filter = isset($_GET['filter']) ? ($_GET['filter']) :null;
        $field = isset($_GET['field']) ? ($_GET['field']) :null;
        $chapters = $this->chapterModel->getAllChapters($filter, $order, $limit, $offset, $sort, $field);
            if(!$chapters){
                $this->view->response($chapters, 404);
                return;
            }
        $this->view->response($chapters, 200);
    }

    function addChapter(){
        $body = $this->getData();
        if(empty($body->name)||empty($body->chapterNumber)||empty($body->description)||empty($body->season_id)){
            $this->view->response("You must complete all the fields.",400);
            return;
        }
        $name = $body->name;
        $chapterNumber = $body->chapterNumber;
        $description = $body->description;
        $season_id = $body->season_id;
        $season = $this->seasonModel->getSeasonById($season_id);
        if(!$season){
            $this->view->response("The season you want to apply has not been found.", 404);
            return;
        }
        $id = $this->chapterModel->addChapter($name, $chapterNumber, $description, $season_id);
        $chapter = $this->chapterModel->getChapterById($id);
        $this->view->response($chapter, 201);
        }

    function editChapter($params){
        $id = $params[":ID"];
        $body = $this->getData();
        if(empty($body->name)||empty($body->chapterNumber)||empty($body->description)||empty($body->season_id)){
            $this->view->response("You must complete all the fields.",400);
            return;
        }
        $name = $body->name;
        $chapterNumber = $body->chapterNumber;
        $description = $body->description;
        $season_id = $body->season_id;
        $season = $this->seasonModel->getSeasonById($season_id);
        if(!$season){
            $this->view->response("The season you want to apply has not been found.", 404);
            return;
        }
        $this->chapterModel->editChapter($name, $chapterNumber, $description, $season_id, $id);
        $chapter = $this->chapterModel->getChapterById($id);
        $this->view->response($chapter, 200);
    }
    function showChapterById($params){
        $id = $params[":ID"];
        $chapter = $this->chapterModel->getChapterById($id);
        if($chapter){
            $this->view->response($chapter,200);
        } else{
            $this->view->response("Chapter has been not found", 404);
        }
    }
}