<?php
include('../config/conex.php');
$conexion = retornarConexion();
$var_c = 0;
$control = 0;
$var_contar = 0;
$sql2 = "SELECT COUNT(*) as total_registros FROM venta WHERE 1";

// Ejecutar la consulta
$resultado2 = mysqli_query($conexion, $sql2);

// Verificar si la consulta se realizó correctamente
if ($resultado2) {
    // Obtener el resultado como un arreglo asociativo
    $fila = mysqli_fetch_assoc($resultado2);

    // Obtener el total de registros
    $total_registros = $fila['total_registros'];

}


$var_num_comprobante = $total_registros+1;
$var_num_comprobante = str_pad($var_num_comprobante, 3, "0", STR_PAD_LEFT);

$sql3 = "SELECT idventa, idcliente, idusuario, tipo_comprobante, serie_comprobante, num_comprobante, fecha_hora, impuesto, total, estado FROM venta WHERE 1";
$resultado3 = $conexion->query($sql3);

if ($resultado3) {
    // Suponiendo que tienes una sola fila de resultado, puedes usar fetch_assoc para obtener los valores de las columnas
    $row = $resultado3->fetch_assoc();
    
    // Ahora puedes acceder a los valores de las columnas de la tabla 'venta'
    $idcliente = $row['idcliente'];
    $idusuario = $row['idusuario'];
    $tipo_comprobante = $row['tipo_comprobante'];
    $serie_comprobante = $row['serie_comprobante'];
    $num_comprobante = $var_num_comprobante;
    
} else {
    // Manejo de error si la consulta falla
    echo "Error en la consulta: " . $conexion->error;
}

