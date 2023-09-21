<?php
include('../config/conex.php');
$idproducto = $_POST['idproducto'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];
$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];
$descripcion = $_POST['descripcion'];
$imagen = $_POST['imagen'];
try {
    $conexion = retornarConexion();

    // Obtener la categoría por su id
    $sql = "SELECT idcategoria, nombre, descripcion, estado FROM categoria WHERE idcategoria = $categoria";
    $result_categoria = $conexion->query($sql);

    if ($result_categoria) {
        // Verificar si se encontró una categoría con el id proporcionado
        if ($row_categoria = $result_categoria->fetch_assoc()) {
            $categoria_1 = $row_categoria['nombre'];
            //echo $categoria_1;
        } else {
            echo "Categoría no encontrada";
        }
        // Obtener el producto por su id
        $sql2 = "SELECT producto.fecha_sys, producto.idproducto, producto.imagen, prod_nombre, precio_venta, stock, producto.descripcion, nombre, producto.estado 
        FROM producto 
        JOIN categoria ON producto.idcategoria = categoria.idcategoria 
        WHERE producto.idproducto = $idproducto
        ORDER BY prod_nombre ASC;";
        
        $result_producto = $conexion->query($sql2);

        if ($result_producto) {
            // Verificar si se encontró un producto con el id proporcionado
            if ($row = $result_producto->fetch_assoc()) {
                $array = array(
                    $fecha_creacion = $row['fecha_sys'],
                    
                    $row['idcategoria'],
                    $row['prod_nombre'],
                    $row['precio_venta'],
                    $row['stock'],
                    $row['descripcion'],
                    $row['nombre'],
                    $row['estado'],
                    $row['idproducto']
                );

                $sql3 = "UPDATE producto SET idproducto ='$idproducto',idcategoria ='$categoria',prod_nombre='$nombre',precio_venta='$precio',stock='$cantidad',descripcion='$descripcion',imagen='$imagen',fecha_sys='$fecha_creacion',fecha_act=now(),estado='1' WHERE idproducto='$idproducto'";
                
                $result2 = $conexion->query($sql3);

                if ($result2) {
                    header("Location: ../../index.php");
                exit(); 
                }else{
                    echo"ERROR AL ACTUALIZAR";
                }
    
            } else {
                echo "Producto no encontrado";
            }
        } else {
            echo "Producto no encontrado";
        }
    } else {
        echo "Error al obtener la categoría";
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

$conexion->close();
?>
