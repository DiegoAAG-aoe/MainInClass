<body class="bodycat">
<?php include("../../Template/Cabecera.php");

$Pedido = htmlspecialchars($_GET["pedido"]);

include("../../configuración/bd.php");
echo '<box style="background-color:#ecfafb;">';
echo '<form id="GestionForm" action="./Editar_Pedido.php" method="POST">';

include_once '../../../includes/user.php';
include_once '../../../includes/user_s.php';

$userSession = new UserSession();
$user = new User();

if (isset($_SESSION['user_a'])) {
    //echo "hay sesion de administrador"; 
    $user->setUser($userSession->getCurrentUser_a());

    $query = "SELECT C.Con_Nombre, C.Con_Apellido, C.Con_Telefono, C.Con_Correo
                FROM Pedido P   LEFT JOIN Consumidor C ON (P.Ped_Consumidor=C.Con_ID)
                WHERE P.Ped_ID = $Pedido";

    if ($result = $mysqli->query($query)) {

        while ($row = $result->fetch_assoc()) {
            //header("Content-type: image/png"); 
            //echo $row["pro_imagen"];

            $field0name = $row["Con_Nombre"];
            $field1name = $row["Con_Apellido"];
            $field2name = $row["Con_Telefono"];
            $field3name = $row["Con_Correo"];

            echo '<table width="60%">
                    <tr><td><h5>Datos Cliente</h5></td><td></td></tr>
                    <tr><td>Nombre </td><td>' . $field0name . ' ' . $field1name . '</td></tr>
                    <tr><td>Telefono </td><td>' . $field2name . '</td></tr>
                    <tr><td>Correo </td><td>' . $field3name . '</td></tr>
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
            $field2name = $row["Est_Nombre"];
            $Respuesta = $row["Ped_Respuesta"];

            echo '<table width="60%">
                    <tr><td><h5>Datos Pedido</h5></td><td></td></tr>
                    <tr><td>N° Pedido</td><td>
                    <input type="text" class="form-control" name="nopedido" id="nopedido" value="' . $Pedido . '" ReadOnly></td></tr>';
            echo '  <tr><td>Fecha de Entrega </td><td>' . $field0name . '</td></tr>
                    <tr><td>Fecha de Emision </td><td>' . $field1name . '</td></tr>
                    <tr><td>
                        <div class = "form-group">
                            <label for="txtrEstados">Estado del pedido</label>
                        </div>                          
                    </td>
                    <td><select type="text" class="form-control" name="txtEstados" id="txtEstados" placeholder="Estados">  ';

            $query1 = " SELECT  E.Est_Nombre 
                                FROM Estado E
                                WHERE E.Est_Condicion='1'";

            if ($result1 = $mysqli->query($query1)) {

                while ($row = $result1->fetch_assoc()) {

                    $nomest = $row["Est_Nombre"];

                    if ($field2name == $nomest)
                        echo '<option selected="selected" value="' . $nomest . '">' . $nomest . '</option>';
                    else
                        echo '<option value="' . $nomest . '">' . $nomest . '</option>';

                }
                $result1->free();
            }
            echo '</select></td></tr>';
            echo '</table>';

        }
        $result->free();
    }

    echo '<br>';

    $query = "SELECT  S.Sol_Cantidad, S.Sol_Precio, S.Sol_Mensaje, S.Sol_Imagen,
                        Pro.Pro_ID, Pro.Pro_Nombre, Pro.Pro_Imagen, P.Ped_Comprobante
                FROM Pedido P   LEFT JOIN Solicitud S ON (P.Ped_ID=S.Sol_Pedido)
                                LEFT JOIN Producto Pro ON (S.Sol_Producto=Pro.Pro_ID)
                WHERE P.Ped_ID = $Pedido";

    echo '<table width ="100%"> 
        <tr> 
                <td> <font face="Arial">Imagen</font> </td>
                <td> <font face="Arial">Codigo</font> </td>
                <td> <font face="Arial">Producto</font> </td>
                <td> <font face="Arial">Cantidad</font> </td>
                <td> <font face="Arial">Precio</font> </td>
                <td> <font face="Arial">Mensaje</font> </td>
                <td> <font face="Arial">Imagen Cliente</font> </td>
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
            $Comprobante = $row["Ped_Comprobante"];

            echo '<tr> 
                        <td width="10%"><img src="imagenPedido.php?id=' . $field1name . '" width="80%" ></td> 
                        <td width="10%">' . $field1name . '</td> 
                        <td width="20%">' . $field2name . '</td> 
                        <td width="10%">' . $field3name . '</td> 
                        <td width="10%">' . $field4name . '</td> 
                        <td width="30%">' . $field5name . '</td>';
            if ($field6name != NULL) {
                echo '<td width="10%"><img src="imagessol/' . $field6name . '" width="80%" ></td> ';
            } else {
                echo '<td width="10%">No disponible</td> ';
            }
            echo '</tr>';
        }
        $result->free();
    }
    echo '</table>';

    echo '<br>';

    echo '<table width="100%"><tr>
            <td><div class = "form-group">
                <label for="txtRespuesta">Respuesta</label>';
    if ($Respuesta == '')
        echo '<input type="text" class="form-control" name="txtRespuesta" id="txtRespuesta" placeholder="Escribe aqui..">';
    else
        echo '<input type="text" class="form-control" name="txtRespuesta" id="txtRespuesta" value="' . $Respuesta . '">';
    echo '</div></td></tr>
    </table> ';
    if ($Comprobante != '') {
        echo '<div><h5 style="margin-left:30rem;">Comprobante de Pago:</h5><div><img src="Img_Comprobante/' . $Comprobante . '" width="50%" style="margin-left:30rem;" ><br></br>';
    }
    echo '<br>';

    echo '<table> <tr>
            <td><div>
                <button type="submit" class="button button5">Guardar</button>
                <a href="Gestion_Pedidos.php" class="button button5" role="button">Cancelar</a>
            </div></td></tr>
        </table>';
    echo '</form>';
    echo '</box>';
    echo '<br></br>';
}

?>
</body>
</html>
<br></br><br></br>

<footer class="pie-paginaadm">
<div class="grupo-3">
            <br>
            <figure>
                <br>
                <img src="../../../imagenes/8.png" align="right" width="120" height="120" Style="margin-top:-3rem;"><small><b>Delicias Infinity</b> &copy; - Todos los Derechos reservados</small>
            </figure>
            </br>
</div>
</footer>