<?php

$ID = $_POST['txtID'];
$Nombre = $_POST['txtNombre'];
$Estado = $_POST['txtEstado'];

include("../../configuración/bd.php");

include_once '../../../includes/user.php';
include_once '../../../includes/user_s.php';

$userSession = new UserSession();
$user = new User();


if (isset($_SESSION['user_g']) || isset($_SESSION['user_a'])) {
    //echo "hay sesion de administrador"; 
    if (isset($_SESSION['user_g'])) {
        $user->setUser($userSession->getCurrentUser_g());
    } else if (isset($_SESSION['user_a'])) {
        $user->setUser($userSession->getCurrentUser_a());
    }
    $query =    "UPDATE Cargo SET Car_Nombre='".$Nombre."', Car_Estado=".$Estado." 
                WHERE Car_ID =".$ID;

    $result = $mysqli->query($query);

    if($result) {
        header("Location: ./Mantencion_Cargo.php?res=1");
    } 
    else {
        header("Location: ./Mantencion_Cargo.php?res=0");
    }
    die();

}




?>