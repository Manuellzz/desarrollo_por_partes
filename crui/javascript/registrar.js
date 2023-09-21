
//Codigo para enviar la informacion del formulario con post a la base de datos a traves del create_post.php
document.getElementById("registrar-usuario").addEventListener("submit", function(event) {
    event.preventDefault();

    let nombre = document.getElementById("nombre").value;
    let tipo_documento = document.getElementById("tipo_documento").value;
    let num_documento = document.getElementById("num_documento").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    fetch('../crui/php/registrar_usuario.php', {
        method: 'POST',
        headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `nombre=${nombre}&tipo_documento=${tipo_documento}&num_documento=${num_documento}&email=${email}&password=${password}`
    })
    .then(response => response.text())
    .then(result => {
        alert(result);
        document.getElementById("registrar-usuario").reset();
    })
    .catch(error => console.error(error));
});
