<?php

class Pelicula{ 
    private $bd;
    
    public function __construct()
    {
        $this->bd = new Db();

    }

    public function obtenerTodasPeliculas(){
        $this->bd->query("SELECT * FROM pelicula");
        return $this->bd->registros();
    }


    public function obtenerPeliculas(){
        $this->bd->query("SELECT * FROM pelicula  ORDER BY id DESC LIMIT 6");
        return $this->bd->registros();
    }

    public function obtenerPeliculaID($id){
        $this->bd->query("SELECT * FROM pelicula where id = ".$id);
        return $this->bd->registro();
    }

    public function anadirPelicula($id_fa,$nombre,$nombre_esp,$descripcion,$imagen,$año,$duracion,$directores,$casting, $generos){
        $this->bd->query("INSERT INTO `pelicula` (`id`, `id_fa`, `nombre`, `nombre_esp`,`descripcion`, `imagen`, `año`, `duracion`, `directores`, `casting`, `generos`, `rating`) VALUES (NULL,'".$id_fa."','".$nombre."', '".$nombre_esp."', '".$descripcion."', '".$imagen."', '".$año."', '".$duracion."', '".$directores."', '".$casting."', '".$generos."', '0');");
        $this->bd->execute();
    }

    public function editarPelicula($id,$id_fa,$nombre,$nombre_esp,$descripcion,$imagen,$año,$duracion,$directores,$casting, $generos){
        $this->bd->query("Update `pelicula` set `id_fa` = '".$id_fa."', `nombre` = '".$nombre."', `nombre_esp` = '".$nombre_esp."',`descripcion` = '".$descripcion."', `imagen` = '".$imagen."', `año` = '".$año."', `duracion` = '".$duracion."', `directores` = '".$directores."', `casting` = '".$casting."', `generos` = '".$generos."' where id = ".$id.";");
        //echo "Update `pelicula` set `id_fa` = '".$id_fa."', `nombre` = '".$nombre."', `nombre_esp` = '".$nombre_esp."',`descripcion` = '".$descripcion."', `imagen` = '".$imagen."', `año` = '".$año."', `duracion` = '".$duracion."', `directores` = '".$directores."', `casting` = '".$casting."', `generos` = '".$generos."' where 'id' = ".$id.";";
        $this->bd->execute();
    }

    public function obtenerUltimasPeliculas(){
        $this->bd->query("SELECT * FROM pelicula");
        return $this->bd->registros();
    }

    
}
