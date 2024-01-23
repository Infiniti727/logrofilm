<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="id=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/estilos.css">
    <title><?php echo NOMBRESITIO; ?> </title>
    <script>
    (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
        key: "AIzaSyBEF1cYG-FHyO94NVmyFHv5RW9dBLNf9D4",
        // Add other bootstrap parameters as needed, using camel case.
        // Use the 'v' parameter to indicate the version to load (alpha, beta, weekly, etc.)
    });
    </script>

</head>
<style>
  #map {
    height: 600px;
    max-width: 100%;
  }
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
</style>

<body onload="initMap()">
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


<div id="map"></div>


<!--<script type="text/javascript" src="<?php echo RUTA_URL; ?>/js/mapa.js"></script>-->

<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEF1cYG-FHyO94NVmyFHv5RW9dBLNf9D4&callback=initMap">
</script>

<script>
  // Función de inicialización del mapa
  async function initMap() {
  //@ts-ignore
  const { Map } = await google.maps.importLibrary("maps");
  const {Marker} = await google.maps.importLibrary("marker");
   
  map = new Map(document.getElementById("map"), {
    center: { lat: 42.46274395878901, lng: -2.444980123670719},
    zoom: 15,
  });

  map.setOptions({ 
        styles: [{
            featureType: "poi",
            stylers: [{ visibility: "off" }],
        }]
    });

  const ubicacionesCines = [
    
      { nombre: 'Teatro of Bretón de los Herreros', ubicacion: { lat: 42.46501665792584, lng: -2.4485148372461625 } , personalizado: true},
       
      { nombre: 'Filmoteca regional Rafael Azcona', ubicacion: { lat: 42.46413067845064, lng: -2.442718278388274 } , personalizado: true},
       
      { nombre: 'Cine Yelmo Premium Berceo', ubicacion: { lat: 42.46273522569608,  lng: -2.4203705282415173 } , personalizado: true},
      
      { nombre: 'Cine 7 Infantes', ubicacion: { lat: 42.456339508492945,  lng: -2.4612801347034363 }, personalizado: true },
      // Agrega más ubicaciones según sea necesario
    ];

    // Create an info window to share between markers.
    const infoWindow = new google.maps.InfoWindow();

    const marcadoresPersonalizados = [];

    // Agregar marcadores para cada ubicación de cine
    ubicacionesCines.forEach(cine => {
        const marker = new Marker({
        position: cine.ubicacion,
        map: map,
        title: cine.nombre,
      });

      if (cine.personalizado) {
      marcadoresPersonalizados.push(marker);
    }

      marker.addListener("click", () => {
      infoWindow.close();
      infoWindow.setContent(marker.getTitle());
      infoWindow.open(marker.getMap(), marker);
    });

    
    });
}

</script>
<?php require_once RUTA_APP.'/vistas/inc/footer.php';?>