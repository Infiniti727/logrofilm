document.body.onload =  function() {

    peliculasNuevas();
};


function peliculasNuevas(){
    var div = document.getElementById('pelis_nuevas');


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
            var div2 = document.createElement("div")
            var img = document.createElement("img");
            var p = document.createElement("p");
            p.innerText = result.nombre_esp;
            img.src = result.imagen;
            img.style.width = "200px";
            div2.appendChild(img);
            div2.appendChild(p);
            div.appendChild(div2);
        });
      }
    };

    xmlhttp.open("GET", "http://localhost:5500/logrofilm/API/obtenerUltimasPeliculas/", true);
    xmlhttp.send();
}
