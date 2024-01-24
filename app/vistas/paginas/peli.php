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
<body>
<?php require_once RUTA_APP.'/vistas/inc/Barra_nav.php';?> 


<div id="detalles_peli">
    <div id="imagen">
            <img src="<?php echo $datos["imagen"]?>">
    </div>
    <div class="detalles">
        <h1><?php echo $datos["nombre_esp"]?></h1>
        <h3><?php echo $datos["nombre"]?></h3>
        <a> Año: <?php echo $datos["año"]?></a><br>
        <a> Duracion: <?php echo $datos["duracion"]?></a><br><br>

        <p><?php echo $datos["descripcion"]?></p>
        <a> Directores: <?php echo $datos["directores"]?></a><br>
        <a> Actores: <?php echo $datos["casting"]?></a><br>
        <a> Categorias: <?php echo $datos["generos"]?></a><br>
        
    </div>
    
</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php';?>

