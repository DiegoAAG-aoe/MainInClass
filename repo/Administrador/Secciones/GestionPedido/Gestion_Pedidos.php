<body class="bodycat">
<?php include("../../template/Cabecera.php"); ?>
<div class=text-center><h4 class="h4t">Gestión de Pedidos</h4></div>
<br></br><br></br>
<?php
if (isset($_GET["res"])) {
    $res = htmlspecialchars($_GET["res"]);

    if ($res == 1) {
        echo '<script language="javascript">alert("Elemento Modificado con Exito");</script>';
    }
    if ($res == 0) {
        echo '<script language="javascript">alert("Hubo un error, no se puedo modificar el elemento");</script>';
    }
}
include("../../configuración/bd.php");

include_once '../../../includes/user.php';
include_once '../../../includes/user_s.php';

$userSession = new UserSession();
$user = new User();

if (isset($_SESSION['user_a'])) {
    //echo "hay sesion de administrador"; 
    $user->setUser($userSession->getCurrentUser_a());

    $query = "SELECT P.Ped_ID, C.Con_Nombre, C.Con_Apellido, P.Ped_FechaEntrega, A.Pead_Fecha, E.Est_Nombre
                FROM pedido P LEFT JOIN Pead_Adm A ON (P.Ped_ID=A.Pead_Pedido) 
                            LEFT JOIN Consumidor C ON (P.Ped_Consumidor=C.Con_ID)
                            LEFT JOIN Estado E ON (P.Ped_Estado=E.Est_ID)
                WHERE E.Est_Nombre <> 'Carrito'
                order by P.Ped_ID desc";

    echo '<table width="100%" class="bordered"> 
        <tr> 
                <td class="thtd"> <h3><font face="Arial">Pedido</font></h3> </td>
                <td class="thtd"> <h3><font face="Arial">Nombre</font> </h3></td>
                <td class="thtd"> <h3><font face="Arial">Fecha Entrega</font></h3> </td>
                <td class="thtd"><h3> <font face="Arial">Fecha Emision</font> </h3></td>
                <td class="thtd"> <h3><font face="Arial">Estado</font> </h3></td>
                <td class="thtd"></td>
        </tr>';

    if ($result = $mysqli->query($query)) {


        while ($row = $result->fetch_assoc()) {
            //header("Content-type: image/png"); 
            //echo $row["pro_imagen"];

            $field0name = $row["Ped_ID"];
            $field1name = $row["Con_Nombre"];
            $field2name = $row["Con_Apellido"];
            $field3name = $row["Ped_FechaEntrega"];
            $field4name = $row["Pead_Fecha"];
            $field5name = $row["Est_Nombre"];


            echo '<tr> 
            
                    <td width="15%" style="padding-top: 1rem;" class="filas2"><h5>' . $field0name . '</h5></td> 
                    <td width="25%" style="padding-top: 1rem;" class="filas2"><h5>' . $field1name . '</h5><h5>'. $field2name . '</h5></td> 
                    <td width="25%" style="padding-top: 1rem;" class="filas2"><h5 style="text-align:center;">' . $field3name . '</h5></td> 
                    <td width="25%" style="padding-top: 1rem;" class="filas2"><h5 style="text-align:center;">' . $field4name . '</h5></td> 
                    <td width="10%" style="padding-top: 1rem; padding-right:1rem;" class="filas2"><h5>' . $field5name . '</h5></td>  
                    <td width="8%" style="padding-top: 1rem;" padding-left:2rem;" class="filas2"><a href="./Pedido.php?pedido=' . $field0name . '" class="button button5" role="button">Editar</a></td>

                </tr>';
        }
        $result->free();

    }
}
?>
</table>
</body>

</html>
<br></br><br></br><br></br>


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
