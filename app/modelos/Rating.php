<?php

class Rating{ 
    private $bd;
    
    public function __construct()
    {
        $this->bd = new Db();

    }

    public function obtenerRating($id,$id_usuario){
        $this->bd->query("SELECT * FROM rating where id_peli = ".$id." AND id_usuario = ".$id_usuario);
        return $this->bd->registros();
    }

    public function subirRating($id_peli,$id_usuario,$valor){
        $this->bd->query("INSERT INTO `rating`(`id_usuario`, `id_peli`, `valor`) VALUES ('".$id_usuario."','".$id_peli."','".$valor."')");
        $this->bd->execute();
        echo "INSERT INTO `rating`(`id_usuario`, `id_peli`, `valor`) VALUES ('".$id_usuario."','".$id_peli."','".$valor."')";
    }
    
}