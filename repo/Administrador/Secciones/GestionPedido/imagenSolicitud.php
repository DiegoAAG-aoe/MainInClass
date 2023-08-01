<?php
header("Content-type: image/png"); 
$bd = "reposteriakos";
$usuario = "root"; //por default tiene ese valor
$contrasenia="" ;

//$ID = $_POST['ID'];
$mysqli2 = new mysqli("localhost", $usuario, $contrasenia, $bd); 

$result2 = $mysqli2->query("SELECT Sol_Imagen FROM Solicitud where Sol_ID={$_GET['id']}");
if ($result2->num_rows > 0) {

    $row2 = $result2->fetch_assoc();
    echo $row2["Sol_Imagen"];
 
    $result2->free();
} 
?>
