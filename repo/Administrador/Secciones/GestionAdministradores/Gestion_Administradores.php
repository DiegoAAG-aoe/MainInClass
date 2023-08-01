<html>
<body class="bodycat">
<?php include("../../template/Cabecera.php"); ?>

<div>
    <a href="Añadir_Administrador.php" class="button button5" Style="margin-top:5rem;margin-bottom:1rem;margin-left:20rem;" role="button">Agregar Nuevo Administrador</a>
</div>
<br><br><br>

<?php

include_once '../../../includes/user.php';
include_once '../../../includes/user_s.php';

$userSession = new UserSession();
$user = new User();

if (isset($_SESSION['user_a'])) {
    //echo "hay sesion de administrador"; 
    $user->setUser($userSession->getCurrentUser_a());
    echo'  <div class=text-center><h4 class="h4t">Gestión de Administradores</h4></div>';
    if ( isset($_GET["res"])){
        $res =htmlspecialchars($_GET["res"]);
        
        if($res==1) {
            echo '<script language="javascript">alert("Elemento Modificado con Exito.");</script>';
        } 
        if($res==0) {
            echo '<script language="javascript">alert("Hubo un error, no se puedo modificar el elemento.");</script>';
        }
        if($res==2) {
            echo '<script language="javascript">alert("El correo ingresado, ya esta inscrito.");</script>';
        }
    }

    include("../../configuración/bd.php"); 

    $query = "  SELECT A.Adm_ID, A.Adm_Nombre, A.Adm_Apellido, A.Adm_Correo, C.Car_Nombre, 
                    A.Adm_Estado 
                FROM Administrador A LEFT JOIN Cargo C ON (A.Adm_Cargo=C.Car_ID)
                order by A.Adm_Nombre";
    echo '<table width="100%"> 
        <tr> 
                <td> <h3> <font face="Arial">ID</font> </h3></td>
                <td> <h3> <font face="Arial">Nombre</font> </h3></td>
                <td> <h3> <font face="Arial">Apellido</font> </h3></td>
                <td> <h3 Style="margin-left:3rem;"> <font face="Arial">Correo</font> </h3></td>
                <td> <h3> <font face="Arial">Cargo</font> </h3></td>
                <td> <h3> <font face="Arial">Estado</font> </h3></td>
                <td> </td>
        </tr>';

    if ($result = $mysqli->query($query)) {

        
        while ($row = $result->fetch_assoc()) {
            //header("Content-type: image/png"); 
            //echo $row["pro_imagen"];

            $field1name = $row["Adm_ID"];
            $field2name = $row["Adm_Nombre"];
            $field3name = $row["Adm_Apellido"];
            $field4name = $row["Adm_Correo"];
            $field5name = $row["Car_Nombre"];
            $field6name = $row["Adm_Estado"];
            if($field6name == '1'){
                $field6name = 'Habilitado';
            }
            if($field6name == '0') {
                $field6name = 'Deshabilitado';
            }
    
            echo '<tr >  
                    <td width="20%"><h5 Style="padding-right:2rem; ">'.$field1name.'</h5></td> 
                    <td width="40%"><h5 Style="padding-right:2rem; ">'.$field2name.'</h5></td> 
                    <td width="15%"><h5 Style="padding-right:2rem; ">'.$field3name.'</h5></td> 
                    <td width="35%"><h5 Style="padding-right:2rem; ">'.$field4name.'</h5></td> 
                    <td width="15%"><h5 Style="padding-right:2rem; ">'.$field5name.'</h5></td> 
                    <td width="15%"><h5 >'.$field6name.'</h5></td> 
                    <td width="15%" ><h5 Style="margin-right:1rem; padding-left:1rem;"><a href="Administrador.php?Administrador='.$field1name.'"" class="button button5" role="button">Editar</a></h5></td>
                </tr>';
        }
        $result->free();
    } 

    echo '</table>';

}

?>

</body>
</html>
<br></br><br></br><br></br><br></br><br></br><br></br>

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