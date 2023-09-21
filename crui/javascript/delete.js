let idproducto = document.getElementById('idproducto').value;

document.getElementById("delete_form" + idproducto).addEventListener("submit", function(event) {

        if (confirm("¿Estás seguro de eliminar el producto?")) {
            fetch('php/delete.php', {
                method: 'POST',
                headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `idproducto=${idproducto}`
            })
            .then(response => response.text())
            .then(result => {
                alert(result);
            })
            .catch(error => console.error(error));
        }
        
});
