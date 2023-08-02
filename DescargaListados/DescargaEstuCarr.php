<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= listaestucarr.xls");
?>
<meta charset="UTF-8">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formatos_css/clases.css" media="screen">
</head>
<div class="row">
    <div class="col l10 offset-l3">
        <div class=text-center>
            <h4 class="h4t">Listado de Estudiantes por Carrera</h4>
        </div>
        <br><br>
        <table class=bordered rules=rows>
            <thead>
                <tr class="abajo">
                    <th>Código Carrera</th>
                    <th>Nombre Carrera</th>
                    <th>Rut Estudiante</th>
                    <th>Nombre Estudiante</th>
                    <th>Correo Estudiante</th>
                </tr>
            </thead>
            <tr>
                <?php
                include("../conexion.php");
                $jefec = "SELECT Cr_Carrera, Carr_Nombre, Es_Rut, Es_Nombre, Es_Correo
                FROM estcarre 
                INNER JOIN estudiante Es_Rut ON Cr_Estudiante = Es_Rut
                INNER JOIN carrera Carr_ID ON Cr_Carrera = Carr_ID
              ";
                $result = mysqli_query($conexion, $jefec);
                while ($mostrar = mysqli_fetch_array($result)) {
                    ?>
                <tr class="abajo">
                    <td>
                        <?php echo $mostrar['Cr_Carrera'] ?>
                    </td>
                    <td>
                        <?php echo $mostrar['Carr_Nombre'] ?>
                    </td>
                    <td>
                        <?php echo $mostrar['Es_Rut'] ?>
                    </td>
                    <td>
                        <?php echo $mostrar['Es_Nombre'] ?>
                    </td>
                    <td>
                        <?php echo $mostrar['Es_Correo'] ?>
                    </td>
                </tr>
                <?php
                }
                ?>
        </table>