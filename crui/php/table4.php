<?php
    include('crui/config/conex.php');

try {
    $conexion = retornarConexion();
    $sql = "SELECT idventa, idcliente, idusuario, tipo_comprobante, serie_comprobante, num_comprobante, fecha_hora, impuesto, total, estado FROM venta ORDER BY fecha_hora DESC";

    $result = $conexion->query($sql);

    if ($result) {
        echo '<thead><tr><th scope="col">#</th><th scope="col">tipo comprobante</th><th scope="col">serie comprobante</th><th scope="col">numero comprobante</th><th scope="col">fecha</th><th scope="col">total</th><th scope="col">estado</th><th scope=col></th><th scope="col">Acciones</th></tr></thead><tbody>';
        
        while ($row = $result->fetch_assoc()) {
            $estado = $row['estado'];
            if($estado == 0){
                echo "<tr>";
                echo '<td scope="row">'.$row['idventa']."</td>";
                echo '<td>'.$row['tipo_comprobante']."</td>";
                echo '<td>'.$row['serie_comprobante']."</td>";
                echo '<td>'.$row['num_comprobante']."</td>";
                echo '<td>'.$row['fecha_hora']."</td>";
                echo '<td>'.$row['impuesto']."</td>";
                echo '<td>'.$row['total']."</td>";
                echo '<td>'.$row['estado']."</td>";
                echo '<td>';
                echo "<form id='update_form".$row['idproducto']."' action='crui/php/update.php' method='post'>";
                echo "<input type='hidden' name='idproducto' id='idproducto' value='".$row['idproducto']."'>";
                echo "<button type='submit' class='btn btn-primary' id='idproducto'>Actualizar</button>";
                echo "</form>";
                echo "<form id='delete_form".$row['idproducto']."' action='crui/php/eliminar.php' method='post'>";
                echo "<input type='hidden' name='idproducto' id='idproducto' value='".$row['idproducto']."'>";
                echo "<button type='submit' class='btn btn-warning'>Activar</button>";
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