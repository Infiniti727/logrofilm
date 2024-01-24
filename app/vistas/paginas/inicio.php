<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="id=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title><?php echo NOMBRESITIO; ?> </title>
</head>
<body class="inicio">
    <div class="w-100">
    <form class="log-in position-absolute start-50 translate-middle top-50" action="<?php echo RUTA_URL ;?> /paginas/validacion/" method="post">
        <h1>Iniciar sesión</h1>
        <a>Introduzca los datos de su cuenta para iniciar sesión</a>  
        <br>
        <br>
        <div class="input position-relative">
            <img class="top-50 translate-middle-y" src="http://localhost:5500/logrofilm/public/img/perfil.png" alt="">
            <input type="text" id="usuario" name="usuario" placeholder="Nombre\email" required><br>
        </div>
        <br>
        <br>
        <div class="input position-relative">
            <img class="top-50 translate-middle-y" src="http://localhost:5500/logrofilm/public/img/contra.png" alt="">
            <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña" required><br>
        </div>
        <br>
        <br>
        <input class="button" type="submit" value="Iniciar sesión">
        <br>
        <a>¿No tienes una cuenta? </a> <a href="<?php echo RUTA_URL ;?>/paginas/sing_up">Create una</a> 
    </form>
    </div>
</body>
</html>