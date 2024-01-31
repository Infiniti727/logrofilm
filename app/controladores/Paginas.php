<?php

    class Paginas extends Controlador{

        public function __construct(){
            session_start();
            
        }

        /**
         * Pagina incial, la cual es la de inicio de sesion
         */
        public function index(){     
            
            $datos = [
            ];

            if(isset($_SESSION['username'])){
                header('Location: /logrofilm/paginas/pagina_principal');
            } else {
                $this->vista('paginas/inicio', $datos); 
            }
               
        }

        /**
         * Pagina de creacion de cuenta.
         */
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

        /**
         * Validacion del inicio de sesion.
         */
        public function validacion(){
            $usuario_no_existe = true;
            $peticion = $this->CallAPI("GET","http://localhost:5500/logrofilm/API/getUsuariosContra/");
            foreach ($peticion as $row) {
                if($_POST["usuario"] == $row->nombre){
                    $usuario_no_existe = false;
                    if($_POST["contraseña"] == $row->contraseña){
                        $_SESSION['username'] = $_POST["usuario"];
                        $_SESSION["password"] = $_POST["contraseña"];
                        $_SESSION["email"] = $this->CallAPI("GET","http://localhost:5500/logrofilm/API/getEmail/".$_POST["usuario"]);
                        if($this->CallAPI("GET","http://localhost:5500/logrofilm/API/getAdmin/".$_POST["usuario"])){
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

        /**
         * Validacion de la creacion de usuarios.
         */
        public function validacion_2(){
            $modelo2 = $this->modelo('Correo');
            if($this->CallAPI("GET","http://localhost:5500/logrofilm/API/ComprobarNombre/".$_POST["usuario"]) == 0){
                if($this->CallAPI("GET","http://localhost:5500/logrofilm/API/ComprobarEmail/".$_POST["email"]) == 0){
                    $datos = [
                        "nombre" => $_POST["usuario"],
                        "email" => $_POST["email"],
                        "contraseña" => $_POST["contraseña"]
                    ];

                    $datos_string = json_encode($datos);
                    var_dump($datos_string);

                    $this->CallAPI("POST","http://localhost:5500/logrofilm/API/AnadirUsuario/",$datos_string); 
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

        /**
         * Peticion para añadir pelicula.
         */
        public function anadirPelicula(){
            if(isset($_SESSION['username'])){
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
                "imagen" => "http://localhost:5500/logrofilm/public/img/".$_POST["id_fa"].".png",
                "año" => $_POST["año"],
                "casting" => $_POST["casting"],
                "directores" => $_POST["directores"],
                "generos" => $_POST["generos"]
            ];

            $datos_string = json_encode($datos);
            //var_dump($datos_string);

            $this->CallAPI("POST","http://localhost:5500/logrofilm/API/anadirPelicula/",$datos_string); 
            
            header("Location: /logrofilm/paginas/panelP/");
            } else {
                header("Location: /logrofilm/paginas/");
            }
            
        }

        /**
         * Pagina de edicion de peliculas.
         */
        public function editarP($id){
            if(isset($_SESSION['username'])){
                $datos = [
                    "id" => $id
                ];
    
                $this->vista('paginas/editar_peli',$datos);
            } else {
                header("Location: /logrofilm/paginas/");
            }

    
        }

        /**
         * Pagina con los resultados de busqueda de peliculas de usuario
         */
        public function busqueda($entrada){
            if(isset($_SESSION['username'])){
               
                $resultados = $this->CallAPI("GET","http://localhost:5500/logrofilm/API/buscarPeliculas/".$entrada);
                $datos = [
                    "resultados" => $resultados
                ];
                $this->vista('paginas/busqueda',$datos);
            } else {
                header("Location: /logrofilm/paginas/");
            }

        }

        /**
         * Peticion para editar los datos de una pelicula
         */
        public function editarPelicula($id){
            if(isset($_SESSION['username'])){
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

                $this->CallAPI("POST","http://localhost:5500/logrofilm/API/editarPelicula/",$datos_string); 
                
                header("Location: /logrofilm/paginas/panelP/");
            } else {
                header("Location: /logrofilm/paginas/");
            }
            
        }

        public function editarUsuario($id){
            if(isset($_SESSION['username'])){
                $datos = [
                    "id" => $id,
                    "nombre" => $_POST["nombre"],
                    "correo" => $_POST["correo"],
                    "contraseña" => $_POST["contraseña"]
                ];
    
                $datos_string = json_encode($datos);
                //var_dump($datos_string);
    
                $this->CallAPI("POST","http://localhost:5500/logrofilm/API/editarUsuario/",$datos_string); 
                
                header("Location: /logrofilm/paginas/panelU/");
            } else {
                header("Location: /logrofilm/paginas/");
            }

            
        }
        /**
         * Pantalla principal de aplicacion una vez estas iniciada la sesion.
         */
        public function pagina_principal(){

            $datos = [
            ];

            if(isset($_SESSION['username'])){
                $this->vista('paginas/pagina_principal', $datos); 
                
            } else {
                header("Location: /logrofilm/paginas/");
            }
        }

        /**
         * Envio de correo a cuentas nuevas.
         */
        public function enviar(){
            if(isset($_SESSION['username'])){
                $Mailer = $this->modelo('Correo');

                $Mailer->enviar();
            } else {
                header("Location: /logrofilm/paginas/");
            }
            
        }

        /**
         * Panel de administrados.
         */
        public function panel(){
            if(isset($_SESSION['username'])){
                $this->vista('paginas/panel_control'); 
            } else {
                header("Location: /logrofilm/paginas/");
            }
            
        }

        /**
         * Panel de administrador de usuarios.
         */
        public function panelU(){
            if(isset($_SESSION['username'])){
                $datos = [
                    'usuarios' => $this->CallAPI("GET","http://localhost:5500/logrofilm/API/getUsuarios/")
                ];
    
                $this->vista('paginas/panel_usuarios', $datos); 
            } else {
                header("Location: /logrofilm/paginas/");
            }
            
            
        }

        /**
         * Panel de administrador de peliculas.
         */
        public function panelP(){
            if(isset($_SESSION['username'])){
                $this->vista('paginas/panel_peliculas'); 
            } else {
                header("Location: /logrofilm/paginas/");
            }
            
        }

        /**
         * Cierre de sesion.
         */
        public function cerrar(){
            session_destroy();
            header("Location: /logrofilm/paginas/");
        }

        /**
         * Peticion para desactivar o activar cuentas de usuarios.
         */
        public function activar_desactivar($id){
            if(isset($_SESSION['username'])){
                if($this->CallAPI("GET","http://localhost:5500/logrofilm/API/getDesactivada/".$id)){
                    $this->CallAPI("GET","http://localhost:5500/logrofilm/API/cambiarEstadoDesactivada/",["id"=>$id,"estado"=>1]);
    
                } else {
                    $this->CallAPI("GET","http://localhost:5500/logrofilm/API/cambiarEstadoDesactivada/",["id"=>$id,"estado"=>0]);
                }
                header("Location: /logrofilm/paginas/panelU/");
            } else {
                header("Location: /logrofilm/paginas/");
            }
            
            
        }

        /**
         * Formulario de peliculas.
         */
        public function formP($id){
            if(isset($_SESSION['username'])){
                $datos = [
                    "id" => $id
                ];
                $this->vista('paginas/formulario_peliculas',$datos);
            } else {
                header("Location: /logrofilm/paginas/");
            }
        }

         /**
         * Formulario de Usuario.
         */
        public function formU($id){
            if(isset($_SESSION['username'])){
                $datos = [
                    "id" => $id
                ];
    
                $this->vista('paginas/formulario_usuarios',$datos);
            } else {
                header("Location: /logrofilm/paginas/"); 
            }
        }

        /**
         * Pagina para buscar peliculas de la base de datos de filmaffinity.
         */
        public function anadirP(){
            if(isset($_SESSION['username'])){
                $this->vista('paginas/buscar_peli_backend');
            } else {
                header("Location: /logrofilm/paginas/");
            }
            
        }

        /**
         * Pagina con datos de una pelicula.
         */
        public function peli($id){
            if(isset($_SESSION['username'])){
                $peli =$this->CallAPI("GET","http://localhost:5500/logrofilm/API/obtenerPeliculaID/".$id);
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
            } else {
                header("Location: /logrofilm/paginas/");
            }

            
        }

        /**
         * Pagina con mapa con cines de logroño.
         */
        public function cines(){
            if(isset($_SESSION['username'])){
                $this->vista('paginas/cines');
            } else {
                header("Location: /logrofilm/paginas/"); 
            }
            
        }

        /**
         * Peticion para guardar un comentario.
         */
        public function subirComentarioyRating($id_peli){
            if(isset($_SESSION['username'])){

                if($_POST["texto"] != ""){
                    $datos = [  
                        "id_peli" => $id_peli,
                        "id_usuario" => $this->CallAPI("GET","http://localhost:5500/logrofilm/API/getIdUsuario/".$_SESSION["username"]),
                        "texto" => $_POST["texto"]
                    ];
        
                    $datos_string = json_encode($datos);
                    //var_dump($datos_string);
        
                    $this->CallAPI("POST","http://localhost:5500/logrofilm/API/subirComentario/",$datos_string); 
                }

                if($_POST["rating"] != ""){
                    $datos = [  
                        "id_peli" => $id_peli,
                        "id_usuario" => $this->CallAPI("GET","http://localhost:5500/logrofilm/API/getIdUsuario/".$_SESSION["username"]),
                        "valor" => $_POST["rating"]
                    ];
        
                    $datos_string = json_encode($datos);
                    //var_dump($datos_string);
        
                    $this->CallAPI("POST","http://localhost:5500/logrofilm/API/subirRating/",$datos_string); 
                }
                header("Location: /logrofilm/paginas/peli/".$id_peli);
            } else {
                header("Location: /logrofilm/paginas/"); 
            }
            
        }

        /**
         * Peticion para eliminar un comentario.
         */
        public function eliminarComentario($id){
            if(isset($_SESSION['username'])){
                $comentario = $this->CallAPI("GET","http://localhost:5500/logrofilm/API/obtenerComentario/".$id); 

                $datos = [
                    "id" => $id,
                ];

                $datos_string = json_encode($datos);
                var_dump($datos_string);

                $this->CallAPI("POST","http://localhost:5500/logrofilm/API/eliminarComentario/",$datos_string); 
                
                header("Location: /logrofilm/paginas/peli/".$comentario->id_peli);
            } else {
                header("Location: /logrofilm/paginas/"); 
            }
        }

        /**
         * Clase para llamada a apis.
         */
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

            echo $result;
            return json_decode($result);
        }


    }