<?php
    
    include('crui/config/conex.php');

    $conexion = retornarConexion();
    $sql = "SELECT idcategoria, nombre FROM categoria";

try {
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        echo "<option value='-1'>Seleccione una categoria</option>";
        while ($row = $result->fetch_assoc()) {
            $idcategoria = $row['idcategoria'];
            $nombre = $row['nombre'];
            if($idcategoria != null or $nombre != null){
                echo "<option value='$idcategoria'>$nombre</option>";
            }
            
        }

    } else {
        echo "No se encontraron categorías.";
    }

    $result->close();
} catch (Exception $e) {
    echo "Error en la consulta: " . $e->getMessage();
}

$conexion->close();
?>