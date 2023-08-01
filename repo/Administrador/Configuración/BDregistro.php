<?php
    $servidor = "localhost";
    $usuario = "root";
    $contrasenia = "";
    $bd = "reposteriakos";

    $conexion = new mysqli($servidor, $usuario, $contrasenia, $bd);

    if($conexion->connect_error){
        die("Conexión fallida: " . $conexion->connect_error);
    }
?>

