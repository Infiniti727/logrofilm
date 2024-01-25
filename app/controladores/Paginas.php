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
            $url =  $_POST["imagen"];  
  
            $img = "img/".$_POST["id_fa"].".png";  
            
            $context = stream_context_create([
                'http' => [
                    'header' => 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3',
                ],
            ]);

            file_put_contents($img, file_get_contents($url,false, $context)); 



            $datos = [
                "id_fa" => $_POST["id_fa"],
                "nombre" => $_POST["nombre"],
                "nombre_esp" => $_POST["nombre_esp"],
                "descripcion" => $_POST["descripcion"],
                "duracion" => $_POST["duracion"],
                "imagen" => "http://localhost/logrofilm/public/img/".$_POST["id_fa"].".png",
                "año" => $_POST["año"],
                "casting" => $_POST["casting"],
                "directores" => $_POST["directores"],
                "generos" => $_POST["generos"]
            ];

            $datos_string = json_encode($datos);
            //var_dump($datos_string);

            $this->CallAPI("POST","http://localhost/logrofilm/API/anadirPelicula/",$datos_string); 
            
            header("Location: /logrofilm/paginas/panelP/");
        }

        public function editarP($id){
            $datos = [
                "id" => $id
            ];

            $this->vista('paginas/editar_peli',$datos);
        }

        public function busqueda($entrada){
            $resultados = $this->CallAPI("GET","http://localhost/logrofilm/API/buscarPeliculas/".$entrada);
            $datos = [
                "resultados" => $resultados
            ];
            $this->vista('paginas/busqueda',$datos);
        }

        public function editarPelicula($id){
            $url =  $_POST["imagen"];  
  
            $img = "img/".$_POST["id_fa"].".png";  
            
            $context = stream_context_create([
                'http' => [
                    'header' => 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3',
                ],
            ]);

            file_put_contents($img, file_get_contents($url,false, $context)); 

            $datos = [
                "id" => $id,
                "id_fa" => $_POST["id_fa"],
                "nombre" => $_POST["nombre"],
                "nombre_esp" => $_POST["nombre_esp"],
                "descripcion" => $_POST["descripcion"],
                "duracion" => $_POST["duracion"],
                "imagen" => $_POST["imagen"],
                "año" => $_POST["año"],
                "casting" => $_POST["casting"],
                "directores" => $_POST["directores"],
                "generos" => $_POST["generos"]
            ];

            $datos_string = json_encode($datos);
            //var_dump($datos_string);

            $this->CallAPI("POST","http://localhost/logrofilm/API/editarPelicula/",$datos_string); 
            
            header("Location: /logrofilm/paginas/panelP/");
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

        public function peli($id){

            $peli =$this->CallAPI("GET","http://localhost/logrofilm/API/obtenerPeliculaID/".$id);
            $datos = [
                "id" => $id,
                "id_fa" => $peli->id_fa,
                "nombre" => $peli->nombre,
                "nombre_esp" => $peli->nombre_esp,
                "descripcion" => $peli->descripcion,
                "duracion" => $peli->duracion,
                "imagen" => $peli->imagen,
                "año" => $peli->año,
                "casting" => $peli->casting,
                "directores" => $peli->directores,
                "generos" => $peli->generos
            ];
            $this->vista('paginas/peli', $datos);
        }

        public function cines(){
            $this->vista('paginas/cines');
        }

        public function subirComentario($id_peli){
            $datos = [
                "id_peli" => $id_peli,
                "id_usuario" => $this->CallAPI("GET","http://localhost/logrofilm/API/getIdUsuario/".$_SESSION["username"]),
                "texto" => $_POST["texto"]
            ];

            $datos_string = json_encode($datos);
            //var_dump($datos_string);

            $this->CallAPI("POST","http://localhost/logrofilm/API/subirComentario/",$datos_string); 
            
            header("Location: /logrofilm/paginas/peli/".$id_peli);
            //header("Location: /logrofilm/paginas/panelP/");
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

            //echo $result;
            return json_decode($result);
        }


    }