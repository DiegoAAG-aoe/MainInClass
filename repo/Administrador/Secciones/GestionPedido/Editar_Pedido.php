<?php

include_once '../../../includes/user.php';
include_once '../../../includes/user_s.php';

$userSession = new UserSession();
$user = new User();

if (isset($_SESSION['user_a'])) {
    //echo "hay sesion de administrador"; 
    $user->setUser($userSession->getCurrentUser_a());
    $Pedido = $_POST['nopedido'];
    $Estado = $_POST['txtEstados'];
    $Respuesta = $_POST['txtRespuesta'];
    $CorreoCon = $_POST['CorreoCon'];

    include("../../configuración/bd.php");
    $query =  "SELECT Est_ID FROM estado WHERE Est_Nombre='".$Estado."'";

    $result = $mysqli->query($query);

    if ($row = $result->fetch_assoc()) {
        $EstadoCod = $row["Est_ID"];
    }

    $query =    "UPDATE pedido SET Ped_Respuesta='".$Respuesta."', Ped_Estado=".$EstadoCod." 
                WHERE Ped_ID =".$Pedido;


    $result = $mysqli->query($query);

    $titulo = "Cambio de Estado de tu Solicitud";
    $tucorreo = "From: repo.test7890@gmail.com";

    if(mail($CorreoCon,$titulo,$Respuesta,$tucorreo)){
        echo 'Correo Enviado';
    }
    else{
        echo 'Error';
    }


    if($result) {
        header("Location: ./Gestion_Pedidos.php?res=1");
    } 
    else {
        header("Location: ./Gestion_Pedidos.php?res=0");
    }
    die();
}

?>