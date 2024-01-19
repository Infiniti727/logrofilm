<?php require_once RUTA_APP.'/vistas/inc/header.php';?>
<form>
    
    <a>Nombre</a>
    <input type="text" id="Nombre" name="Nombre" placeholder="Nombre" required><br>
    <a>Nombre español</a>
    <input type="text" id="Nombre_es" name="Nombre_es" placeholder="Nombre Español" required><br>
    <a>Id firmaffinity</a>
    <input type="number" id="id_fa" name="id_fa" placeholder="Id Filmaffinity" required><br>
    <a>Sinopsis</a>
    <textarea name="Sinopsis" id="Sinopsis" cols="30" rows="3" placeholder="Sinopsis"></textarea>
    <a>Link imagen</a>
    <input type="text" id="Imagen" name="Imagen" placeholder="Link imagen" required><br>
    <a>Año</a>
    <input type="number" id="Año" name="Año" placeholder="Año" required><br>
    <a>Duracion</a>
    <input type="number" id="Duracion" name="Duracion" placeholder="Duracion" required><br>
    <a>Casting</a>
    <textarea name="Sinopsis" id="Sinopsis" cols="30" rows="3" placeholder="Casting (Separado por comas)"></textarea>
    <a>Directores</a>
    <textarea name="Directores" id="Directores" cols="30" rows="3" placeholder="Directores (En caso de varios, separa por comas)"></textarea>
    <a>Generos</a>
    <input type="text" id="Generos" name="Generos" placeholder="Generos (En caso de varios, separa por comas)" required><br>
</form>
<?php require_once RUTA_APP.'/vistas/inc/footer.php';?>