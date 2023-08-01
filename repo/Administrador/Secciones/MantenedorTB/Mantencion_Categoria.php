<body class="bodycat">
<?php
include_once '../../../includes/user.php';
include_once '../../../includes/user_s.php';

$userSession = new UserSession();
$user = new User();
if (isset($_SESSION['user_g'])) {
    include("../../template/CabeceraGestor.php");
} else if (isset($_SESSION['user_a'])) {
    include("../../template/Cabecera.php");
}

if (isset($_SESSION['user_g'])||isset($_SESSION['user_a'])) {
    //echo "hay sesion de administrador"; 
    if (isset($_SESSION['user_g'])) {
        $user->setUser($userSession->getCurrentUser_g());
    } else if (isset($_SESSION['user_a'])) {
        $user->setUser($userSession->getCurrentUser_a());
    }

 ?>
    <div class=text-center><h4 class="h4t">Mantención de Categorías</h4></div>
    <div>
        <a href="Mantencion_Tablas.php" class="button button5" role="button" Style="margin-top:0rem;margin-left:20rem;">Regresar</a>
        <a href="Añadir_Categoria.php" class="button button5" Style="margin-top:5rem;" role="button">Agregar Nueva Categoría</a>
    </div>
    <br><br><br>

    <?php

    if ( isset($_GET["res"])){
        $res =htmlspecialchars($_GET["res"]);
        
        if($res==1) {
            echo '<script language="javascript">alert("Elemento Modificado con Exito");</script>';
        } 
        if($res==0) {
            echo '<script language="javascript">alert("Hubo un error, no se puedo modificar el elemento");</script>';
        }
    }

    include("../../configuración/bd.php"); 

    $query = "  SELECT C.Cat_ID, C.Cat_Nombre, C.Cat_Estado
                FROM Categoria C";

    echo '<table width="50%" class="bordered"> 
        <tr> 
                <td class="thtd"><h3> <font face="Arial">ID</font></h3> </td>
                <td class="thtd"><h3> <font face="Arial">Nombre</font></h3> </td>
                <td class="thtd"><h3> <font face="Arial">Estado</font></h3> </td>
                <td class="thtd"> </td>
        </tr>';

    if ($result = $mysqli->query($query)) {

        
        while ($row = $result->fetch_assoc()) {
            //header("Content-type: image/png"); 
            //echo $row["pro_imagen"];

            $field1name = $row["Cat_ID"];
            $field2name = $row["Cat_Nombre"];
            $field3name = $row["Cat_Estado"];
            if($field3name == '1'){
                $field3name = 'Habilitado';
            }
            if($field3name == '0') {
                $field3name = 'Deshabilitado';
            }
    
            echo '<tr>  
                    <td width="15%" class="filas2"><h5>'.$field1name.'</h5></td> 
                    <td width="25%" class="filas2"><h5>'.$field2name.'</h5></td> 
                    <td width="10%" class="filas2"><h5>'.$field3name.'</h5></td> 
                    <td width="10%" class="filas2"><h5><a href="Categoria.php?Categoria='.$field1name.'"" class="button button5" role="button">Editar</a></h5></td>
                </tr>';
        }
        $result->free();
    } 

    echo '</table>';

    ?>
<?php } ?>
</body>
</html>
<br></br><br>
<head>
    <meta charset="utf=8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../formatos_css/clases.css" media="screen">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
</head>

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