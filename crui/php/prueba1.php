<?php 
$conexion = mysqli_connect("localhost", "root", "", "sistema");

$busqueda = $_POST["busqueda"];

$sql = "SELECT * FROM alumnos
		WHERE nombre LIKE '%$busqueda%'";

$consulta = mysqli_query($conexion,$sql);

$salida = "";

while ($alumno = mysqli_fetch_array($consulta)) {
	$salida .= "- ".$alumno["nombre"]."<br>";
}

echo $salida;
?>