<body class="bodycat">
<?php
include_once "Template/Cabecera.php"; 

if ( isset($_GET["res"])){
    $res =htmlspecialchars($_GET["res"]);
    
    if  ($res == 1) {
        echo '<script language="javascript">alert("Se subio el comprobante con Exito");</script>';
    } 
    if  ($res == 0) {
        echo '<script language="javascript">alert("Hubo un error, no se puedo subir el comprobante");</script>';
    } 
    if ($res == 2) {
        echo '<script language="javascript">alert("La extensión no es correcta. Se permiten archivos .png o .jpg.");</script>';
    }
    if ($res == 3) {
        echo '<script language="javascript">alert("El tamaño de los archivos no es correcta. Se permiten archivos de 85 Kb máximo.");</script>';
    }
}

if (isset($_SESSION['user_c'])) {
    $user->setUser_c($userSession->getCurrentUser_c());
    echo $_SESSION['user_c'];
    $Id_Consumidor = $_SESSION['user_c'];

    echo '  <br></br><br></br><br></br>

    <box>
        <div style="margin-left:30rem;">
            <h1>Mis Pedidos</h1>
        </div><br></br>';
        

        include("Administrador/configuración/bd.php");

        $query = "SELECT P.Ped_ID, P.Ped_FechaEntrega, A.Pead_Fecha, E.Est_Nombre
            FROM pedido P LEFT JOIN Pead_Adm A ON (P.Ped_ID=A.Pead_Pedido) 
                        LEFT JOIN Estado E ON (P.Ped_Estado=E.Est_ID)
            WHERE P.Ped_Consumidor=".$Id_Consumidor." AND E.Est_Nombre <> 'Carrito'
            order by P.Ped_ID desc";

        echo '<table width="100%"> 
            <tr> 
                    <td> <h3><font face="Arial">Pedido</font></h3> </td>
                    <td> <h3><font face="Arial">Fecha Entrega</font></h3> </td>
                    <td><h3> <font face="Arial">Fecha Emision</font> </h3></td>
                    <td> <h3><font face="Arial">Estado</font> </h3></td>
            </tr>';

    if ($result = $mysqli->query($query)) {


        while ($row = $result->fetch_assoc()) {
            //header("Content-type: image/png"); 
            //echo $row["pro_imagen"];

            $field0name = $row["Ped_ID"];
            $field3name = $row["Ped_FechaEntrega"];
            $field4name = $row["Pead_Fecha"];
            $field5name = $row["Est_Nombre"];


            echo '<tr> 
            
                    <td width="15%"><h5>' . $field0name . '</h5></td> 
                    <td width="25%"><h5>' . $field3name . '</h5></td> 
                    <td width="25%"><h5>' . $field4name . '</h5></td> 
                    <td width="10%"><h5>' . $field5name . '</h5></td>  
                    <td width="10%" Style="padding-bottom:1rem;"><a href="./Pedido.php?pedido=' . $field0name . '" class="button button5" role="button">Ver Más</a></td>

                </tr>';
        }
        $result->free();

    }
    echo '</box>';
}

else{
    header("Location: Catalogo.php?res=0");    
}

?>
</table>
<br></br><br></br><br></br><br></br>
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
</body>

