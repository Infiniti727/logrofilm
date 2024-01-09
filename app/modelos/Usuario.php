<?php

class Usuario{ 
    private $bd;
    
    public function __construct()
    {
        $this->bd = new Db();

    }

    public function obtenerUsuarios(){
        $this->bd->query("SELECT * FROM usuario");
        return $this->bd->registros();
    }

    public function obtenerUsuarioContraseña(){
        $this->bd->query("SELECT nombre, contraseña FROM usuario");
        return $this->bd->registros();
    }
}
