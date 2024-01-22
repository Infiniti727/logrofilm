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
<body onload="rellenarFormularioPeli(<?php echo $datos['id'] ?>)">
    <div class="navbar navbar-expand-lg navbar-dark bg-dark py-3 text-light p-5 position-relative">
        <div class="w-70 position-relative m-auto"> 
            <div class="float-left">
                <h1>LOGROFILM</h1>
            </div>
            <div class="float-left position-absolute end-0 translate-middle-x top-50 translate-middle-y">
                <a class="link" href="<?php echo RUTA_URL ;?> /paginas/pagina_principal/">Home</a> 
                <a class="link" href="<?php echo RUTA_URL ;?> /paginas/cines/">Cines</a>
                <?php 
                    if(isset($_SESSION["admin"])){
                        echo "<a class='link' href='".RUTA_URL."/paginas/panel/'>Panel de control</a>";
                    }
                ?>
                <a><?php echo $_SESSION["username"]?>
                <a class="link" href="<?php echo RUTA_URL ;?> /paginas/cerrar/">Cerrar sesion</a>
            </div>
        </div>
</div>  

<h1 class="text-center">Añadir Pelicula</h1>

<form class="w-50 m-auto" action="<?php echo RUTA_URL ;?> /paginas/anadirPelicula/" method="post">
    <div class="justify-content-between d-flex">
        <div class="w-49">
            <a class="fw-bold">Nombre</a><br>
            <input class="w-100" type="text" id="Nombre" name="Nombre" placeholder="Nombre" required><br>
            <a class="fw-bold">Nombre español</a><br>
            <input class="w-100" type="text" id="Nombre_esp" name="Nombre_esp" placeholder="Nombre Español" required><br>
            <div class="justify-content-between d-flex">
                <div class="w-49">
                    <a class="fw-bold">Id firmaffinity</a><br>
                    <input class="w-100" type="number" id="id_fa" name="id_fa" placeholder="Id Filmaffinity" required><br>
                </div>
                <div class="w-49">
                    <a class="fw-bold">Duracion</a><br>
                    <input class="w-100" type="number" id="Duracion" name="Duracion" placeholder="Duracion" required><br>
                </div>
            </div>
        </div>
        <div class="w-49">
            <a class="fw-bold">Sinopsis</a><br>
            <textarea class="w-100 h-input-sinopsis" name="Sinopsis" id="Sinopsis" cols="60" rows="5" placeholder="Sinopsis"></textarea>
        </div>
    </div>
    <a class="fw-bold">Link imagen</a><br>
    <input class="w-100" type="text" id="Imagen" name="Imagen" placeholder="Link imagen" required><br>
    <a class="fw-bold">Año</a><br>
    <input class="w-100" type="number" id="Año" name="Año" placeholder="Año" required><br>
    <a class="fw-bold">Casting</a><br>
    <textarea class="w-100" name="Casting" id="Casting" cols="60" rows="3" placeholder="Casting (Separado por comas)"></textarea><br>
    <a class="fw-bold">Directores</a><br>
    <textarea class="w-100" name="Directores" id="Directores" cols="60" rows="3" placeholder="Directores (En caso de varios, separa por comas)"></textarea><br>
    <a class="fw-bold">Generos</a><br>
    <input class="w-100" type="text" id="Generos" name="Generos" placeholder="Generos (En caso de varios, separa por comas)" required><br><br>
    <input class="button" type="submit" value="Añadir">
</form>
<?php require_once RUTA_APP.'/vistas/inc/footer.php';?>