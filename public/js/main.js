//alert('Hola');

function buscarPeliB(){
    var inputValue = document.getElementById('Titulo').value;

    fetch('http://localhost/logrofilm/filmaffinity-api/public/search/simple', {
        method: 'POST',
        headers: {
        'Content-Type': 'application/json'
        },
        body: {
            "text": inputValue
        }
    })
    .then(response => response.json())
    .then(data => {
        mostrarPeliBusquedaB(data);
      })
      .catch(error => {
        console.error('Error al realizar la solicitud:', error);
      });
}

function mostrarPeliBusquedaB(data) {
    var resultsContainer = document.getElementById('opciones');
    resultsContainer.innerHTML = ''; 

    for (var i = 0; i < data.length; i++) {
      var resultItem = document.createElement('div');
      resultItem.textContent = data[i].title;
      resultsContainer.appendChild(resultItem);
    }
  }