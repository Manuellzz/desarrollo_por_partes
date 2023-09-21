<?php
    include('../config/conex.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Conexion a la base de datos
    $conexion = retornarConexion();
    $sql = "SELECT email, password FROM usuario WHERE email = '$email' and password = '$password'";
    $resultado = mysqli_query($conexion, $sql);

    $filas = mysqli_num_rows($resultado);

    // Redireccion
    if($filas > 0){
        header("location:../../index.php");
    } else {
        header("location:../../usuario/logine.php");
    }

    mysqli_free_result($resultado);
    mysqli_close($conexion);
?>

