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
<body onload="cargarComentariosUsuario(<?php echo $datos['id'] ?>)">
<?php require_once RUTA_APP.'/vistas/inc/Barra_nav.php';?> 

<h1 class="text-center">Comentarios de <?php echo $datos['nombre'] ?></h1>

<div id="comentarios" class="w-75 m-auto">

</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php';?>

