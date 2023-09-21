<?php
// se conecta a la base de datos.
include('../config/conex.php');
$conexion = retornarConexion();

//se recolectan los datos de productos, de la base de datos.
$sql = "SELECT prod_nombre, idproducto, precio_venta FROM producto WHERE 1";

//se envia la peticion a la base de datos.
$resultado = $conexion->query($sql);

//se crea un array vacio para guardar los productos.
$producto = array();


$i = 0;
//se recorre los productos adquiridos y se llena el array con estos.
foreach($resultado as $row){
$producto[$i] = $row['prod_nombre'];
$i++;
}

$cantidad_productos = count($producto);
//se inicia nuevamente la variable $i para su uso posterior.
$i = 0;

//permite determinar cuantas letras se estan comparando;
$control = 1;
if($_POST){
    $comparar1 = $_POST['valor'];
    //se determina cuantas letras se han ingresado.
    $letras = strlen($comparar1);

    //se pasan las variables a minuscula para poder compararlas sin problema.
    $comparar1 = strtolower($comparar1);
//aca se guardan cuantos productos son iguales a los ingresados
      $cantidad_iguales = 0;
    for($j=0; $j<$cantidad_productos; $j++){
        $producto2[$j] = strtolower(substr($producto[$j], 0, $letras));
        if($comparar1 == $producto2[$j]){
            $coincidencias[] = array(
                'id' => $resultado[$j]['idproducto'],
                'prod_nombre' => $resultado[$j]['prod_nombre'],
                'precio_venta' => $resultado[$j]['precio_venta']
            );
           $cantidad_iguales++;
       }
    }
}

if (isset($coincidencias)) {
    echo json_encode($coincidencias);
} else {
    echo json_encode(array()); // Retorna un array vacío en caso de no haber coincidencias
}


?>