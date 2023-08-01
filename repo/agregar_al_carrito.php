<?php
include_once "funciones.php";
include_once 'includes/user.php';
include_once 'includes/user_s.php';
include_once 'includes/db.php';

$userSession = new UserSession();
$user = new User();

if (isset($_SESSION['user_c'])) {
    //echo "hay sesion de consumidor"; 
    $user->setUser_c($userSession->getCurrentUser_c());
    //echo $_SESSION['user_c'];
    $sesion = $_SESSION['user_c'];
    $archivo = NULL;
    if (!isset($_POST["Pro_ID"])) {
        exit("No hay Pro_ID");
    }else if($_POST["Pro_Tipo"]==0){


        //$archivo = $_FILES['txtImagen']['name'];
        if (isset($archivo) && $archivo != "") {
            //Obtenemos algunos datos necesarios sobre el archivo
            $image = $_FILES['txtImagen']['tmp_name'];
            $tipo_archivo = $_FILES['txtImagen']['type'];
            $tamano_archivo = $_FILES['txtImagen']['size'];
            //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
            if (!(strpos($tipo_archivo, "png") || !strpos($tipo_archivo, "jpg"))) {
                header("Location: Catalogo.php?res=3");
                echo "****************";
            }
            if ($tamano_archivo > 850000) {
                header("Location: Catalogo.php?res=4"); 
                echo "****************"; 
            }else {
                //Si la imagen es correcta en tamaño y tipo
                //Se intenta subir al servidor
                
                if (move_uploaded_file($image, 'Administrador/Secciones/GestionPedido/imagessol/'.$archivo)) {
                    //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                    chmod('Administrador/Secciones/GestionPedido/imagessol/'.$archivo, 0777);
                    //Mostramos el mensaje de que se ha subido co éxito
                    echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                    //Mostramos la imagen subida
                    //echo '<p><img src="images/'.$archivo.'"></p>';
                }
                else {
                //Si no se ha podido subir la imagen, mostramos un mensaje de error
                echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                }
            }
            
        }

        if($_POST["Pro_Cat"]==1){
            $Mensaje = 'Color: ' . $_POST["txtColorTorta"] . '/Relleno:' . $_POST["txtRelleno"] . '/Sabor:' . $_POST["txtSabor"] . '/Decoracion:' . $_POST["txtDecoracion"].'/Mensaje:'.$_POST["txtMensaje"];
            //echo $Mensaje;
        }else{
            $Mensaje = 'Color crema: ' . $_POST["txtColorCrema"] . '/Relleno:' . $_POST["txtRelleno"] . '/Sabor:' . $_POST["txtSabor"] . '/Decoracion:' . $_POST["txtDecoracion"].'/Mensaje:'.$_POST["txtMensaje"];
            //echo $Mensaje;
        }
    }else{
        $Mensaje = $_POST["txtMensaje"];
    }
    //echo $image;
    agregarProductoSolicitud($_POST["Pro_ID"], $Mensaje, $sesion, $archivo);
    header("Location: Catalogo.php?res=1");
}else{

    header("Location: Catalogo.php?res=0");
}
?>