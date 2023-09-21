function regresar() {
    // Redirigir a index.php
    window.location.href = '../../index.php';
}
function regresar2() {
    // Redirigir a index.php
    window.location.href = '../index.php';
}

function regresar3() {
    // Redirigir a index.php
    window.location.href = '../../index.php';
}

/*
let contadorCampos = 1; // Inicia con el valor actual de campos generados por el PHP

function agregar_campos() {

    const contenedorCampos = document.getElementById("contenedor_campos");
    const nuevoId = "producto_" + contadorCampos;
    
    const nuevoDiv = document.createElement("div");
    nuevoDiv.setAttribute("id", nuevoId);
    
    const posicion = contadorCampos;

    nuevoDiv.innerHTML = `
        <label class="form-label">Ingrese el nombre del producto</label>
        <input type="text" id="nombre" name="nombre" onkeypress="return check(event)" id="${posicion}">
    `;

    contenedorCampos.appendChild(nuevoDiv);
    contadorCampos++;
}

document.querySelector("form").addEventListener("submit", function(event) {
    event.preventDefault(); // Evitar el envío del formulario por defecto
    eliminarCamposVacios();
});
*/

function check(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patrón de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
