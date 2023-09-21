<?php
    include('../config/conex.php');
$idproducto = $_POST['idproducto'];

try {
    $conexion = retornarConexion();
    $sql = "SELECT idproducto, idcategoria, prod_nombre, id_localizacion, precio_venta, stock, descripcion, imagen, fecha_sys, fecha_act, estado FROM producto WHERE idproducto = $idproducto";

    $result = $conexion->query($sql);
    
    if ($result) {

        while ($row = $result->fetch_assoc()) {
            //se captura el valor idproducto para compararlo con las id ya presentes.
            $var = $row['idproducto'];
            
            //se verifica cada id con las id ya presentes.
            if($idproducto == $var){
                
                //al capturar las id se captura los valores restantes por medio de $row.
                $array = array(
                    $row['idproducto'],
                    $row['idcategoria'],
                    $row['prod_nombre'],
                    $row['id_localizacion'],
                    $row['precio_venta'],
                    $row['stock'],
                    $row['descripcion'],
                    $row['imagen'],
                    $row['fecha_sys'],
                    $row['fecha_act'],
                    $row['estado']
                );
                
                $sql2 = "UPDATE producto SET idproducto ='{$row['idproducto']}', idcategoria='{$row['idcategoria']}', prod_nombre='{$row['prod_nombre']}', id_localizacion='{$row['id_localizacion']}', precio_venta='{$row['precio_venta']}', stock='{$row['stock']}', descripcion='{$row['descripcion']}', imagen='{$row['imagen']}', fecha_sys='{$row['fecha_sys']}', fecha_act='{$row['fecha_act']}', estado=0 WHERE idproducto = $var";
                echo $sql2;
                
                $result2 = $conexion->query($sql2);
    
                    if ($result2) {
                        header("Location: ../../index.php");
                            exit(); 

                        }else{
                            echo "NO SE PUDO ELIMINAR";
                        }
                        
        }
    }
    } 

    $result->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

$conexion->close();

?>
