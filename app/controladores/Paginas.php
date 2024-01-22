<?php

    class Paginas extends Controlador{

        public function __construct(){
            session_start();
            
        }

        public function index(){     
            
            $datos = [
            ];

            if(isset($_SESSION['username'])){
                header('Location: /logrofilm/paginas/pagina_principal');
            } else {
                $this->vista('paginas/inicio', $datos); 
            }
               
        }

        public function sing_up($a=0){     
            
            $datos = [
                "asd" => $a
            ];

            if(isset($_SESSION['username'])){
                header('Location: /logrofilm/paginas/pagina_principal');
            } else {
                $this->vista('paginas/crear_cuenta', $datos); 
            }
               
        }

        public function validacion(){
            $usuario_no_existe = true;
            $peticion = $this->CallAPI("GET","http://localhost/logrofilm/API/getUsuariosContra/");
            foreach ($peticion as $row) {
                if($_POST["usuario"] == $row->nombre){
                    $usuario_no_existe = false;
                    if($_POST["contraseña"] == $row->contraseña){
                        $_SESSION['username'] = $_POST["usuario"];
                        $_SESSION["password"] = $_POST["contraseña"];
                        $_SESSION["email"] = $this->CallAPI("GET","http://localhost/logrofilm/API/getEmail/".$_POST["usuario"]);
                        if($this->CallAPI("GET","http://localhost/logrofilm/API/getAdmin/".$_POST["usuario"])){
                            $_SESSION["admin"] = true;
                        }
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
            $modelo2 = $this->modelo('Correo');
            if($this->CallAPI("GET","http://localhost/logrofilm/API/ComprobarNombre/".$_POST["usuario"]) == 0){
                if($this->CallAPI("GET","http://localhost/logrofilm/API/ComprobarEmail/".$_POST["email"]) == 0){
                    $datos = [
                        "nombre" => $_POST["usuario"],
                        "email" => $_POST["email"],
                        "contraseña" => $_POST["contraseña"]
                    ];

                    $datos_string = json_encode($datos);
                    var_dump($datos_string);

                    $this->CallAPI("POST","http://localhost/logrofilm/API/AnadirUsuario/",$datos_string); 
                    $_SESSION['username'] = $_POST["usuario"];
                    $_SESSION["password"] = $_POST["contraseña"];
                    $_SESSION["email"] = $_POST["email"];
                    $modelo2->setDestinatario($_POST["email"]);
                    $modelo2->enviar();
                    header("Location: /logrofilm/paginas/pagina_principal");
                } else {
                    header("Location: /logrofilm/paginas/sing_up/error2");
                }
            } else {
                header("Location: /logrofilm/paginas/sing_up/error1");
            }
        }

        public function anadirPelicula(){
            $datos = [
                "id_fa" => $_POST["id_fa"],
                "nombre" => $_POST["Nombre"],
                "nombre_esp" => $_POST["Nombre_esp"],
                "descripcion" => $_POST["Sinopsis"],
                "duracion" => $_POST["Duracion"],
                "imagen" => $_POST["Imagen"],
                "año" => $_POST["Año"],
                "casting" => $_POST["Casting"],
                "directores" => $_POST["Directores"],
                "generos" => $_POST["Generos"]
            ];

            $datos_string = json_encode($datos);
            var_dump($datos_string);

            $this->CallAPI("POST","http://localhost/logrofilm/API/anadirPelicula/",$datos_string); 
        }

        public function pagina_principal(){
            

            $datos = [
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

        public function panel(){
            $this->vista('paginas/panel_control'); 
        }

        public function panelU(){
            
            $datos = [
                'usuarios' => $this->CallAPI("GET","http://localhost/logrofilm/API/getUsuarios/")
            ];

            $this->vista('paginas/panel_usuarios', $datos); 
        }

        public function panelP(){
            $this->vista('paginas/panel_peliculas'); 
        }

        public function cerrar(){
            session_destroy();
            header("Location: /logrofilm/paginas/");
        }

        public function activar_desactivar($id){
            
            if($this->CallAPI("GET","http://localhost/logrofilm/API/getDesactivada/".$id)){
                $this->CallAPI("GET","http://localhost/logrofilm/API/cambiarEstadoDesactivada/",["id"=>$id,"estado"=>1]);

            } else {
                $this->CallAPI("GET","http://localhost/logrofilm/API/cambiarEstadoDesactivada/",["id"=>$id,"estado"=>0]);
            }
            header("Location: /logrofilm/paginas/panelU/");
        }

        public function formP($id){
            $datos = [
                "id" => $id
            ];

            $this->vista('paginas/formulario_peliculas',$datos);
        }

        public function anadirP(){
            $this->vista('paginas/buscar_peli_backend');
        }

        private function CallAPI($method, $url, $data = null){
            $curl = curl_init();

            switch ($method)
            {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($data!= null)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data!= null)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
            }

            // Optional Authentication:

            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

            $result = curl_exec($curl);

            curl_close($curl);
            
            if(curl_errno($curl)){
                echo 'Curl error: ' . curl_error($curl);
            }

            return json_decode($result);
        }


    }