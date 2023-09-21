<?php
    include('../config/conex.php');

    $conexion = retornarConexion();

    // Datos para la inserción en la tabla "usuario"
    $nombre = $_POST['nombre'];
    $tipo_documento = $_POST['tipo_documento'];
    $num_documento = $_POST['num_documento'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $checkQuery = "SELECT COUNT(*) FROM usuario WHERE num_documento = ?";
    $stmt = $conexion->prepare($checkQuery);
    $stmt->bind_param("s", $num_documento);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    $checkQuerys = "SELECT COUNT(*) FROM usuario WHERE email = ?";
    $stmt = $conexion->prepare($checkQuerys);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($counts);
    $stmt->fetch();
    $stmt->close();

    if ($counts > 0) {
        echo "Ya existe un usuario con el mismo correo";
    } else if ($count > 0) {
        echo "Ya existe un usuario con el mismo documento";
    } else{

        $nombre = $conexion->real_escape_string($nombre);
        $tipo_documento = $conexion->real_escape_string($tipo_documento);
        $num_documento = $conexion->real_escape_string($num_documento);
        $email = $conexion->real_escape_string($email);
        $password = $conexion->real_escape_string($password);

        // Sentencia SQL para insertar en la tabla "usuario"
        $sql = "INSERT INTO usuario(idrol, nombre, tipo_documento, num_documento, email, password, estado) VALUES (4, '$nombre', '$tipo_documento', '$num_documento', '$email', '$password', 1)";

        if ($conexion->query($sql) === true) {
            echo "Usuario registrado";
        } else {
            echo "Usuario eixstente ";
        }
    }
    $conexion->close();

?>
