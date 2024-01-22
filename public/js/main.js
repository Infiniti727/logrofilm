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

    xmlhttp.open("POST", "http://localhost:5500/logrofilm/filmaffinity-api/public/search/simple", true);
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
            resultItem.href = "http://localhost:5500/logrofilm/paginas/formP/"+result.id;
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
      document.getElementById('nombre').value = parsedData.response.originalTitle;
      document.getElementById('nombre_esp').value = parsedData.response.title;
      document.getElementById('id_fa').value = parsedData.response.filmAfinityId;
      document.getElementById('descripcion').value = parsedData.response.synopsis;
      document.getElementById('imagen').value = parsedData.response.coverUrl;
      document.getElementById('año').value = parsedData.response.year;
      document.getElementById('duracion').value = parsedData.response.duration;
      document.getElementById('casting').value = parsedData.response.cast;
      document.getElementById('directores').value = parsedData.response.directors;
      document.getElementById('generos').value = parsedData.response.genres;
    }
    };
  
    xmlhttp.open("GET", "http://localhost:5500/logrofilm/filmaffinity-api/public/films/"+$id, true);
    xmlhttp.send();
  }

  function rellenarTablaPeli(){
    var tabla = document.getElementById("tabla_pelis");

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

      parsedData.forEach(function(result) {
        var row = document.createElement('tr');
        var column = document.createElement("td");
        column.innerHTML = result.id;
        row.appendChild(column);
        var column = document.createElement("td");
        column.innerHTML = result.id_fa;
        row.appendChild(column);
        var column = document.createElement("td");
        column.innerHTML = result.nombre;
        row.appendChild(column);
        var column = document.createElement("td");
        column.innerHTML = result.nombre_esp;
        row.appendChild(column);
        var column = document.createElement("td");
        var a = document.createElement("a");
        a.classList.add("btn");
        a.href = "http://localhost:5500/logrofilm/paginas/editarP/"+result.id;
        a.innerText = "Editar";
        column.appendChild(a);
        row.appendChild(column);
        tabla.appendChild(row);
    });

      }
    };
  
    xmlhttp.open("GET", "http://localhost:5500/logrofilm/API/obtenerPeliculas", true);
    xmlhttp.send();
  }