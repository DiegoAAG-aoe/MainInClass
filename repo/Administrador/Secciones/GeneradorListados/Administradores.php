<body class="bodycat">
<?php include("../../template/Cabecera.php"); ?>
<?php
include_once '../../../includes/user.php';
include_once '../../../includes/user_s.php';

$userSession = new UserSession();
$user = new User();

if (isset($_SESSION['user_g']) || isset($_SESSION['user_a'])) {
      //echo "hay sesion de administrador"; 
      if (isset($_SESSION['user_g'])) {
            $user->setUser($userSession->getCurrentUser_g());
      } else if (isset($_SESSION['user_a'])) {
            $user->setUser($userSession->getCurrentUser_a());
      }

      date_default_timezone_set('UTC');
      $archivo = 'Listado_Administradores';
      $archivo .= date("YmdHis");
      $archivo .= substr(md5(rand(0, PHP_INT_MAX)), 10);

      echo '  <div class=text-center><h4 class="h4t">Listado de Administradores</h4></div>';

      echo '<div>
      <a href="../GeneradorListados/Generador_ListadosAdm.php" class="button button5" role="button" Style="margin-top:0rem;margin-left:20rem;">Regresar</a>
      <a href="Descargar_Archivo.php?Nombre=' . $archivo . '.csv" class="button button5" role="button" Style="margin-top:5rem">Descargar Listado</a>
      </div>
      <br><br><br>';

      include("../../configuración/bd.php");

      $csv_end = "  
";
      $csv_sep = ";";

      $texto1 = "ID; Nombre; Correo; Cargo; Estado" . $csv_end;

      $query = "  SELECT  A.Adm_ID, A.Adm_Correo, A.Adm_Nombre, A.Adm_Apellido,
                    A.Adm_Estado, C.Car_Nombre 
            FROM administrador A LEFT JOIN Cargo C ON (A.Adm_Cargo=C.Car_ID)
            Order by A.Adm_Nombre";

      echo '<table width="100%" class=bordered> 
      <tr> 
            <td class="thtd"> <font face="Arial"><h3>ID</h3></font></td>
            <td class="thtd"> <font face="Arial"><h3>Nombre</h3></font> </td>
            <td class="thtd"> <font face="Arial"><h3>Correo</h3></font> </td>
            <td class="thtd"> <font face="Arial"><h3>Cargo</h3></font> </td>
            <td class="thtd"> <font face="Arial"><h3>Estado</h3></font> </td>
      </tr>';

      if ($result = $mysqli->query($query)) {


            while ($row = $result->fetch_assoc()) {
                  //header("Content-type: image/png"); 
                  //echo $row["pro_imagen"];

                  $field1name = $row["Adm_ID"];
                  $field2name = $row["Adm_Correo"];
                  $field3name = $row["Adm_Nombre"];
                  $field4name = $row["Adm_Apellido"];
                  $field5name = $row["Adm_Estado"];
                  $field6name = $row["Car_Nombre"];

                  if ($field5name == '1') {
                        $field45ame = 'Habilitado';
                  } else {
                        $field5name = 'Deshabilitado';
                  }

                  $texto1 .= $field1name . $csv_sep . $field3name . ' ' . $field4name . $csv_sep . $field4name . $csv_sep . $field6name . $csv_sep . $field5name . $csv_end;

                  echo '<tr>  
                <td width="10%" class="filas2">' . $field1name . '</td>
                <td width="30%" class="filas2">' . $field3name . ' ' . $field4name . '</td> 
                <td width="30%" class="filas2">' . $field2name . '</td>
                <td width="30%" class="filas2">' . $field6name . '</td> 
                <td width="15%" class="filas2">' . $field5name . '</td>
              </tr>';
            }
            $result->free();
      }

      echo '</table>';
      $carpeta = glob('./Archivos/*');
      foreach ($carpeta as $archivo2) {
            if (is_file($archivo2))
                  if (!fnmatch("./Archivos/Listado_Administradores" . date("Ymd") . "*.csv", $archivo2)) {
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

