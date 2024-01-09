<?php

    class Paginas extends Controlador{

        public function __construct(){
            session_start();
            
        }

        public function index(){
            $a = 0;
            if(isset($_POST["usuario"])){
                header('Location: /logrofilm/paginas/pagina_principal');
                $a= 1;
            }

            $datos = [
                'titulo' => 'ED 23-24',
                'a' => $a
            ];

            $this->vista('paginas/inicio', $datos);    
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

        public function pagina_principal(){
            
            $datos = [
                'titulo' => 'ED 23-24'
            ];

            $this->vista('paginas/pagina_principal', $datos);    
        }

        public function enviar(){
            $Mailer = $this->modelo('Correo');

            $Mailer->enviar();
        }
    }