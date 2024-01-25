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
<body onload="cargarComentarios(<?php echo $datos['id'] ?>)">
<?php require_once RUTA_APP.'/vistas/inc/Barra_nav.php';?> 


<div id="detalles_peli">
    <div id="imagen">
            <img src="<?php echo $datos["imagen"]?>">
    </div>
    <div class="detalles">
        <h1><?php echo $datos["nombre_esp"]?></h1>
        <h3><?php echo $datos["nombre"]?></h3>
        <a> <b>Año:</b> <?php echo $datos["año"]?></a><br>
        <a> <b>Duracion:</b> <?php echo $datos["duracion"]?></a><br><br>

        <p><?php echo $datos["descripcion"]?></p>
        <a> <b>Directores:</b> <?php echo $datos["directores"]?></a><br>
        <a> <b>Actores:</b> <?php echo $datos["casting"]?></a><br>
        <a> <b>Categorias:</b> <?php echo $datos["generos"]?></a><br>
        
    </div>
    
</div>

<h1 class="text-center">Comentarios</h1>

<div id="comentarios" class="w-75 m-auto">
    <form action="<?php echo RUTA_URL ;?> /paginas/subirComentario/<?php echo $datos['id'] ?>" method="post">
        <textarea class="w-100" name="texto" id="texto" cols="60" rows="3" placeholder="Escribe aqui tu comentario" required></textarea><br>
        <input class="button" type="submit" value="Post">
    </form>
</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php';?>

