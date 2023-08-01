<?php 
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtApellido=(isset($_POST['txtApellido']))?$_POST['txtApellido']:"";
$txtCorreo=(isset($_POST['txtCorreo']))?$_POST['txtCorreo']:"";
$txtContraseña=(isset($_POST['txtContraseña']))?$_POST['txtContraseña']:"";
$txtCargo=(isset($_POST['txtCargo']))?$_POST['txtCargo']:"";
$txtEstado=(isset($_POST['txtEstado']))?$_POST['txtEstado']:"";
$Accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("../../configuración/bd.php"); 
include_once '../../../includes/user.php';
include_once '../../../includes/user_s.php';

$userSession = new UserSession();
$user = new User();

if (isset($_SESSION['user_a'])) {
    //echo "hay sesion de administrador"; 
    $user->setUser($userSession->getCurrentUser_a());
    $cant = mysqli_query($mysqli,"SELECT COUNT(Adm_Correo) as cantidad FROM Administrador WHERE Adm_Correo = '".$txtCorreo."' " );
    $row2 = mysqli_fetch_array($cant);
    $cantidad = $row2["cantidad"];

    if($cantidad>=1){
        header("Location: Gestion_Administradores.php?res=2");
        exit();
    }

    $sql = "INSERT INTO administrador(Adm_Correo, Adm_Contraseña, Adm_Nombre, Adm_Apellido, Adm_Estado, Adm_Cargo) 
                VALUES ('".$txtCorreo."','".$txtContraseña."','".$txtNombre."','".$txtApellido."',".$txtEstado.",'".$txtCargo."')";

    if ($Accion=='Agregar'){
        mysqli_query($mysqli, $sql);
        header("Location: Gestion_Administradores.php", TRUE, 301);
        exit();
    }
}


?>