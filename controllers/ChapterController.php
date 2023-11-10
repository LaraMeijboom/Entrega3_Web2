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

    function showAllChapters(){
        $queryText = "SELECT * FROM chapter";
        $sort = null;
        $order =null;
        $offset =null;
        $limit = null;
        $filter = null;
        //filtrado:
        if(isset($_GET['filter']) && isset($_GET['sort'])) {
            $filter = $_GET['filter'];
            $sort = $_GET['sort'];
            if($filter != null && $sort != null) {
                $queryText .= " WHERE $sort LIKE '%$filter%'";
            }
        }
        //ordenado:
        if(isset($_GET['sort']) && isset($_GET['order'])){
            $sort = $_GET['sort'];
            $order = $_GET['order'];
            if($sort != null && $order != null) {
                $queryText .= " ORDER BY $sort $order"; 
            }
        }        
        //paginado:
        if(isset($_GET['offset']) && isset($_GET['limit'])){
            $offset = $_GET['offset'];
            $limit = $_GET['limit'];
            if($offset != null && $limit != null) {
                $queryText .= " LIMIT $offset, $limit";
            }
        }
        $chapters = $this->chapterModel->getAllChapters($queryText);
            if(!$chapters){
                $this->view->response("Chapters not found.", 404);
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