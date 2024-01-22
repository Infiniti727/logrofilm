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
<body onload="rellenarTablaPeli()">
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


<h1 class="titulo_panel">PANEL DE PELICULAS</h1>
<a class="btn ms-3 mb-3" href="<?php echo RUTA_URL ;?> /paginas/anadirP/">Añadir nueva</a>
<div>
    <table id="tabla_pelis" class="table table-striped">
        <tr>
            <td>Id</td>
            <td>Id Filmaffinity</td>
            <td>Nombre</td>
            <td>Nombre español</td>
            <td>Editar</td>
        </tr>
    </table>
</div>
<?php require_once RUTA_APP.'/vistas/inc/footer.php';?>