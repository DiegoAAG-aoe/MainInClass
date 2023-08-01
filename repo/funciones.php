<?php

function obtenerProductosEnCarrito($sesion)
{
    include("Administrador/Configuración/BDregistro.php");
    $bd = obtenerConexion();

    $cant = mysqli_query($conexion,"SELECT COUNT(Ped_ID) as cantidad FROM Pedido WHERE Ped_Estado = 8 AND Ped_Consumidor = $sesion");
    $row2 = mysqli_fetch_array($cant);
    $cantidad = $row2["cantidad"];

    if($cantidad==0){
        return 0;
    }else{

        $result = mysqli_query($conexion,"SELECT Ped_ID FROM Pedido WHERE Ped_Estado = 8 AND Ped_Consumidor = $sesion");
        $row = mysqli_fetch_array($result);
        $idPedido = $row["Ped_ID"];
        
        $sentencia = $bd->prepare(" SELECT Pro_ID, Pro_Nombre, Pro_Descripcion, Sol_Precio, Sol_ID, Sol_Cantidad, Sol_Pedido, Sol_Mensaje
                                    FROM Producto
                                    INNER JOIN Solicitud
                                    ON Pro_ID = Sol_Producto
                                    WHERE Sol_Pedido = ?");
        //$idSesion = session_id();
        $sentencia->execute([$idPedido]);
        return $sentencia->fetchAll();
    }
}

function &cantsol($sesion){
    include("Administrador/Configuración/BDregistro.php");
    $cant = mysqli_query($conexion,"SELECT COUNT(Ped_ID) as cantidad FROM Pedido WHERE Ped_Estado = 8 AND Ped_Consumidor= $sesion");
    $row2 = mysqli_fetch_array($cant);
    $cantidad = $row2["cantidad"];
    if($cantidad==0){
        return $cantidad;
    } else {
        $result = mysqli_query($conexion,"SELECT Ped_ID FROM Pedido WHERE Ped_Estado = 8 AND Ped_Consumidor = $sesion");
        $row = mysqli_fetch_array($result);
        $idPedido = $row["Ped_ID"];

        $cant = mysqli_query($conexion,"SELECT COUNT(Sol_ID) as cantidad FROM Solicitud WHERE Sol_Pedido = $idPedido");
        $row2 = mysqli_fetch_array($cant);
        $cantidad2 = $row2["cantidad"];
        return $cantidad2;
    }
}

function solicitarpedido($ped_id, $fecha){
    include("Administrador/Configuración/BDregistro.php");
    $bd = obtenerConexion();

    $fechahoy = date('d-m-y');

    //echo $fechahoy;

    $actualizacionpead = $bd->prepare("UPDATE pead_adm SET Pead_Fecha = ? WHERE Pead_Pedido = $ped_id ");
    $actualizacionpead->execute([$fechahoy]);

    $actualizacion = $bd->prepare("UPDATE Pedido SET Ped_Estado = ?, Ped_FechaEntrega = ? WHERE Ped_ID = $ped_id ");
    return $actualizacion->execute([1, $fecha]);
}


function quitarProductoDelCarrito($idProducto, $sesion, $idsol, $presol)
{
    include("Administrador/Configuración/BDregistro.php");
    $bd = obtenerConexion();

    $result = mysqli_query($conexion,"SELECT Ped_ID, Ped_Precio FROM Pedido WHERE Ped_Estado = 8 AND Ped_Consumidor = $sesion");
    $row = mysqli_fetch_array($result);
    $idPedido = $row["Ped_ID"];
    $Precioped = $row["Ped_Precio"];

    /*$precio = mysqli_query($conexion,"SELECT Pro_Precio FROM Producto WHERE Pro_ID=$idProducto");
    $row3 = mysqli_fetch_array($precio);
    $preciosol = $row3["Pro_Precio"];*/

    $preped = $Precioped - $presol;

    //echo $preped;

    $actualizacion = $bd->prepare("UPDATE Pedido SET Ped_Precio = (?) WHERE Ped_ID = $idPedido ");
    $actualizacion->execute([$preped]);

    $sentencia = $bd->prepare("DELETE FROM Solicitud WHERE Sol_ID = ?");
    return $sentencia->execute([$idsol]);
}

function restar($idpro, $sesion, $cant, $idsol, $solpre){
    include("Administrador/Configuración/BDregistro.php");
    $bd = obtenerConexion();

    $result = mysqli_query($conexion,"SELECT Ped_ID, Ped_Precio FROM Pedido WHERE Ped_Estado = 8 AND Ped_Consumidor = $sesion");
    $row = mysqli_fetch_array($result);
    $idPedido = $row["Ped_ID"];
    $Precioped = $row["Ped_Precio"];

    $precio = mysqli_query($conexion,"SELECT Pro_Precio FROM Producto WHERE Pro_ID=$idpro");
    $row3 = mysqli_fetch_array($precio);
    $preciopro = $row3["Pro_Precio"];

    $preped = $Precioped - $preciopro;

    $actualizacionped = $bd->prepare("UPDATE Pedido SET Ped_Precio = ? WHERE Ped_ID = $idPedido ");
    $actualizacionped->execute([$preped]);

    $presol = $solpre - $preciopro;
    $ncant = $cant - 1;

    $actualizacion = $bd->prepare("UPDATE Solicitud SET Sol_Cantidad = ?, Sol_Precio = ? WHERE Sol_ID = $idsol");
    return $actualizacion->execute([$ncant, $presol]);
}

function sumar($idpro, $sesion, $cant, $idsol, $solpre){
    include("Administrador/Configuración/BDregistro.php");
    $bd = obtenerConexion();

    $result = mysqli_query($conexion,"SELECT Ped_ID, Ped_Precio FROM Pedido WHERE Ped_Estado = 8 AND Ped_Consumidor = $sesion");
    $row = mysqli_fetch_array($result);
    $idPedido = $row["Ped_ID"];
    $Precioped = $row["Ped_Precio"];

    $precio = mysqli_query($conexion,"SELECT Pro_Precio FROM Producto WHERE Pro_ID=$idpro");
    $row3 = mysqli_fetch_array($precio);
    $preciopro = $row3["Pro_Precio"];

    $preped = $Precioped + $preciopro;

    $actualizacionped = $bd->prepare("UPDATE Pedido SET Ped_Precio = ? WHERE Ped_ID = $idPedido ");
    $actualizacionped->execute([$preped]);

    $presol = $solpre + $preciopro;

    $ncant = $cant + 1;

    $actualizacion = $bd->prepare("UPDATE Solicitud SET Sol_Cantidad = ?, Sol_Precio = ? WHERE Sol_ID = $idsol");
    return $actualizacion->execute([$ncant, $presol]);
}

function agregarProductoSolicitud($idProducto, $mensaje, $idconsumidor, $image)
{
    // Ligar el id del producto con el usuario a través de la sesión
    include("Administrador/Configuración/BDregistro.php");
    $bd = obtenerConexion();
    //iniciarSesionSiNoEstaIniciada();

    $cant = mysqli_query($conexion,"SELECT COUNT(Ped_ID) as cantidad FROM Pedido WHERE Ped_Estado = 8 AND Ped_Consumidor= $idconsumidor");
    $row2 = mysqli_fetch_array($cant);
    $cantidad = $row2["cantidad"];

    if($cantidad==0){
        $insert_ped = $bd->prepare("INSERT INTO Pedido (Ped_Consumidor, Ped_Estado, Ped_Precio)VALUES (?, ?, ?)");
        $insert_ped->execute([$idconsumidor, 8, 0]);

        $result = mysqli_query($conexion,"SELECT Ped_ID FROM Pedido WHERE Ped_Estado = 8 AND Ped_Consumidor = $idconsumidor");
        $row = mysqli_fetch_array($result);
        $idPedido = $row["Ped_ID"];

        $sentenciapead = $bd->prepare("INSERT INTO pead_adm (Pead_Pedido, Pead_Administrador) VALUES (?, ?)");
        $sentenciapead->execute([$idPedido, 2]);
    }
    //consultamos el id y el precio del pedido
    $result = mysqli_query($conexion,"SELECT Ped_ID, Ped_Precio FROM Pedido WHERE Ped_Estado = 8 AND Ped_Consumidor = $idconsumidor");
    $row = mysqli_fetch_array($result);
    $idPedido = $row["Ped_ID"];
    $precioped = $row["Ped_Precio"];
    //consultamos la cantidad de producto de la solicitud y la cantidad de solicitudes con ese producto
    $cantprosol = mysqli_query($conexion,"SELECT Sol_Cantidad, Sol_ID, Sol_Precio, COUNT(Sol_ID) as cantidadsol  FROM Solicitud WHERE Sol_Pedido = $idPedido AND Sol_Producto = $idProducto AND Sol_Mensaje = '$mensaje'");
    $rowprosol = mysqli_fetch_array($cantprosol);
    $cantpro = $rowprosol["Sol_Cantidad"];
    $solid = $rowprosol["Sol_ID"];
    $solpre = $rowprosol["Sol_Precio"];
    $cantidadprosol = $rowprosol["cantidadsol"];
    //si ya hay una solicitud con ese producto, en vez de hacer otra solicitud, se le sumara a la cantidad de la solicitud existente.
    if($cantidadprosol==1){
        return sumar($idProducto, $idconsumidor, $cantpro, $solid, $solpre);
    }else{
        $precio = mysqli_query($conexion,"SELECT Pro_Precio FROM Producto WHERE Pro_ID=$idProducto");
        $row3 = mysqli_fetch_array($precio);
        $preciosol = $row3["Pro_Precio"];

        $preped = $precioped + $preciosol;
        
        $actualizacion = $bd->prepare("UPDATE Pedido SET Ped_Precio = (?) WHERE Ped_Estado = 8 AND Ped_Consumidor = $idconsumidor");
        $actualizacion->execute([$preped]);

        $sentencia = $bd->prepare("INSERT INTO Solicitud (Sol_Pedido, Sol_Producto, Sol_Cantidad, Sol_Precio, Sol_Mensaje, Sol_Imagen) VALUES (?, ?, ?, ?, ?, ?)");
        return $sentencia->execute([$idPedido, $idProducto, 1, $preciosol, $mensaje, $image]);
    }

    
}
function obtenerConexion()
{
    $password ="";
    $user = "root";
    $dbName = "reposteriakos";
    $database = new PDO('mysql:host=localhost;dbname=' . $dbName, $user, $password);
    $database->query("set names utf8;");
    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}
?>