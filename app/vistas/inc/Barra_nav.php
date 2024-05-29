<div class="navbar navbar-expand-lg navbar-dark bg-dark py-3 text-light p-5 position-relative">
        <div class="w-70 position-relative m-auto d-flex align-items-center justify-content-between"> 
            <div>
                <img src="http://localhost/logrofilm/public/img/logo.png" class="logo">
                <!--<h1>LOGROFILM</h1>-->
            </div>
            <div class="ps-3 pe-3 flex-fill">
                <input class="barra_busqueda" type="text" id="busqueda" name="busqueda" placeholder="Buscar" onkeydown="busqueda(this)" >
            </div>
        <div class="">
            <a class="link" href="<?php echo RUTA_URL ;?> /paginas/pagina_principal/">Home</a> 
            <a class="link" href="<?php echo RUTA_URL ;?> /paginas/cines/">Cines</a>
            <?php 
                if(isset($_SESSION["admin"])){
                    echo "<a class='link' href='".RUTA_URL."/paginas/panel/'>Panel de control</a>";
                }
            ?>
            <a class="link" href="<?php echo RUTA_URL ;?> /paginas/usuario/<?php echo $_SESSION["id"] ;?>"><?php echo $_SESSION["username"]?>
            <a class="link" href="<?php echo RUTA_URL ;?> /paginas/cerrar/">Cerrar sesion</a>
        </div>
    </div>
</div> 