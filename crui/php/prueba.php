<?php 
include ('../../crui/config/conex.php');

$conexion = mysqli_connect("localhost", "root", "", "papeleriabym");

$busqueda = $_POST["busqueda"];

$sql = "SELECT * FROM producto WHERE prod_nombre LIKE '%".$busqueda."%'";

$consulta = mysqli_query($conexion,$sql);
  echo '<select class="producto">';
if (mysqli_num_rows($consulta) > 0) {
    // Itera a través de los datos y crea las opciones del select
  
    while ($producto = mysqli_fetch_array($consulta)) {
        echo "<option value = ".$producto["idproducto"].">";
        $salida = $producto["prod_nombre"]. "-" .$producto["precio_venta"]."  <br>";
        echo $salida; 
        echo "</option>";
    }
} else {

    // Si no hay datos, muestra la opción "No hay datos en la base de datos"
    echo '<option value="-1">No hay datos en la base de datos</option>';
}
echo '</select>';
?>