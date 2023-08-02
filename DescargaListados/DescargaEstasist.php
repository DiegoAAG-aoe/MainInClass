<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= listaestasist.xls");
?>
<meta charset="UTF-8">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formatos_css/clases.css" media="screen">
</head>
<div class="row">
    <div class="col l10 offset-l3">
        <div class=text-center>
            <h4 class="h4t">Listado de EstAsist</h4>
        </div>
        <br><br>
        <table class=bordered rules=rows>
            <thead>
                <tr class="abajo">
                    <th>RUT</th>
                    <th>Asistencia</th>
                    <th>Asignatura</th>
                    <th>Tipo</th>
                    <th>Seccion</th>
                    <th>Periodo</th>
                    <th>EstadoEstu</th>
                    <th>Asiste</th>
                </tr>
            </thead>
            <tr>
                <?php
                include("../conexion.php");
                $jefec = "SELECT * FROM estasist";
                $result = mysqli_query($conexion, $jefec);
                while ($mostrar = mysqli_fetch_array($result)) {
                ?>
            <tr class="abajo">
                <td>
                    <?php echo $mostrar['Est_Rut'] ?>
                </td>
                <td>
                    <?php echo $mostrar['Est_Asistencia'] ?>
                </td>
                <td>
                    <?php echo $mostrar['Est_Asignatura'] ?>
                </td>
                <td>
                    <?php echo $mostrar['Est_Tipo'] ?>
                </td>
                <td>
                    <?php echo $mostrar['Est_Secc'] ?>
                </td>
                <td>
                    <?php echo $mostrar['Est_Periodo'] ?>
                </td>
                <td>
                    <?php echo $mostrar['Est_EstadoEstu'] ?>
                </td>
                <td>
                    <?php echo $mostrar['Est_Asiste'] ?>
                </td>
            </tr>
            <?php
                }
                ?>
        </table>