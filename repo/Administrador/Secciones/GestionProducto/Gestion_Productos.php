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




if (isset($_GET["res"])) {
    $res = htmlspecialchars($_GET["res"]);

    if ($res == 1) {
        echo '<script language="javascript">alert("Elemento Modificado con Exito");</script>';
    }
    if ($res == 0) {
        echo '<script language="javascript">alert("Hubo un error, no se puedo modificar el elemento");</script>';
    }
    if ($res == 2) {
        echo '<script language="javascript">alert("La extensión no es correcta. Se permiten archivos .png o .jpg.");</script>';
    }
    if ($res == 3) {
        echo '<script language="javascript">alert("El tamaño de los archivos no es correcta. Se permiten archivos de 85 Kb máximo.");</script>';
    }
    if($res == 4){
        echo '<script language="javascript">alert("Le faltó ingresar datos");</script>';

    }

}

?>

<div>
    <a href="Agregar_Productos.php" class="button button5" role="button"
        Style="margin-top:5rem;margin-left:20rem;">Agregar Nuevo Producto</a>
</div>
<br><br><br>

<?php
include("../../configuración/bd.php");


if (isset($_SESSION['user_g'])) {
    //echo "hay sesion de administrador"; 
    $user->setUser($userSession->getCurrentUser_g());

    $query = "  SELECT P.Pro_Imagen,P.Pro_ID, P.Pro_Nombre, P.Pro_Descripcion, C.Cat_Nombre, 
                    P.Pro_Estado, P.Pro_Precio 
                FROM producto P   LEFT JOIN categoria C ON (P.Pro_Categoria=C.Cat_ID) 
                order by Pro_Nombre ";
    echo '  <div class=text-center><h4 class="h4t">Gestión de Productos</h4></div>';
    echo '<table width="100%" class=bordered4> 
        <tr> 
                <td class="thtd"> <font face="Arial">Imagen</font> </td>
                <td class="thtd"> <font face="Arial">Titulo</font> </td>
                <td class="thtd"> <font face="Arial">Descripcion</font> </td>
                <td class="thtd"> <font face="Arial">Categoria</font> </td>
                <td class="thtd"> <font face="Arial">Estado</font> </td>
                <td class="thtd"> <font face="Arial">Precio</font> </td>
                <td class="thtd"> </td>
        </tr>';

    if ($result = $mysqli->query($query)) {


        while ($row = $result->fetch_assoc()) {
            //header("Content-type: image/png"); 
            //echo $row["pro_imagen"];

            $field0name = $row["Pro_Imagen"];
            $field1name = $row["Pro_ID"];
            $field2name = $row["Pro_Nombre"];
            $field3name = $row["Pro_Descripcion"];
            $field4name = $row["Cat_Nombre"];
            $field5name = $row["Pro_Estado"];
            $field6name = $row["Pro_Precio"];

            if ($field5name == '1') {
                $field5name = 'Habilitado';
            } else {
                $field5name = 'Deshabilitado';
            }

            echo '<tr>  
                    <td width="10%" class="filas2"><img src="../imagen.php?id=' . $field1name . '" width="50%" ></td>
                    <td width="25%" class="filas2">' . $field2name . '</td> 
                    <td width="40%" class="filas2" Style="padding-bottom:1rem;">' . $field3name . '</td> 
                    <td width="11%" class="filas2" Style="padding-left:1rem;">' . $field4name . '</td> 
                    <td width="30%" class="filas2">' . $field5name . '</td> 
                    <td width="20%" class="filas2">' . $field6name . '</td>
                    <td width="8%" Style="padding-bottom:1rem;"><a href="Producto.php?Producto=' . $field1name . '"" class="button button5" role="button" style="margin-left:2rem;">Editar</a></td>
                </tr>';
        }
        $result->free();
    }

    echo '</table>';
}


?>
<br></br>

</div>
</div>

</body>

</html>

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