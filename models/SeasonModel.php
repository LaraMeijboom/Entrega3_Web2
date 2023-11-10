<?php

class SeasonModel{
    private $db;
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=tpe2;charset=utf8', 'root');
    }

    function getSeasonById($id){
        $query = $this->db->prepare('SELECT * FROM season WHERE season_id = ?');
        $query->execute([$id]);
       return $query->fetch(PDO::FETCH_OBJ);
    }


}