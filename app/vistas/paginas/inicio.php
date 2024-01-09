<?php require_once RUTA_APP.'/vistas/inc/header.php';?>
<form action="<?php echo RUTA_URL ;?> /paginas/validacion/" method="post">
            <label for="usuario">usuario:</label>
            <input type="text" id="usuario" name="usuario" required><br>

            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" required><br>

            <input type="submit" value="Enviar">
    </form>
    <?php echo $datos["a"]?>
</body>
</html>