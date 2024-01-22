//alert('Hola');

function buscarPeliB(){
    var inputValue = document.getElementById('Titulo').value;
    var requestBody = JSON.stringify({
      text: inputValue,
    });

    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        mostrarPeliBusquedaB(this.responseText);
      }
    };

    xmlhttp.open("POST", "http://localhost/logrofilm/filmaffinity-api/public/search/simple", true);
    xmlhttp.setRequestHeader("Content-type", "application/json");
    xmlhttp.send(requestBody);
}

function mostrarPeliBusquedaB(data) {
    var resultsContainer = document.getElementById('opciones');

    // Parsear la respuesta JSON
    var parsedData = JSON.parse(data);

    // Limpiar el contenido anterior del contenedor
    resultsContainer.innerHTML = '';

    // Verificar si hay resultados en la respuesta
    if (parsedData && parsedData.response.results) {
        // Iterar sobre los resultados y agregarlos al contenedor
        parsedData.response.results.forEach(function(result) {
            var resultItem = document.createElement('a');
            resultItem.textContent = result.title; // Ajusta la propiedad 'title' según la estructura de tu respuesta
            resultItem.href = "http://localhost/logrofilm/paginas/formP/"+result.id;
            resultItem.classList.add("fs-1");
            resultsContainer.appendChild(resultItem);
            var resultItem = document.createElement('br');
            resultsContainer.appendChild(resultItem);
        });
    } else {
        // Manejar el caso en que no hay resultados
        var noResultsItem = document.createElement('a');
        noResultsItem.textContent = 'No se encontraron resultados.';
        resultsContainer.appendChild(noResultsItem);
    }
  }


  function rellenarFormularioPeli($id){
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
  
    xmlhttp.onreadystatechange = function() {
      
    if (this.readyState == 4 && this.status == 200) {
      var parsedData = JSON.parse(this.responseText);
      document.getElementById('Nombre').value = parsedData.response.originalTitle;
      document.getElementById('Nombre_esp').value = parsedData.response.title;
      document.getElementById('id_fa').value = parsedData.response.filmAfinityId;
      document.getElementById('Sinopsis').value = parsedData.response.synopsis;
      document.getElementById('Imagen').value = parsedData.response.coverUrl;
      document.getElementById('Año').value = parsedData.response.year;
      document.getElementById('Duracion').value = parsedData.response.duration;
      document.getElementById('Casting').value = parsedData.response.cast;
      document.getElementById('Directores').value = parsedData.response.directors;
      document.getElementById('Generos').value = parsedData.response.genres;
    }
    };
  
    xmlhttp.open("GET", "http://localhost/logrofilm/filmaffinity-api/public/films/"+$id, true);
    xmlhttp.send();
  }