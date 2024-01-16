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

    public function crearUsuario($nombre,$email,$contraseña) {
        $this->bd->query("INSERT INTO `usuario` (`id`, `nombre`, `email`, `contraseña`, `desactivada`, `admin`) VALUES (NULL,'".$nombre."', '".$email."', '".$contraseña."', '0', '0');");
        $this->bd->execute();
    }

    public function ComprobarNombre($nombre){
        $this->bd->query("SELECT * FROM usuario where nombre = '".$nombre."'");
        $this->bd->execute();
        return $this->bd->rowCount();
    }

    public function ComprobarEmail($email){
        $this->bd->query("SELECT * FROM usuario where email = '".$email."'");
        $this->bd->execute();
        return $this->bd->rowCount();
    }

    public function obtenerEmail($nombre){
        $this->bd->query("SELECT email FROM usuario where nombre = '".$nombre."'");
        return $this->bd->registro();
    }

    public function esAdmin($nombre){
        $this->bd->query("SELECT admin FROM usuario where nombre = '".$nombre."'");
        return $this->bd->registro()->admin;
    }

    public function obtenerID($id){
        $this->bd->query("SELECT * FROM usuario where id = '".$id."'");
        return $this->bd->registro();
    }

    public function cambiarActivada($id, $estado){
        $this->bd->query("UPDATE `usuario` SET `desactivada` = '".$estado."' WHERE `usuario`.`id` = ".$id.";");
        $this->bd->execute();
    }
}