if (isset($_POST['submit_registro_venta'])) {
    // Obtener los datos del formulario
    $nombres_productos = $_POST['nombre_p'];
    $valores_productos = $_POST['valor_p'];
    $valores_impuesto1 = $_POST['impuesto_p'];

    // Crear un arreglo asociativo para almacenar los productos y sus valores
    $productos = array();

    // Recorrer los arreglos y almacenar los productos y sus valores en el arreglo asociativo
    for ($i = 0; $i < count($nombres_productos); $i++) {
        $nombre = $nombres_productos[$i];
        $valor = $valores_productos[$i];
        $productos[$nombre] = $valor;
    }
    print_r($nombres_productos);
    $valores_impuesto = $valores_impuesto1/100;
    $valor_t = 0;
    $cont_1 = 0;
    $cont_2 = 0;

    

    if (is_array($nombres_productos) && is_array($valores_productos)) {
        $cantidad = count($nombres_productos);

        foreach ($nombres_productos as $nombre) {
            $array_prod[$cont_1] = $nombre;
            $cont_1++;
        }
        foreach ($valores_productos as $valor) {
            $array_valor[$cont_2] = $valor;
            $cont_2++;
        }
    } else {
        $cantidad = 0;
    }


    $sql = "SELECT producto.idproducto, producto.imagen, prod_nombre, precio_venta, stock, producto.descripcion, nombre, producto.estado FROM producto JOIN categoria ON producto.idcategoria = categoria.idcategoria ORDER BY prod_nombre ASC";
    
    $result = $conexion->query($sql);
    
        for($i = 0; $i < count( $array_prod); $i++){
    
    if ($result) {
        $result->data_seek(0);
                
            while ($row = $result->fetch_assoc()) {
                //se convierte los dos valores a minuscula para evitar problemas al comparar.
                $var = $row['prod_nombre'];
                $var = strtolower($var);
                $array_prod[$i] = strtolower( $array_prod[$i]);
                //se verifica hasta encontrar el nombre del producto del arreglo es igual al producto dentro de la base de datos.
                if( $array_prod[$i] == $var){
                    
                    $array_productos[$control] = array( $array_prod[$i]);
                    $control++;
                    $stock = $row['stock'];
                    //$stock = $stock-1;
                    if($stock<0){
                        $intentarVenderMas = true;
                        if ($intentarVenderMas) {
                            $mensajeAlerta = 'Se han intentado vender más productos de los que hay en el stock del producto// '.$nombres_productos[$i];
                            header('Location: ../vender.php?mensaje=' . urlencode($mensajeAlerta));
                            exit;
                        }
                    }else{
                        $sql5 = "UPDATE producto SET stock = $stock WHERE prod_nombre = ' $array_prod[$i]'";
                        $result5 = $conexion->query($sql5);
                        
                    }
                    
                    
                    
                }
            }
        }
        }

        $array_valores = array();
        $array_nombres = array(); // Inicializar como un array vacío

        // Obtener nombres únicos usando array_unique() y array_column()
        $array_valores_unicos = array_unique($array_valor);
        $array_nombres_unicos = array_unique(array_column($array_productos, 0));

        $c1 = count($array_nombres_unicos);
        $var_contar_rep = count($array_nombres_unicos);
        $array_columna = array_column($array_productos, 0);       
        for ($i = 0; $i<$c1; $i++) {
            $array_repeticiones[$i] = 0;
        }
        $var_contar_rep = 0;
        $array_unicos_consecutivos = array_values($array_nombres_unicos);

        for($j=0; $j<count($array_repeticiones); $j++){
              $array_nombres_unicos_2 = strtolower($array_unicos_consecutivos[$var_contar_rep]);
            for ($i=0; $i<count($nombres_productos); $i++) {
                
              
                $nombres_productos_2 = strtolower($array_columna[$i]);
               

                     if ($nombres_productos_2 == $array_nombres_unicos_2) {
                        $array_repeticiones[$j]++;
            }
            
        }
        $var_contar_rep++;  
        }
        
        $array_unicos_consecutivos = array_values($array_valores_unicos);

        echo '<h2>Productos registrados:</h2>';
$impuesto_total = 0;
$valor_T = 0;
    for($i=0; $i<count($array_repeticiones); $i++){
        $valor_t1 = $array_repeticiones[$i]*$array_unicos_consecutivos[$i];

        $valores_impuesto2 = $valores_impuesto*$valor_t1;
    
        $valor_t = $valores_impuesto2+$valor_t1;

        $sql4 = "INSERT INTO venta(idventa, idcliente, idusuario, Nombre producto, tipo_comprobante, serie_comprobante, num_comprobante, fecha_hora, impuesto, cantidad, total, estado) VALUES ('','$idcliente','$idusuario','$array_unicos_consecutivos[$i]','$tipo_comprobante','$serie_comprobante','$var_num_comprobante',now(),'$valores_impuesto2','$array_repeticiones[$i]','$valor_t','1')";

        //$result4 = $conexion->query($sql4);
        echo '<p>Nombre del producto: ' . htmlspecialchars($array_unicos_consecutivos[$i]) . '</p>';
        echo '<p>Valor del producto: ' . htmlspecialchars($array_unicos_consecutivos[$i]) . '</p>';
        echo '<p>Valor total por el producto: ' . htmlspecialchars($valor_t) . '</p>';
        echo '<p>Cantidad del producto: ' . htmlspecialchars($array_repeticiones[$i]) . '</p>';
        echo '<p>El impuesto al producto fue : ' . htmlspecialchars($valores_impuesto2) . '</p>';
        echo '<hr>';
        $impuesto_total = $impuesto_total+$valores_impuesto2;
        $valor_T = $valor_T+$valor_t;
        
    }

    echo '<p>El de impuesto aplicado fue : ' . htmlspecialchars($impuesto_total). '</p>';

    echo '<p>El total de todos los productos fue : ' . htmlspecialchars($valor_T) . '</p>';

    
    

} else {
    // Si alguien intenta acceder directamente a este archivo sin enviar el formulario,
    // redirecciona a vender.php o muestra algún mensaje de error.
    header('Location: ../vender.php');
    exit();
}
?>
