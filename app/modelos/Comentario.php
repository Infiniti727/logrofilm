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

    public function obtenerComentariosUsuario($id){
        $this->bd->query("SELECT * FROM comentario where id_usuario = ".$id);
        return $this->bd->registros();
    }

    public function subirComentario($id_peli,$id_usuario,$texto, $id_rating){
        $this->bd->query("INSERT INTO `comentario`(`id_usuario`, `id_peli`, `comentario`, `id_rating`) VALUES ('".$id_usuario."','".$id_peli."','".$texto."','".$id_rating."')");
        $this->bd->execute();
    }

    public function subirComentarioNull($id_peli,$id_usuario,$texto){
        $this->bd->query("INSERT INTO `comentario`(`id_usuario`, `id_peli`, `comentario`, `id_rating`) VALUES ('".$id_usuario."','".$id_peli."','".$texto."', NULL)");
        $this->bd->execute();
    }
    
}
