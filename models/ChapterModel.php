<?php

class ChapterModel{
    private $db;
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=bd_app;charset=utf8', 'root');
    }

    //juana
    
    function getChapterById($id){
        $query = $this->db->prepare('SELECT * FROM chapters WHERE chapter_id = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function addChapter($name, $description, $season_id){
        $query = $this->db->prepare('INSERT INTO chapters(name, description, season_id_fk) VALUES (?,?,?)');
        $query->execute([$name, $description, $season_id]);
        return $this->db->lastInsertId();
    }

    function editChapter($name, $description, $season_id, $id){
        $query = $this->db->prepare('UPDATE chapters SET name = ?, description = ?, season_id_fk = ? WHERE chapter_id = ?');
        $query->execute([$name, $description, $season_id, $id]);
    }
}