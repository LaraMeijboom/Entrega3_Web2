<?php

class ChapterModel{
    private $db;
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=tpe2;charset=utf8', 'root');
    }

    
  function getAllChapters($filter = null, $order = "ASC", $limit = null, $offset = null, $sort = null, $field = null) {
    $queryText = "SELECT * FROM chapter";
    $offsetNuevo = null;
    // Filtrado
    $params = array();
    if ($filter != null && $field != null) {
        $queryText .= " WHERE $field LIKE '%$filter%'";
    }
    if ($sort != null) {
        $queryText .= " ORDER BY $sort $order";
    }
    // Paginado
    if ($offset != null && $limit != null) {
        $offsetNuevo =  ((int)$offset - 1) *(int) $limit;
        $queryText .= " LIMIT $offsetNuevo, $limit";   
      
    }
    // Ordenado
  
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