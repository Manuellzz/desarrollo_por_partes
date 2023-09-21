<?php
    include('../config/conex.php');

    $conexion = retornarConexion();

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $checkQuery = "SELECT COUNT(*) FROM categoria WHERE nombre = ?";
    $stmt = $conexion->prepare($checkQuery);
    $stmt->bind_param("s", $nombre);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        echo "ERROR: Ya existe una categoría con el mismo nombre";
    } else {
        $nombre = $conexion->real_escape_string($nombre);
        $descripcion = $conexion->real_escape_string($descripcion);

        $sql = "INSERT INTO categoria(nombre, descripcion, estado) VALUES  ('$nombre', '$descripcion', 1)";

        if ($conexion->query($sql) === true) {
            echo "Categoría creada correctamente";
            
        } else {
            echo "Error al crear la categoría ";
        }
    }
    $conexion->close();
?>
