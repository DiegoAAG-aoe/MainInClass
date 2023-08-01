<?php

$txtTitulo=(isset($_POST['txtTitulo']))?$_POST['txtTitulo']:"";
$txtPrecio=(isset($_POST['txtPrecio']))?$_POST['txtPrecio']:"";
$txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";
$txtCategoria=(isset($_POST['txtCategorias']))?$_POST['txtCategorias']:"";
$txtEstado=(isset($_POST['txtEstado']))?$_POST['txtEstado']:"";
$image=(isset($_FILES['txtImagen']['tmp_name']))?$_FILES['txtImagen']['tmp_name']:"";
$tipo_archivo=(isset($_FILES['txtImagen']['type']))?$_FILES['txtImagen']['type']:"";
$tamano_archivo=(isset($_FILES['txtImagen']['size']))?$_FILES['txtImagen']['size']:"";
if(isset($_POST[$txtTitulo])&&isset($_POST[$txtCategoria])&&isset($_POST[$txtPrecio])&&isset($_POST[$txtDescripcion])&&isset($_POST[$txtEstado])){
    if(!empty($image)){
        $imgContent = addslashes(file_get_contents($image));
        if (!(strpos($tipo_archivo, "png") || !strpos($tipo_archivo, "jpeg"))) {
            header("Location: ./Gestion_Productos.php?res=2");
        }
        if ($tamano_archivo > 850000) {
            header("Location: ./Gestion_Productos.php?res=3");  
        }
    }
    
    include("../../configuración/bd.php"); 
    include_once '../../../includes/user.php';
    include_once '../../../includes/user_s.php';

    $userSession = new UserSession();
    $user = new User();

    if (isset($_SESSION['user_g'])) {
        //echo "hay sesion de administrador"; 
        $user->setUser($userSession->getCurrentUser_g());
        
    if(!empty($image)){
            $query =   "INSERT INTO producto (Pro_Nombre, Pro_Descripcion, Pro_Categoria, Pro_Estado,  Pro_Tipo, Pro_Precio, Pro_Imagen) 
            VALUES ('".$txtTitulo."', '".$txtDescripcion."', ".$txtCategoria.", ".$txtEstado.", 1, ".$txtPrecio.", '".$imgContent."')";
        }
        else{
            $query =   "INSERT INTO producto (Pro_Nombre, Pro_Descripcion, Pro_Categoria, Pro_Estado,  Pro_Tipo, Pro_Precio) 
            VALUES ('".$txtTitulo."', '".$txtDescripcion."', ".$txtCategoria.", ".$txtEstado.", 1, ".$txtPrecio.")";
        }
        
                
        $result = $mysqli->query($query);	
        if($result) {
        
            header("Location: ./Gestion_Productos.php?res=1");
        
        } 
        else {
            header("Location: ./Gestion_Productos.php?res=0");
        
        }
        
    }
    else{
        header("Location: ./Agregar_Productos.php?res=4");
    }

    }
    
    

?>