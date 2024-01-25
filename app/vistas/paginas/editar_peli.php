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
<body onload="rellenarFormularioPeliEdit(<?php echo $datos['id'] ?>)">

<?php require_once RUTA_APP.'/vistas/inc/Barra_nav.php';?>

<h1 class="text-center">Actualizar película</h1>

<form class="w-50 m-auto" action="<?php echo RUTA_URL ;?>/paginas/editarPelicula/<?php echo $datos['id'] ?>" method="post">
    <div class="justify-content-between d-flex">
        <div class="w-49">
            <a class="fw-bold">Nombre</a><br>
            <input class="w-100" type="text" id="nombre" name="nombre" placeholder="Nombre" required><br>
            <a class="fw-bold">Nombre español</a><br>
            <input class="w-100" type="text" id="nombre_esp" name="nombre_esp" placeholder="Nombre Español" required><br>
            <div class="justify-content-between d-flex">
                <div class="w-49">
                    <a class="fw-bold">Id filmaffinity</a><br>
                    <input class="w-100" type="number" id="id_fa" name="id_fa" placeholder="Id Filmaffinity" required><br>
                </div>
                <div class="w-49">
                    <a class="fw-bold">Duracion</a><br>
                    <input class="w-100" type="number" id="duracion" name="duracion" placeholder="Duracion" required><br>
                </div>
            </div>
        </div>
        <div class="w-49">
            <a class="fw-bold">Sinopsis</a><br>
            <textarea class="w-100 h-input-sinopsis" name="descripcion" id="descripcion" cols="60" rows="5" placeholder="Sinopsis"></textarea>
        </div>
    </div>
    <a class="fw-bold">Link imagen</a><br>
    <input class="w-100" type="text" id="imagen" name="imagen" placeholder="Link imagen" required><br>
    <a class="fw-bold">Año</a><br>
    <input class="w-100" type="number" id="año" name="año" placeholder="Año" required><br>
    <a class="fw-bold">Casting</a><br>
    <textarea class="w-100" name="casting" id="casting" cols="60" rows="3" placeholder="Casting (Separado por comas)"></textarea><br>
    <a class="fw-bold">Directores</a><br>
    <textarea class="w-100" name="directores" id="directores" cols="60" rows="3" placeholder="Directores (En caso de varios, separa por comas)"></textarea><br>
    <a class="fw-bold">Generos</a><br>
    <input class="w-100" type="text" id="generos" name="generos" placeholder="Generos (En caso de varios, separa por comas)" required><br><br>
    <input class="button" type="submit" value="Guardar">
</form>
<script type="text/javascript" src="<?php echo RUTA_URL; ?>/js/main.js"></script>
</body>
</html>