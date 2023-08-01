<?php

$image = $_FILES['txtImagen']['tmp_name'];
$tipo_archivo = $_FILES['txtImagen']['type'];
$tamano_archivo = $_FILES['txtImagen']['size'];
      	
if(!empty($image)){
    $imgContent = addslashes(file_get_contents($image));
    if (!(strpos($tipo_archivo, "png") || !strpos($tipo_archivo, "jpeg"))) {
        header("Location: ./Gestion_Productos.php?res=2");
        //header("Location: ./Gestion_Productos.php");
    }
    if ($tamano_archivo > 850000) {
        header("Location: ./Gestion_Productos.php?res=3");
        //header("Location: ./Gestion_Productos.php");
    }
}

$Producto =$_POST["txtID"];
$txtTitulo = $_POST['txtTitulo'];
$txtPrecio = $_POST['txtPrecio'];
$txtDescripcion = $_POST['txtDescripcion'];
$txtCategoria=$_POST['txtCategorias'];
$txtEstado=$_POST['txtEstado'];

include("../../configuración/bd.php");
include_once '../../../includes/user.php';
include_once '../../../includes/user_s.php';

$userSession = new UserSession();
$user = new User();

if (isset($_SESSION['user_g'])) {
    //echo "hay sesion de administrador"; 
    $user->setUser($userSession->getCurrentUser_g());
    
    if(!empty($image)){
        $query =   "UPDATE producto SET Pro_Nombre='".$txtTitulo."',Pro_Descripcion='".$txtDescripcion."',
                                Pro_Categoria=".$txtCategoria.", Pro_Estado=".$txtEstado.",
                                    Pro_Precio=".$txtPrecio.", Pro_Imagen= '".$imgContent."'  
                WHERE Pro_ID=".$Producto;
    }
    else{
        $query =   "UPDATE producto SET Pro_Nombre='".$txtTitulo."',Pro_Descripcion='".$txtDescripcion."',
                        Pro_Categoria=".$txtCategoria.", Pro_Estado=".$txtEstado.",
                        Pro_Precio=".$txtPrecio."  
        WHERE Pro_ID=".$Producto;
    }

            
    $result = $mysqli->query($query);	
    if($result) {

        header("Location: ./Gestion_Productos.php?res=1");
        //header("Location: ./Gestion_Productos.php");
    } 
    else {
        header("Location: ./Gestion_Productos.php?res=0");
        //header("Location: ./Gestion_Productos.php");
    }

    die();

}



?>