<?php

class Pelicula{ 
    private $bd;
    
    public function __construct()
    {
        $this->bd = new Db();

    }

    public function obtenerPeliculas(){
        $this->bd->query("SELECT * FROM pelicula");
        return $this->bd->registros();
    }

    public function anadirPelicula($id_fa,$nombre,$nombre_esp,$descripcion,$imagen,$año,$duracion,$directores,$casting, $generos){
        $this->bd->query("INSERT INTO `pelicula` (`id`, `id_fa`, `nombre`, `nombre_esp`,`descripcion`, `imagen`, `año`, `duracion`, `directores`, `casting`, `generos`, `rating`) VALUES (NULL,'".$id_fa."','".$nombre."', '".$nombre_esp."', '".$descripcion."', '".$imagen."', '".$año."', '".$duracion."', '".$directores."', '".$casting."', '".$generos."', '0');");
        $this->bd->execute();
    }

    
}
