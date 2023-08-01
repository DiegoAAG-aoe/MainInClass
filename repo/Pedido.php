<body class="bodycat">
    <?php
include_once "Template/Cabecera.php";
if (isset($_GET["res"])) {
    $res = htmlspecialchars($_GET["res"]);

    if ($res == 1) {
        echo '<script language="javascript">alert("Debe ingresar una fecha");</script>';
    }
    if ($res == 0) {
        echo '<script language="javascript">alert("Algo salio mal. Vuelva a intentarlo");</script>';
    }
}

if (isset($_SESSION['user_c'])) {
    $user->setUser_c($userSession->getCurrentUser_c());
    echo $_SESSION['user_c'];
    $Id_Consumidor = $_SESSION['user_c'];

    echo '  <br></br><br></br><br></br>';
    $Pedido = htmlspecialchars($_GET["pedido"]);

    include("Administrador/configuración/bd.php");

    $query = "SELECT C.Con_Nombre, C.Con_Apellido, C.Con_Telefono, C.Con_Correo
            FROM Pedido P   LEFT JOIN Consumidor C ON (P.Ped_Consumidor=C.Con_ID)
            WHERE P.Ped_ID = $Pedido";

    echo '<div>
        <h1 style="margin-left:30rem;">Pedido #' . $Pedido . '</h1>
    </div><br></br>';


    if ($result = $mysqli->query($query)) {

        while ($row = $result->fetch_assoc()) {

            $field0name = $row["Con_Nombre"];
            $field1name = $row["Con_Apellido"];
            $field2name = $row["Con_Telefono"];
            $field3name = $row["Con_Correo"];

            echo '<table>
                        <tr><td><h3>Datos Cliente</h3></td><td></td></tr>
                        <tr><td width="20%"><h5>Nombre </h5></td><td><h5>' . $field0name . ' ' . $field1name . '</h5></td></tr>
                        <tr><td width="20%"><h5>Telefono </h5></td><td><h5>' . $field2name . '</h5></td></tr>
                        <tr><td width="20%"><h5>Correo </h5></td><td><h5>' . $field3name . '</h5></td></tr>
                    </table>';
            echo '<input type="text" class="form-control" name="CorreoCon" id="CorreoCon" value="' . $field3name . '" Hidden></td></tr>';

        }
        $result->free();
    }

    echo '<br>';

    $query = "SELECT  P.Ped_FechaEntrega, A.Pead_Fecha, E.Est_Nombre, P.Ped_Respuesta
                    FROM Pedido P   LEFT JOIN Pead_Adm A ON (P.Ped_ID=A.Pead_Pedido)
                                    LEFT JOIN Estado E ON (P.Ped_Estado=E.Est_ID)
                    WHERE P.Ped_ID = $Pedido";

    if ($result = $mysqli->query($query)) {

        if ($row = $result->fetch_assoc()) {
            //header("Content-type: image/png"); 
            //echo $row["pro_imagen"];

            $field0name = $row["Ped_FechaEntrega"];
            $field1name = $row["Pead_Fecha"];
            $Estado = $row["Est_Nombre"];
            $Respuesta = $row["Ped_Respuesta"];

            echo '<table>
                        <tr><td><h3>Datos Pedido</h3></td><td></td></tr>
                        <tr><td width="20%"><h5>N° Pedido </h5></td><td><h5>' . $Pedido . '</h5></td></tr>';
            echo '  <tr><td width="20%"><h5>Fecha de Entrega </h5></td><td><h5>' . $field0name . '</h5></td></tr>
                        <tr><td width="20%"><h5>Fecha de Emision </h5></td><td><h5>' . $field1name . '</h5></td></tr>
                        <tr><td width="20%"><h5>Estado </h5></td><td><h5>' . $Estado . '</h5></td></tr>';
            echo '</table>';

        }
        $result->free();
    }

    echo '<br>';

    $query = "SELECT  S.Sol_Cantidad, S.Sol_Precio, S.Sol_Mensaje, S.Sol_Imagen,
                            Pro.Pro_ID, Pro.Pro_Nombre, Pro.Pro_Imagen
                    FROM Pedido P   LEFT JOIN Solicitud S ON (P.Ped_ID=S.Sol_Pedido)
                                    LEFT JOIN Producto Pro ON (S.Sol_Producto=Pro.Pro_ID)
                    WHERE P.Ped_ID = $Pedido";

    echo '<table width ="100%"> 
            <tr> 
                    <td><h4> <font face="Arial">Imagen</font></h4> </td>
                    <td><h4> <font face="Arial">Codigo</font></h4> </td>
                    <td><h4> <font face="Arial">Producto</font></h4> </td>
                    <td><h4> <font face="Arial">Cantidad</font></h4> </td>
                    <td><h4> <font face="Arial">Precio</font></h4> </td>
                    <td><h4> <font face="Arial">Mensaje</font></h4> </td>
                    <td><h4> <font face="Arial">Imagen Cliente</font></h4> </td>
            </tr>';

    if ($result = $mysqli->query($query)) {

        while ($row = $result->fetch_assoc()) {
            //header("Content-type: image/png"); 
            //echo $row["pro_imagen"];

            $field0name = $row["Pro_Imagen"];
            $field1name = $row["Pro_ID"];
            $field2name = $row["Pro_Nombre"];
            $field3name = $row["Sol_Cantidad"];
            $field4name = $row["Sol_Precio"];
            $field5name = $row["Sol_Mensaje"];
            $field6name = $row["Sol_Imagen"];

            echo '<tr> 
                            <td width="10%"><img src="imagen1.php?id=' . $field1name . '" width="80%" ></td> 
                            <td width="10%" style="text-align:center;"><h5>' . $field1name . '</h5></td> 
                            <td width="20%"><h5>' . $field2name . '</h5></td> 
                            <td width="10%" style="text-align:center;"><h5>' . $field3name . '</h5></td> 
                            <td width="10%"><h5>' . $field4name . '</h5></td> 
                            <td width="30%"><h5>' . $field5name . '</h5></td> 
                            <td width="10%"><h5>' . $field6name . '</h5></td>
                        </tr>';
        }
        $result->free();
    }
    echo '</table>';

    echo '<br>';

    echo '<table width="100%"><tr>
            <tr><td width="20%"><h3>Respuesta: </h3></td><td><h5>' . $Respuesta . '</h5></td></tr>
        </table> ';

    echo '<br>';

    if ($Estado == 'Aceptado') {
        
        echo '<table>
        <tr><td><h3>Despliegue de Datos de Pago</h3></td><td></td></tr>
        <tr><td><h5>Nombre:</h5></td><td><h5>Juliana Andrades</h5></td></tr>
        <tr><td><h5>Alias:</h5></td><td><h5>Delicias Infinity</h5></td></tr>
        <tr><td><h5>RUT:</h5></td><td><h5>2.122.122-2</h5></td></tr>
        <tr><td><h5>Correo:</h5></td><td><h5>Delicias.Infinity@gmail.com</h5></td></tr>
        <tr><td><h5>Tipo de Cuenta:</h5></td><td><h5>Cuenta Vista / Rut</h5></td></tr>
        <tr><td><h5>Banco:</h5></td><td><h5>Banco Estado</h5></td></tr>
    <table>';

        echo '<form id="GestionForm" action="Subir_Comprobante.php?pedido=' . $Pedido . '" method="POST" enctype="multipart/form-data">';

        echo '<div class="bordereddd">
        <label for="txtImagen"><h3>Comprobante de Pago</h3></label>
        <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Imagen">
    </div><br></<br>';

        echo '<table> <tr>
            <td><div>
                <button type="submit" class="button button5">Guardar</button>
                <a href="Mis_Pedidos.php" class="button button5" role="button">Cancelar</a>
            </div></td>
            </tr>
        </table>';
        echo '</form>';
        
    } 
    else {
        echo '<div class="borderedd">
            <a href="Mis_Pedidos.php" class="button button5" role="button" style="margin-left:4rem;">Regresar</a>
        </div>';
    }
    echo '<br></br>';
} else {
    header("Location: Catalogo.php?res=0");
}
?>

<footer class="pie-pagina">
    <div class="grupo-1">
        <div class="box">
            <figure>
                <a href="#">
                    <img src="imagenes/8.png" alt="Logo de Reposteriakos">
                </a>
            </figure>
        </div>
        <div class="box">
            <h2>SOBRE NOSOTROS</h2>
            <p>¡Hola! Comenzamos nuestra tienda de repostería junto a mi mamá, durante la pandemia y nos encantó tanto
                que deseamos continuar.</p>
            <p>Si quieres algún dulcecito, te prometemos que lo prepararemos con todo el amor y dedicación del mundo.
            </p>
        </div>
        <div class="box">
            <h2>SIGUENOS</h2>
            <div class="red-social">
                <a href="https://www.facebook.com/profile.php?id=100063171552620" class="fa fa-facebook"></a>
                <a href="https://www.instagram.com/delicias_infinity/" class="fa fa-instagram"></a>
            </div>
        </div>
    </div>
    <div class="grupo-2">
        <small><b>Delicias Infinity</b> &copy; - Todos los Derechos reservados</small>
    </div>
</footer>