let idproducto = document.getElementById('idproducto').value;

document.getElementById("update_form"+idproducto).addEventListener("submit", function(event) {
    event.preventDefault();

    if (confirm("¿Estás seguro de actualizar el producto?")) {
        fetch('php/update.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                prod_nombre: document.getElementById('prod_nombre').value,
                precio_venta: document.getElementById('precio_venta').value,
                stock: document.getElementById('stock').value
            })
        })
        .then(response => response.text())
        .then(result => {
            alert(result);
        })
        .catch(error => console.error(error));
    }
});
