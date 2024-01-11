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
<body>
<a>Usuario: <?php echo $_SESSION["username"] ?></a> <a href="<?php echo RUTA_URL ;?> /paginas/pagina_principal/">Home</a> <a href="<?php echo RUTA_URL ;?> /paginas/cerrar/">Cerrar sesion</a>
    