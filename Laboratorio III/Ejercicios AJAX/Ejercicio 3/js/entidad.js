"use strict";
var Entidades;
(function (Entidades) {
    let xhttp = new XMLHttpRequest();
    function Ver() {
        let path = document.getElementById("txtPath")
            .value;
        xhttp.open("POST", "./backend/back.php?accion=1", true);
        let form = new FormData();
        form.append("path", path);
        xhttp.send(form);
        xhttp.onreadystatechange = () => {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                let div = (document.getElementById("contenido"));
                let respuesta = xhttp.responseText;
                if (respuesta == "") {
                    alert("El archivo no existe!!");
                }
                else {
                    div.innerHTML = respuesta;
                }
            }
        };
    }
    Entidades.Ver = Ver;
    function VerificarPalabra() {
        let palabra = document.getElementById("txtPalabra")
            .value;
        xhttp.open("POST", "./backend/back.php?accion=2", true);
        let form = new FormData();
        form.append("path", "C:/xampp/htdocs/Programacion-III/Laboratorio III/Ejercicios AJAX/Ejercicio 2/hola.txt");
        form.append("palabra", palabra);
        xhttp.send(form);
        xhttp.onreadystatechange = () => {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                let respuesta = xhttp.responseText;
                alert(respuesta);
            }
        };
    }
    Entidades.VerificarPalabra = VerificarPalabra;
})(Entidades || (Entidades = {}));
// C:/xampp/htdocs/Programacion-III/Laboratorio III/Ejercicios AJAX/Ejercicio 2/hola.txt
//# sourceMappingURL=entidad.js.map