<?php
include_once "funciones.php";

$fechahoy = date('Y-m-d');


if($_POST["fecha"]<$fechahoy){
    header("Location: ver_carrito.php?res=2");
}else if ($_POST["fecha"]=='') {
    header("Location: ver_carrito.php?res=1");
}else{
    solicitarpedido($_POST["ped_id"], $_POST["fecha"]);
    
    if (isset($_POST["solicitado"])) {
        header("Location: Catalogo.php?res=2");
    } else {
        header("Location: ver_carrito.php?res=0");
    }
}
