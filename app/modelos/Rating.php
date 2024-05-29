<?php

class Rating{ 
    private $bd;
    
    public function __construct()
    {
        $this->bd = new Db();

    }

    public function obtenerRatings(){
        $this->bd->query("SELECT * FROM rating");
        return $this->bd->registros();
    }

    public function obtenerRatingId($id){
        $this->bd->query("SELECT * FROM rating where id = '".$id."'");
        return $this->bd->registros();
    }



    public function obtenerRatingPeli($id){
        $this->bd->query("SELECT AVG(valor) as media FROM rating where id_peli = '".$id."'");
        return $this->bd->registro()->media;
    }


    public function obtenerRatingPeliUltimo($id){
        $this->bd->query("SELECT MAX(id) as id FROM `rating` where id_peli = '".$id."'");
        return $this->bd->registro()->id;
    }


    public function crearRating($id_peli,$valor) {
        $this->bd->query("INSERT INTO `rating` (`id`, `id_peli`, `valor`) VALUES (NULL,'".$id_peli."', '".$valor."');");
        $this->bd->execute();
    }
}
