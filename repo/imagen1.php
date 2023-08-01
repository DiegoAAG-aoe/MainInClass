<?php
header("Content-type: image/png"); 
$bd = "reposteriakos";
$usuario = "root"; //por default tiene ese valor
$contrasenia="" ;

//$ID = $_POST['ID'];
$mysqli2 = new mysqli("localhost", $usuario, $contrasenia, $bd); 

$result2 = $mysqli2->query("SELECT pro_imagen FROM producto where Pro_ID={$_GET['id']}");
if ($result2->num_rows > 0) {

    $row2 = $result2->fetch_assoc();
    echo $row2["pro_imagen"];
 
    $result2->free();
} 
?>
