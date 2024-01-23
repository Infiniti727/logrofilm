function initMap() {
    // Coordenadas del centro del mapa (puedes ajustar según tus necesidades)
    const centroMapa = { lat: 40.416775, lng: -3.703790 };

    // Crear un objeto de mapa y centrarlo en las coordenadas predeterminadas
    const mapa = new google.maps.Map(document.getElementById('map'), {
      center: centroMapa,
      zoom: 12, // Nivel de zoom inicial
    });

    // Lista de ubicaciones de cines
    const ubicacionesCines = [
      { nombre: 'Cine A', ubicacion: { lat: 40.415363, lng: -3.706194 } },
      { nombre: 'Cine B', ubicacion: { lat: 40.418270, lng: -3.703798 } },
      // Agrega más ubicaciones según sea necesario
    ];

    // Agregar marcadores para cada ubicación de cine
    ubicacionesCines.forEach(cine => {
      new google.maps.Marker({
        position: cine.ubicacion,
        map: mapa,
        title: cine.nombre,
      });
    });

    document.addEventListener('DOMContentLoaded', function() {
        initMap();
      });
  }