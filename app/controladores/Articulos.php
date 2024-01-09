<?php

    class Articulos{
        public function __construct(){
            echo 'Controlador Artículos cargado';
            $this->articuloModelo = $this->modelo('Articulo');
        }
    }
