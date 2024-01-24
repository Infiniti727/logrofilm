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
    <form class="log-in position-absolute start-50 translate-middle top-50" action="<?php echo RUTA_URL ;?> /paginas/validacion_2/" method="post">
        <h1>Cear una cuenta</h1>
        <a>Introduzca los datos de la nueva cuenta</a>  
        <br>
        <br>
        <div class="input position-relative">
            <img class="top-50 translate-middle-y" src="http://localhost/logrofilm/public/img/perfil.png" alt="">
            <input type="text" id="usuario" name="usuario" placeholder="Nombre" required><br>
        </div>
        <br>
        <br>
        <div class="input position-relative">
            <img class="top-50 translate-middle-y" src="http://localhost/logrofilm/public/img/mail.png" alt="">
            <input type="text" id="email" name="email" placeholder="Email" required><br>
        </div>
        <br>
        <br>
        <div class="input position-relative">
            <img class="top-50 translate-middle-y" src="http://localhost/logrofilm/public/img/contra.png" alt="">
            <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña" required><br>
        </div>
        <br>
        <br>
        <input class="button" type="submit" value="Crear cuenta">
        <br>
        <a>¿Ya tienes una cuenta? </a> <a href="<?php echo RUTA_URL ;?>/paginas/">Inicia sesión</a>
        <br>
        <?php 
            if($datos["asd"] != 0){
                echo "<a>";
                if($datos["asd"] == "error1"){
                    echo "El nombre de usuario ya está en uso";
                } else{
                    echo "La dirección de corréo electrónico ya esta en uso";
                }
                echo "</a>";
            } 
        ?>
    </form>
    </div>
    
</body>
</html>