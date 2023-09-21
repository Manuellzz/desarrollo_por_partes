//Codigo para enviar la informacion del formulario con post a la base de datos a traves del categoria.php
document.getElementById("crui_form").addEventListener("submit", function(event) {
    event.preventDefault();

    let nombre = document.getElementById("nombre").value;
    let descripcion = document.getElementById("descripcion").value;

    nombre = nombre.toUpperCase();

    console.log(nombre);
    fetch('php/categoria.php', {
        method: 'POST',
        headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `nombre=${nombre}&descripcion=${descripcion}`
    })
    .then(response => response.text())
    .then(result => {
        alert(result);
        document.getElementById("crui_form").reset();
    })
    .catch(error => console.error(error));
});
