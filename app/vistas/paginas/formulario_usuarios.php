<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="id=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/estilos.css">
    <title><?php echo NOMBRESITIO; ?> </title>
</head>
<body onload="rellenarFormularioUsuario(<?php echo $datos['id'] ?>)">
<?php require_once RUTA_APP.'/vistas/inc/Barra_nav.php';?> 

<h1 class="text-center">Editar usuario</h1>

<form class="w-50 m-auto" action="<?php echo RUTA_URL ;?> /paginas/editarUsuario/<?php echo $datos['id'] ?>" method="post">
    <a class="fw-bold">Nombre</a><br>
    <input class="w-100" type="text" id="nombre" name="nombre" placeholder="Nombre" required><br>
    <a class="fw-bold">Correo</a><br>
    <input class="w-100" type="text" id="correo" name="correo" placeholder="Correo" required><br>
    <a class="fw-bold">Contraseña</a><br>
    <input class="w-100" type="text" id="contraseña" name="contraseña" placeholder="Contraseña nueva (dejar en blanco si no qieres cambiarla)"><br><br>
    <input class="button" type="submit" value="Guardar">
</form>
<script type="text/javascript" src="<?php echo RUTA_URL; ?>/js/main.js"></script>
</body>
</html>