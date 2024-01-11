<?php

//Configuración acceso a base de datos
define('DB_HOST', 'localhost'); //tu servidor de BD.
define('DB_USUARIO', 'root');
define('DB_PASSWORD', '');
define('DB_NOMBRE', 'logrofilm'); // Tu base de datos



//Ruta de la aplicación. /app o /src
define('RUTA_APP', dirname(dirname(__FILE__))); 

//Ruta url Ejemplo: http://localhost/ud5/mvc2app
//define ('RUTA_URL', '_URL_');
define ('RUTA_URL', 'http://localhost:5500/logrofilm');

//define ('NOMBRESITIO', '_NOMBRE_SITIO');
<<<<<<< HEAD
define ('NOMBRESITIO', 'ED 23 - 24s');
=======
define ('NOMBRESITIO', 'LogroFilm');
>>>>>>> 93c22a552ef63a348b673ae211521dea8320869c

// Cargar archivo INI si es necesario.
//$config = parse_ini_file(RUTA_APP . '/config/config.ini', true);

// Otras configuraciones iniciales pueden ir aquí