<?php

include('crui/config/conex.php');

try {
    $conexion = retornarConexion();
    $sql = "SELECT producto.idproducto, producto.imagen, prod_nombre, precio_venta, stock, producto.descripcion, nombre, producto.estado FROM producto JOIN categoria ON producto.idcategoria = categoria.idcategoria ORDER BY prod_nombre ASC";
 
    $result = $conexion->query($sql);

    if ($result) {
        
        echo '<thead><tr><th scope="col">#</th><th scope="col">Nombre</th><th scope="col">Precio de venta</th><th scope="col">Stock</th><th scope="col">Descripción</th><th scope="col">Categoría</th><th scope=col>Estado</th><th scope="col">Acciones</th></tr></thead><tbody>';
        
        while ($row = $result->fetch_assoc()) {

            $estado = $row['estado'];
            if($estado == 1){
                echo "<tr>";
                echo '<td scope="row">'.$row['idproducto']."</td>";
                echo '<td>'.$row['prod_nombre']."</td>";
                echo '<td>'.$row['precio_venta']."</td>";
                echo '<td>'.$row['stock']."</td>";
                echo '<td>'.$row['descripcion']."</td>";
                echo '<td>'.$row['nombre']."</td>";
                echo '<td>'.$row['estado']."</td>";
                echo '<td>';
                echo "<form id='update_form".$row['idproducto']."' action='crui/php/update.php' method='post'>";
                echo "<input type='hidden' name='idproducto' id='idproducto' value='".$row['idproducto']."'>";
                echo "<button type='submit' class='btn btn-primary' id='idproducto'>Actualizar</button>";
                echo "</form>";
                echo "<form id='delete_form".$row['idproducto']."' action='crui/php/eliminar.php' method='post'>";
                echo "<input type='hidden' name='idproducto' id='idproducto' value='".$row['idproducto']."'>";
                echo "<button type='submit' class='btn btn-warning'>Inabilitar</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        }
        echo "</tbody>";
    } 

    $result->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

$conexion->close();

?>