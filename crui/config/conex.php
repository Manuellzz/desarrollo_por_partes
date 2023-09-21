<?php
function retornarConexion(){
    $server="localhost";
    $usuario="root";
    $password="";
    $bd="papeleriabym";
    $con=mysqli_connect($server,$usuario,$password,$bd) or die("problemas");
    mysqli_set_charset($con,'utf8');
    return $con;
}
?>
