<?php
$archivo = $_FILES['txtImagen']['name'];
$image = $_FILES['txtImagen']['tmp_name'];
$tipo_archivo = $_FILES['txtImagen']['type'];
$tamano_archivo = $_FILES['txtImagen']['size'];
$Pedido =htmlspecialchars($_GET["pedido"]);
      	
if(!empty($image)){
    //$imgContent = addslashes(file_get_contents($image));
    if (!(strpos($tipo_archivo, "png") || !strpos($tipo_archivo, "jpeg"))) {
        header("Location: ./Mis_Pedidos.php?res=2");
        //header("Location: ./Gestion_Productos.php");
    }
    if ($tamano_archivo > 850000) {
        header("Location: ./Mis_Pedidos.php?res=3");
        //header("Location: ./Gestion_Productos.php");
    }
}

if (move_uploaded_file($image, 'Administrador/Secciones/GestionPedido/Img_Comprobante/'.$archivo)) {
    chmod('Administrador/Secciones/GestionPedido/Img_Comprobante/'.$archivo, 0777);
}


include("Administrador/configuración/bd.php");
if(!empty($image)){
    $query =   "UPDATE pedido SET Ped_Comprobante= '".$archivo."'  
            WHERE Ped_ID=".$Pedido;
}


        
$result = $mysqli->query($query);

$query2 =    "UPDATE pedido SET Ped_Estado='4' 
                WHERE Ped_ID =".$Pedido;


$result2 = $mysqli->query($query2);	

if($result) {

    header("Location: ./Mis_Pedidos.php?res=1");
    //header("Location: ./Gestion_Productos.php");
} 
else {
    header("Location: ./Mis_Pedidos.php?res=0");
    //header("Location: ./Gestion_Productos.php");
}

die();



?>