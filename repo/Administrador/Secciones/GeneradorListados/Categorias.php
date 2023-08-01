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
} ?>
<?php
if (isset($_SESSION['user_g']) || isset($_SESSION['user_a'])) {
    //echo "hay sesion de administrador"; 
    if (isset($_SESSION['user_g'])) {
        $user->setUser($userSession->getCurrentUser_g());
    } else if (isset($_SESSION['user_a'])) {
        $user->setUser($userSession->getCurrentUser_a());
    }
    date_default_timezone_set('UTC');
    $archivo = 'Listado_Categorias';
    $archivo .= date("YmdHis");
    $archivo .= substr(md5(rand(0, PHP_INT_MAX)), 10);

    echo '  <div class=text-center><h4 class="h4t">Listado de Categorias</h4></div>';

    echo '<div>';

    if (isset($_SESSION['user_g'])) {


        echo '<a href="../GeneradorListados/Generador_ListadosGestor.php" class="button button5" role="button" Style="margin-top:0rem;margin-left:20rem;">Regresar</a>';
        echo '<a href="Descargar_Archivo.php?Nombre=' . $archivo . '.csv" class="button button5" role="button" Style="margin-top:5rem;margin-bottom:1rem;margin-left:4px;">Descargar Listado</a>';

    } else if (isset($_SESSION['user_a'])) {

        echo '<a href="../GeneradorListados/Generador_ListadosAdm.php" class="button button5" role="button" Style="margin-top:0rem;margin-left:20rem;">Regresar</a>';
        echo '<a href="Descargar_Archivo.php?Nombre=' . $archivo . '.csv" class="button button5" role="button" Style="margin-top:5rem;margin-bottom:1rem;margin-left:4px;">Descargar Listado</a>';

    }
    ?>
    </div>


    <?php
    include("../../configuración/bd.php");

    $query = "  SELECT * FROM categoria
            Order by Cat_Nombre";

    $csv_end = "  
";
    $csv_sep = ";";

    $texto1 = "ID; Nombre; Estado;" . $csv_end;

    echo '<table width="100%" class=bordered> 
      <tr> 
            <td class="thtd"> <font face="Arial"><h3>ID</h3></font></td>
            <td class="thtd"> <font face="Arial"><h3>Nombre</h3></font> </td>
            <td class="thtd"> <font face="Arial"><h3>Estado</h3></font> </td>
      </tr>';

    if ($result = $mysqli->query($query)) {


        while ($row = $result->fetch_assoc()) {
            //header("Content-type: image/png"); 
            //echo $row["pro_imagen"];

            $field1name = $row["Cat_ID"];
            $field2name = $row["Cat_Nombre"];
            $field3name = $row["Cat_Estado"];

            if ($field3name == '1') {
                $field3name = 'Habilitado';
            } else {
                $field3name = 'Deshabilitado';
            }

            $texto1 .= $field1name . $csv_sep . $field2name . $csv_sep . $field3name . $csv_end;

            echo '<tr >  
                <td width="15%" class="filas2"><h5>' . $field1name . '</h5></td>
                <td width="15%" class="filas2"><h5>' . $field2name . '</h5></td> 
                <td width="30%" class="filas2"><h5>' . $field3name . '</h5></td> 
              </tr>';
        }
        $result->free();
    }

    echo '</table>';
    $carpeta = glob('./Archivos/*');
    foreach ($carpeta as $archivo2) {
        if (is_file($archivo2))
            if (!fnmatch("./Archivos/Listado_Categorias" . date("Ymd") . "*.csv", $archivo2)) {
                unlink($archivo2);
            }
    }
    $fh = fopen("./Archivos/$archivo.csv", 'w')
        or die("Se produjo un error al crear el archivo");

    if (fwrite($fh, utf8_decode($texto1)) === FALSE) {
        echo "Se produjo un error al crear el archivo";
        exit;
    }

    fclose($fh);
}
?>

</body>
</html>
<br></br><br></br><br></br><br></br>
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