<?php
include_once "../funciones.php";


if (!isset($_POST["id_producto"])) {
    exit("No hay id_producto");
}else{
    if($_POST["accion"]==0){
        if($_POST["cant"]==1){
            quitarProductoDelCarrito($_POST["id_producto"], $_POST["sesion"], $_POST["id_sol"], $_POST["sol_precio"]);
            header("Location: ../ver_carrito.php");
        }else{
            restar($_POST["id_producto"], $_POST["sesion"], $_POST["cant"], $_POST["id_sol"], $_POST["sol_precio"]);
            header("Location: ../ver_carrito.php");
        }
    }else{
        sumar($_POST["id_producto"], $_POST["sesion"], $_POST["cant"], $_POST["id_sol"], $_POST["sol_precio"]);
        header("Location: ../ver_carrito.php");
    }
}

/*if (isset($_POST["redireccionar_carrito"])) {
    header("Location: ver_carrito.php");
} else {
    header("Location: tienda.php");
}*/
?>