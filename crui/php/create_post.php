<?php
    include('../config/conex.php');

    $conexion = retornarConexion();

    $categoria = $_POST['categoria'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $descripcion = $_POST['descripcion'];
    $imagen = $_POST['imagen'];

    $checkQuery = "SELECT COUNT(*) FROM producto WHERE prod_nombre = ?";
    $stmt = $conexion->prepare($checkQuery);
    $stmt->bind_param("s", $nombre);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        echo "Ya existe un producto con el mismo nombre";
    } else {

        $categoria = $conexion->real_escape_string($categoria);
        $nombre = $conexion->real_escape_string($nombre);
        $precio = $conexion->real_escape_string($precio);
        $cantidad = $conexion->real_escape_string($cantidad);
        $descripcion = $conexion->real_escape_string($descripcion);
        $imagen = $conexion->real_escape_string($imagen);

        $sql = "INSERT INTO producto(idcategoria, prod_nombre, precio_venta, stock, descripcion, imagen, fecha_sys, estado) VALUES ('$categoria', '$nombre', '$precio', '$cantidad', '$descripcion', '$imagen', now(), 1)";

        if ($conexion->query($sql) === true) {
            echo "Producto guardado correctamente";
        } else {
            echo "Error al guardar el producto: ";
        }
    }
    $conexion->close();
?>
