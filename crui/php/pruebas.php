<?php

function retornarConexion(){
    $server="localhost";
    $usuario="root";
    $password="";
    $bd="phpmyadmin";
    $conexion=mysqli_connect($server,$usuario,$password,$bd) or die("problemas");
    mysqli_set_charset($conexion,'utf8');
    return $conexion;
}

    $conexion = retornarConexion();
    $sql = "SELECT producto.idproducto, producto.imagen, prod_nombre, precio_venta, stock, producto.descripcion, nombre, producto.estado FROM producto JOIN categoria ON producto.idcategoria = categoria.idcategoria ORDER BY prod_nombre ASC";
    echo $sql;

?>