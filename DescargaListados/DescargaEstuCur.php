<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= listaestucurso.xls");
?>
<meta charset="UTF-8">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formatos_css/clases.css" media="screen">
</head>
<div class="row">
    <div class="col l10 offset-l3">
        <div class=text-center>
            <h4 class="h4t">Listado de Estudiantes por Curso</h4>
        </div>
        <br><br>
        <table class=bordered rules=rows>
            <thead>
                <tr class="abajo">
                    <th>Asignatura</th>
                    <th>Tipo_Curso</th>
                    <th>Seccion</th>
                    <th>Periodo</th>
                    <th>Rut_Estudiante</th>
                    <th>Nombre_Estudiante</th>
                    <th>Correo</th>
                </tr>
            </thead>
            <tr>
                <?php
                include("../conexion.php");
                $jefec = "SELECT Cur_Asignatura, Cur_Tipo, Cur_Secc, Cur_Periodo, Ins_Rut, Es_Nombre, Es_Correo 
                FROM curso
                INNER JOIN
                inscrito Ins_Rut ON Cur_Asignatura = Ins_Asignatura
                AND Cur_Tipo = Ins_Tipo
                AND Cur_Secc = Ins_Secc
                AND Cur_Periodo = Ins_Periodo
              INNER JOIN
                estudiante Es_Rut ON Ins_Rut = Es_Rut
              
              ";
                $result = mysqli_query($conexion, $jefec);
                while ($mostrar = mysqli_fetch_array($result)) {
                ?>
            <tr class="abajo">
                <td>
                    <?php echo $mostrar['Cur_Asignatura'] ?>
                </td>
                <td>
                    <?php echo $mostrar['Cur_Tipo'] ?>
                </td>
                <td>
                    <?php echo $mostrar['Cur_Secc'] ?>
                </td>
                <td>
                    <?php echo $mostrar['Cur_Periodo'] ?>
                </td>
                <td>
                    <?php echo $mostrar['Ins_Rut'] ?>
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