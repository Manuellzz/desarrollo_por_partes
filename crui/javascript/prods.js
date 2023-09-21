
//Codigo para enviar la informacion del formulario con post a la base de datos a traves del create_post.php
    document.getElementById("register-form").addEventListener("submit", function(event) {
    event.preventDefault();

    let categoria = document.getElementById("categoria").value;
    let nombre = document.getElementById("nombre").value;
    let precio = document.getElementById("precio").value;
    let cantidad = document.getElementById("cantidad").value;
    let descripcion = document.getElementById("descripcion").value;
    let imagen = document.getElementById("imagen").value;

    nombre = nombre.toUpperCase();
    imagen = imagen.slice(12);

    fetch('crui/php/create_post.php', {
        method: 'POST',
        headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `categoria=${categoria}&nombre=${nombre}&precio=${precio}&cantidad=${cantidad}&descripcion=${descripcion}&imagen=${imagen}`
    })
    .then(response => response.text())
    .then(result => {
        alert(result);
        document.getElementById("register-form").reset();
    })
    .catch(error => console.error(error));
});
