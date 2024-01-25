<?php require_once RUTA_APP.'/vistas/inc/header.php';?>
    <br>
        <h2 class="text-center">Peliculas añadidas recientemente</h2><br>
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div id="pelis_nuevas_1" class="active  carousel-item  pelis_nuevas">
        
        

                </div>
                <div id="pelis_nuevas_2" class=" carousel-item pelis_nuevas">
            
            

                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    
    <script type="text/javascript" src="<?php echo RUTA_URL; ?>/js/pagina_principal.js"></script>
<?php require_once RUTA_APP.'/vistas/inc/footer.php';?>
