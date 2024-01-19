<?php require_once RUTA_APP.'/vistas/inc/header.php';?>
<h1 class="titulo_panel">PANEL DE PELICULAS</h1>
<a class="btn ms-3 mb-3" href="<?php echo RUTA_URL ;?> /paginas/formP/">Añadir nueva</a>
<div>
    <table class="table table-striped">
        <tr>
            <td>Id</td>
            <td>Id Filmaffinity</td>
            <td>Nombre</td>
            <td>Nombre español</td>
            <td>Descripcion</td>
            <td>Imagen</td>
            <td>Año</td>
            <td>Duracion</td>
            <td>Casting</td>
            <td>Directores</td>
            <td>Generos</td>
            <td>Rating</td>
        </tr>
    </table>
</div>
<?php require_once RUTA_APP.'/vistas/inc/footer.php';?>