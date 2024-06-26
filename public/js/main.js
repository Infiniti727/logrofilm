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
  
    xmlhttp.open("GET", "http://localhost/logrofilm/filmaffinity-api/public/films/"+$id, true);
    xmlhttp.send();
  }

  function rellenarFormularioPeliEdit($id){
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
      document.getElementById('nombre').value = parsedData.nombre;
      document.getElementById('nombre_esp').value = parsedData.nombre_esp;
      document.getElementById('id_fa').value = parsedData.id_fa;
      document.getElementById('descripcion').value = parsedData.descripcion;
      document.getElementById('imagen').value = parsedData.imagen;
      document.getElementById('año').value = parsedData.año;
      document.getElementById('duracion').value = parsedData.duracion;
      document.getElementById('casting').value = parsedData.casting;
      document.getElementById('directores').value = parsedData.directores;
      document.getElementById('generos').value = parsedData.generos;
    }
    };
  
    xmlhttp.open("GET", "http://localhost/logrofilm/API/obtenerPeliculaID/"+$id, true);
    xmlhttp.send();
  }

  function rellenarTablaPeli(){
    var tabla = document.getElementById("tabla_pelis").children[0];

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
        a.href = "http://localhost/logrofilm/paginas/editarP/"+result.id;
        a.innerText = "Editar";
        column.appendChild(a);
        row.appendChild(column);
        tabla.appendChild(row);
    });

      }
    };
  
    xmlhttp.open("GET", "http://localhost/logrofilm/API/obtenerTodasPeliculas", true);
    xmlhttp.send();
  }

  function busqueda(texto) {
    if(event.key === 'Enter' && texto.value != " " ) {
      window.location.href = "http://localhost/logrofilm%20/paginas/busqueda/"+texto.value;   
    }
}

  function mostrarResultados(entrada){
    resultados = document.getElementById("resultados");

    /**entrada.forEach(function(result){
      padre = document.createElement("div");
      padre.classList.add("resultado");
      padre.classList.add("d-flex");
      padre.classList.add("align-items-center");
      padre.classList.add("justify-content-between");
      div1 = document.createElement("div");
      imagen = document.createElement("img");
      imagen.src = result.imagen;
      div1.appendChild(imagen);
      div2 = document.createElement("div");
      nombre = document.createElement("p");
      nombre.innerText = result.nombre_esp;
      div2.appendChild(nombre);
      div3 = document.createElement("div");
      sinopsis = document.createElement("p");
      sinopsis.innerText = result.descripcion;
      div3.appendChild(sinopsis);
      div4 = document.createElement("div");
      año = document.createElement("p");
      año.innerText = result.año;
      div4.appendChild(año);

      padre.appendChild(div1);
      padre.appendChild(div2);
      padre.appendChild(div3);
      padre.appendChild(div4);

      resultados.appendChild(padre);
    })**/

    entrada.forEach(function(result) {
      var div2 = document.createElement("div");
      var div3 = document.createElement("div");
      div3.classList.add("d-flex");
      div3.classList.add("align-items-center");
      div3.classList.add("justify-content-between");
      var descripcion  = document.createElement("p");
      descripcion.innerHTML = result.descripcion;
      div3.classList.add("escondido");
      div3.appendChild(descripcion);
      div2.classList.add("peli");
      div2.appendChild(div3);
      div2.onclick = function() {
          window.location.href = "http://localhost/logrofilm%20/paginas/peli/"+result.id;
      }
      var img = document.createElement("img");
      var p = document.createElement("p");
      p.innerText = result.nombre_esp;
      img.src = result.imagen;
      div2.appendChild(img);
      div2.appendChild(p);
      resultados.appendChild(div2);
  });


  }

  function cargarComentarios(id) {
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    xmlhttp.onreadystatechange = async function() {
        if (this.readyState == 4 && this.status == 200) {
            comentarios = document.getElementById("comentarios");
            var parsedData = JSON.parse(this.responseText);
            for (const result of parsedData) {
                const valor = await obtenerRating(result.id_rating);
                const comentario = document.createElement("div");
                comentario.classList.add("comentario");

                const nombre = document.createElement("a");
                nombre.id = result.id_usuario;
                nombre.classList.add("link");
                nombre.href = "http://localhost/logrofilm%20/paginas/usuario/"+result.id_usuario;

                const texto = document.createElement("p");
                texto.innerText = result.comentario;

                const rating = document.createElement("p");
                rating.innerHTML = "<b>Rating</b>: " + valor;

                comentario.appendChild(nombre);
                comentario.appendChild(rating);
                comentario.appendChild(texto);
                comentarios.appendChild(comentario);

                obtenerNombreUsuario(result.id_usuario);
            }
        }
    };

    xmlhttp.open("GET", "http://localhost/logrofilm/API/obtenerComentariosPeli/"+id, true);
    xmlhttp.send();
}

function obtenerRating(id) {
    return new Promise((resolve, reject) => {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp2 = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp2 = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp2.onreadystatechange = function() {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    var parsedData = JSON.parse(this.responseText);
                    var valor = null;
                    parsedData.forEach(function(result) {
                        valor = result.valor;
                    });
                    resolve(valor);
                } else {
                    reject("Error loading rating");
                }
            }
        };

        xmlhttp2.open("GET", "http://localhost/logrofilm/API/obtenerRatingId/"+id, true);
        xmlhttp2.send();
    });
}

function obtenerNombrePeli(id) {
  return new Promise((resolve, reject) => {
      if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp3 = new XMLHttpRequest();
      } else {
          // code for IE6, IE5
          xmlhttp3 = new ActiveXObject("Microsoft.XMLHTTP");
      }

      xmlhttp3.onreadystatechange = function() {
          if (this.readyState == 4) {
              if (this.status == 200) {
                  var parsedData = JSON.parse(this.responseText);
                  var nombre = null;
                  
                  resolve(parsedData.nombre_esp);
              } else {
                  reject("Error loading rating");
              }
          }
      };

      xmlhttp3.open("GET", "http://localhost/logrofilm/API/obtenerPeliculaID/"+id, true);
      xmlhttp3.send();
  });
}

function cargarComentariosUsuario(id) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  xmlhttp.onreadystatechange = async function() {
      if (this.readyState == 4 && this.status == 200) {
          comentarios = document.getElementById("comentarios");
          var parsedData = JSON.parse(this.responseText);
          for (const result of parsedData) {
              const valor = await obtenerRating(result.id_rating);
              const peli = await obtenerNombrePeli(result.id_peli);
              const comentario = document.createElement("div");
              comentario.classList.add("comentario");

              const nombre = document.createElement("a");
              nombre.id = result.id_usuario;
              

              const texto = document.createElement("p");
              texto.innerText = result.comentario;

              const rating = document.createElement("p");
              rating.innerHTML = "<b>Rating</b>: " + valor;

              const pelicula = document.createElement("p");
              pelicula.innerHTML = "<b>Pelicula</b>: " + peli;

              comentario.appendChild(pelicula);
              comentario.appendChild(rating);
              comentario.appendChild(texto);
              comentarios.appendChild(comentario);
          }
      }
  };

  xmlhttp.open("GET", "http://localhost/logrofilm/API/obtenerComentariosUsuario/"+id, true);
  xmlhttp.send();
}

  function obtenerNombreUsuario(id){
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
        document.getElementById(id).innerHTML = "<b>"+ parsedData.nombre +"</b>";
      }
    }
    xmlhttp.open("GET", "http://localhost/logrofilm/API/getUsuarioId/"+id, true);
    xmlhttp.send();
  }