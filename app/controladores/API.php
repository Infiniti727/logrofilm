<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class API extends Controlador{

    var $modelo;
    var $modelo2;
    var $modelo3;
    var $modelo4;
    var $key = 'clave_secreta'; 
    const DATA = '222';
    
    function __construct()
    {
        $this->modelo = $this->modelo('Usuario');
        $this->modelo2 = $this->modelo('Pelicula');
        $this->modelo3 = $this->modelo("Comentario");
        $this->modelo4 = $this->modelo("Rating");
    }

     /**
     *Los códigos de respuesta más comúnmente utilizados con REST son:
     
     *200 OK. Satisfactoria.
     *201 Created. Un resource se ha creado. Respuesta satisfactoria a un request POST o PUT.
     *400 Bad Request. El request tiene algún error, por ejemplo cuando los datos proporcionados en POST o PUT no pasan la validación.
     *401 Unauthorized. Es necesario identificarse primero.
     *404 Not Found. Esta respuesta indica que el resource requerido no se puede encontrar (La URL no se corresponde con un resource).
     *405 Method Not Allowed. El método HTTP utilizado no es soportado por este resource.
     *409 Conflict. Conflicto, por ejemplo cuando se usa un PUT request para crear el mismo resource dos veces.
     *500 Internal Server Error. Un error 500 suele ser un error inesperado en el servidor.
     
     **/

    /**
     * Autenticación básica. Se obtendrá un response si el usuario y password facilitado en 
     * la cabecera es correcta, sin devolver ningún token adicional.
     */
    public function getUsuarios(){
        header("Content-Type: application/json', 'HTTP/1.1 200 OK");
        echo json_encode($this->modelo->obtenerUsuarios());
    }

    public function getUsuarioId($id){
        header("Content-Type: application/json', 'HTTP/1.1 200 OK");
        echo json_encode($this->modelo->obtenerPorID($id));
    }

    public function getUsuariosContra(){

        header("Content-Type: application/json', 'HTTP/1.1 200 OK");
        echo json_encode($this->modelo->obtenerUsuarioContraseña());
    }

    public function getEmail($nombre){
        header("Content-Type: application/json', 'HTTP/1.1 200 OK");
        echo json_encode($this->modelo->obtenerEmail($nombre));
    } 

    public function getAdmin($nombre){
        header("Content-Type: application/json', 'HTTP/1.1 200 OK");
        echo json_encode($this->modelo->esAdmin($nombre));
    } 

    public function getIdUsuario($nombre){
        header("Content-Type: application/json', 'HTTP/1.1 200 OK");
        echo json_encode($this->modelo->getIdUsuario($nombre));
    } 

    public function ComprobarNombre($nombre){
        header("Content-Type: application/json', 'HTTP/1.1 200 OK");
        echo json_encode($this->modelo->ComprobarNombre($nombre));
    }

    public function ComprobarEmail($email){
        header("Content-Type: application/json', 'HTTP/1.1 200 OK");
        echo json_encode($this->modelo->ComprobarEmail($email));
    }
    
    public function AnadirUsuario(){
        header("Content-Type: application/json', 'HTTP/1.1 201 OK");
        
        $data = json_decode(file_get_contents("php://input"));
        $this->modelo->crearUsuario($data->nombre,$data->email,$data->contraseña);
    }  
    
    public function getDesactivada($id){
        header("Content-type: application/json', 'HTTP/1.1 200 OK");
        return $this->modelo->obtenerPorID($id)->desactivada;
    }

    public function cambiarEstadoDesactivada(){
        header("Content-type: application/json', 'HTTP/1.1 201 OK");
        $this->modelo->cambiarActivada($_GET["id"],$_GET["estado"]);
    }

    public function anadirPelicula(){
        header("Content-Type: application/json', 'HTTP/1.1 201 OK");
        
        $data = json_decode(file_get_contents("php://input"));
        $this->modelo2->anadirPelicula($data->id_fa,$data->nombre,$data->nombre_esp,$data->descripcion,$data->imagen,$data->año,$data->duracion,$data->directores,$data->casting, $data->generos);
        return var_dump($data);
    }

    public function obtenerPeliculas(){
        header("Content-Type: application/json', 'HTTP/1.1 200 OK");
        echo json_encode($this->modelo2->obtenerPeliculas());

    }

    public function obtenerUltimasPeliculas(){
        header("Content-Type: application/json', 'HTTP/1.1 200 OK");
        echo json_encode($this->modelo2->obtenerUltimasPeliculas());
    }

    public function obtenerPeliculaID($id){
        header("Content-Type: application/json', 'HTTP/1.1 200 OK");
        echo json_encode($this->modelo2->obtenerPeliculaID($id));

    }

    public function editarPelicula(){
        $data = json_decode(file_get_contents("php://input"));
        $this->modelo2->editarPelicula($data->id,$data->id_fa,$data->nombre,$data->nombre_esp,$data->descripcion,$data->imagen,$data->año,$data->duracion,$data->directores,$data->casting, $data->generos);
        return var_dump($data);
    }

    public function obtenerTodasPeliculas(){
        header("Content-Type: application/json', 'HTTP/1.1 200 OK");
        echo json_encode($this->modelo2->obtenerTodasPeliculas());
    }

    public function buscarPeliculas($entrada){
        header("Content-Type: application/json', 'HTTP/1.1 200 OK");
        echo json_encode($this->modelo2->buscarPeliculas($entrada));
    }

    public function obtenerComentariosPeli($id){
        header("Content-Type: application/json', 'HTTP/1.1 200 OK");
        echo json_encode($this->modelo3->obtenerComentariosPeli($id));
    }

    public function obtenerComentariosUsuario($id){
        header("Content-Type: application/json', 'HTTP/1.1 200 OK");
        echo json_encode($this->modelo3->obtenerComentariosUsuario($id));
    }

    public function subirComentario(){
        $data = json_decode(file_get_contents("php://input"));
        echo $data->valor;
        if($data->valor != "-"){
            echo 123123;
            $this->modelo4->crearRating($data->id_peli,$data->valor);
            $id_rating = $this->modelo4->obtenerRatingPeliUltimo($data->id_peli);
            
            $this->modelo3->subirComentario($data->id_peli,$data->id_usuario,$data->texto, $id_rating);
        }else {
            
            $this->modelo3->subirComentarioNull($data->id_peli,$data->id_usuario,$data->texto);
        }
        
        //echo $id_rating; 
        //return json_encode($id_rating);
        //return var_dump($data);
    }

    public function obtenerRatings(){
        header("Content-Type: application/json', 'HTTP/1.1 200 OK");
        echo json_encode($this->modelo4->obtenerRatings());
    }

    public function obtenerRatingId($id){
        header("Content-Type: application/json', 'HTTP/1.1 200 OK");
        echo json_encode($this->modelo4->obtenerRatingId($id));
    }

    public function obtenerRatingPeli($id){
        header("Content-Type: application/json', 'HTTP/1.1 200 OK");
        echo $formateado = number_format($this->modelo4->obtenerRatingPeli($id),1);
    }

    public function crearRating($id_peli,$valor) {
        $data = json_decode(file_get_contents("php://input"));
        $this->modelo4->crearRating($data->id_peli,$data->valor);
    }
    
    /**
     * Autenticación básica. Se obtendrá un response si el usuario y password facilitado en 
     * la cabecera es correcta, pero en esta ocasión devolverá un token adicional (JWT), que será transportado
     * en el resto de peticiones mediante autenticación Bearer.
     */
    public function getTokenJWT($valores){
        $lista = explode("_",$valores,2);
        header("Content-Type: application/json', 'HTTP/1.1 200 OK");
        $check = $this->basicAuthorization($lista[0],$lista[1]);
        if ($check){
            header("Content-Type: application/json', 'HTTP/1.1 200 OK");
            $array = array();
            $array["token"] = $this->getJWT(self::DATA,$lista[0]);
            // Lo suyo sería obtener el token con datos del usuario al que se le entrega el token, si es que
            // hay usuarios personalizados. Si es un servicio general, se le entrega un dato genérico para todos
            // Se transporta el token para ser reenviado en posteriores llamadas al API Rest
            echo json_encode($array);
        }else{
            header('HTTP/1.1 401 Unauthorized', true, 401);
            echo "Acceso no autorizado ";
        }
    }
    
    /**
     * Autenticación básica. Se obtendrá un response si el usuario y password facilitado en
     * la cabecera es correcta, devolverá un token simple que será transportado
     * en el resto de peticiones mediante autenticación Bearer.
     */
    public function getTokenSimple(){
        $data = json_decode(file_get_contents("php://input"));
        $check = $this->basicAuthorization($data->usuario,$data->contra);
        if ($check){
            header("Content-Type: application/json', 'HTTP/1.1 200 OK");
            $array = array();
            $array["token"] = $this->getToken(20);
            echo json_encode($array);
        }else{
            header('HTTP/1.1 401 Unauthorized', true, 401);
            echo "Acceso no autorizado ";
        }
    }
    
    
    /**
     * Get header Authorization
     * */
    function getAuthorizationHeader(){
        $headers = null;
        if (isset($_SERVER['Authorization'])) {
            $headers = trim($_SERVER["Authorization"]);
        }else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
            $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
        }elseif (function_exists('apache_request_headers')) {
            $requestHeaders = apache_request_headers();
            // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
            $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
            //print_r($requestHeaders);
            if (isset($requestHeaders['Authorization'])) {
                $headers = trim($requestHeaders['Authorization']);
            }
        }
        return $headers;
    }
    
    /**
     * get access token from header
     * */
    function getBearerToken() {
        $headers = $this->getAuthorizationHeader();
        // HEADER: Get the access token from the header
        if (!empty($headers)) {
            if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
                return $matches[1];
            }
        }
        return null;
    }
    
    private function basicAuthorization($usuario,$contra){
            $usuario_no_existe = true;
            $petition = $this->modelo->obtenerUsuarios();
            foreach ($petition as $row) {
                if($usuario == $row->nombre){
                    $usuario_no_existe = false;
                    if($contra == $row->contraseña){
                        return true;
                    } else {
                        return false;
                    }
                }
            }
            if($usuario_no_existe){
                return false;
            }
         
    }
    
    private function tokenAuthorization(){
        if (($_SERVER['PHP_AUTH_USER'] == "111") && ($_SERVER['PHP_AUTH_PW'] == "222")) {
            return true;
        }else {
            return false;
        }
    }
    
    // Token criptográficamente seguro, pero no podemos asociarle informacion como sucede con el JWT
    private function getToken($longitud){
        if ($longitud < 4) {
            $longitud = 4;
        }
        $token = bin2hex(random_bytes(($longitud - ($longitud % 2)) / 2));
        // El token sólo será válido si no está repetido en BD. Se ser así, se 
        // almacenará en la tabla correspondiente
        return $token;
    }
    
    // Ejecutar composer require firebase/php-jwt en la raíz de mvc_api_rest
    // Esto generará la carpeta vendor con la librería de Firebase para obtener tokens
    // En el frontal index.php se incluye 'require("./vendor/autoload.php");'
    // En esta clase se incluye 'use Firebase\JWT\JWT;'
    // URL tutorial: https://anexsoft.com/implementacion-de-json-web-token-con-php
    private function getJWT($data,$usuario){ 
        $time = time();      
        $petition = $this->modelo->obtenerUsuarios();
            foreach ($petition as $row) {
                if($usuario == $row->nombre){
                    $token = array(
                        'iat' => $time, // Tiempo que inició el token
                        'exp' => $time + (60*60), // Tiempo que expirará el token (+1 hora)
                        'data' => [ // información del usuario o lo que consideremos necesario incluir
                            'idUser' => $row->id, // Se obtendría de BD si hay usuarios personalizados
                            'passwordUser' => $row->contraseña, // Se obtendría de BD si hay usuarios personalizados
                            'passwordToken' => $data // Para usuarios genéricos
                        ]
                    );     
                    $jwt = JWT::encode($token, $this->key, "HS256"); 
                    return $jwt;
                }
                }
        
        //$data = JWT::decode($jwt, $key, array('HS256')); // Si ha expirado dará un error
        //var_dump($jwt);
        //var_dump($data);
    }


    function checkJWT($jwt){
        header("Content-Type: application/json', 'HTTP/1.1 200 OK");
        if(JWT::decode($jwt, new Key($this->key, 'HS256')) ){
            echo true;
        }
    }
}