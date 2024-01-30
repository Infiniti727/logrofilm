<?php

class Comentario{ 
    private $bd;
    
    public function __construct()
    {
        $this->bd = new Db();

    }

    public function obtenerComentariosPeli($id){
        $this->bd->query("SELECT * FROM comentario where id_peli = ".$id);
        return $this->bd->registros();
    }

    public function obtenerComentario($id){
        $this->bd->query("SELECT * FROM comentario where id = ".$id);
        return $this->bd->registro();
    }

    public function subirComentario($id_peli,$id_usuario,$texto){
        $this->bd->query("INSERT INTO `comentario`(`id_usuario`, `id_peli`, `comentario`) VALUES ('".$id_usuario."','".$id_peli."','".$texto."')");
        $this->bd->execute();
    }

    public function eliminarComentario($id){
        $this->bd->query("DELETE FROM `comentario` WHERE `comentario`.`id` = ".$id);
        $this->bd->execute();
    }
    
}
