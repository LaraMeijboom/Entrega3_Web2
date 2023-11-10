<?php

class ChapterModel{
    private $db;
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=tpe2;charset=utf8', 'root');
    }

    
    function getAllChapters($queryText){
        $query = $this->db->prepare($queryText);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    function getChapterById($id){
        $query = $this->db->prepare('SELECT * FROM chapter WHERE chapter_id = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function addChapter($name, $chapterNumber, $description, $season_id){
        $query = $this->db->prepare('INSERT INTO chapter(name, chapterNumber, description, season_id) VALUES (?,?,?,?)');
        $query->execute([$name, $chapterNumber, $description, $season_id]);
        return $this->db->lastInsertId();
    }

    function editChapter($name, $chapterNumber, $description, $season_id, $id){
        $query = $this->db->prepare('UPDATE chapter SET name = ?, chapterNumber = ?, description = ?, season_id = ? WHERE chapter_id = ?');
        $query->execute([$name, $chapterNumber, $description, $season_id, $id]);
    }
}