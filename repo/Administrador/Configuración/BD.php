<?php
$bd = "reposteriakos";
$usuario = "root"; //por default tiene ese valor
$contrasenia="" ;

try {
    $mysqli = new mysqli("localhost", $usuario, $contrasenia, $bd); 
} catch (Exception $ex) {
   echo $ex >getMessage();
}
?>

