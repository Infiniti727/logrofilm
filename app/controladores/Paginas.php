<?php

    class Paginas extends Controlador{

        public function __construct(){
            session_start();
            
        }

        public function index(){     
            
            $datos = [
                'titulo' => 'ED 23-24',
            ];

            if(isset($_SESSION['username'])){
                header('Location: /logrofilm/paginas/pagina_principal');
            } else {
                $this->vista('paginas/inicio', $datos); 
            }
               
        }

        public function sing_up(){     
            
            $datos = [
                'titulo' => 'ED 23-24',
            ];

            if(isset($_SESSION['username'])){
                header('Location: /logrofilm/paginas/pagina_principal');
            } else {
                $this->vista('paginas/crear_cuenta', $datos); 
            }
               
        }

        public function validacion(){
            $usuario_no_existe = true;
            $modelo = $this->modelo('Usuario');
            $result = $modelo->obtenerUsuarioContraseña();
            foreach ($result as $row) {
                if($_POST["usuario"] == $row->nombre){
                    $usuario_no_existe = false;
                    if($_POST["contraseña"] == $row->contraseña){
                        $_SESSION['username'] = $_POST["usuario"];
                        $_SESSION["password"] = $_POST["contraseña"];
                        header('Location: /logrofilm/paginas/pagina_principal');
                    } else {
                        header("Location: /logrofilm/paginas/error/");
                    }
                }
            }
            if($usuario_no_existe){
                header("Location: /logrofilm/paginas/error/");
            }   
        }

        public function validacion_2(){
            $modelo = $this->modelo('Usuario');
            if($modelo->ComprobarNombre($_POST["usuario"]) == 0){
                if($modelo->ComprobarEmail($_POST["email"]) == 0){
                    $modelo->crearUsuario($_POST["usuario"],$_POST["email"],$_POST["contraseña"]); 
                } else {
                    header("Location: /logrofilm/paginas/sing_up/error");
                }
            } else {
                header("Location: /logrofilm/paginas/sing_up/error");
            }
        }

        public function pagina_principal(){
            

            $datos = [
                'titulo' => 'ED 23-24'
            ];

            if(isset($_SESSION['username'])){
                $this->vista('paginas/pagina_principal', $datos); 
                
            } else {
                header("Location: /logrofilm/paginas/");
            }
        }

        public function enviar(){
            $Mailer = $this->modelo('Correo');

            $Mailer->enviar();
        }

        public function cerrar(){
            session_destroy();
            header("Location: /logrofilm/paginas/");
        }
    }