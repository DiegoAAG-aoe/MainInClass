<?php

$ID = $_POST['txtID'];
$Nombre = $_POST['txtNombre'];
$Apellido = $_POST['txtApellido'];
$Contraseña = $_POST['txtContraseña'];
$Correo = $_POST['txtCorreo'];
$Cargo = $_POST['txtCargos'];
$Estado = $_POST['txtEstado'];

include("../../configuración/bd.php");

include_once '../../../includes/user.php';
include_once '../../../includes/user_s.php';

$userSession = new UserSession();
$user = new User();

if (isset($_SESSION['user_a'])) {
    //echo "hay sesion de administrador"; 
    $user->setUser($userSession->getCurrentUser_a());
    
    $query =    "UPDATE administrador SET Adm_Correo='".$Correo."', Adm_Contraseña='".$Contraseña."', Adm_Nombre='".$Nombre."',
                        Adm_Apellido='".$Apellido."',Adm_Estado=".$Estado.",Adm_Cargo=".$Cargo." 
                WHERE Adm_ID=".$ID;

    $result = $mysqli->query($query);

    if($result) {
        header("Location: ./Gestion_Administradores.php?res=1");
    } 
    else {
        header("Location: ./Gestion_Administradores.php?res=0");
    }
    die();

}




?>