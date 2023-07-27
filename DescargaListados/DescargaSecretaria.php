<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= listasecretariac.xls");
?>
<meta charset="UTF-8">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formatos_css/clases.css" media="screen">
</head>
<div class="row">
    <div class="col l10 offset-l3">
        <div class=text-center>
            <h4 class="h4t">Listado de Secretarias de Carrera</h4>
        </div>
        <br><br>
        <table class=bordered rules=rows>
            <thead>
                <tr class="abajo">
                    <th>RUT</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                </tr>
            </thead>
            <tr>
                <?php
                include("../conexion.php");
                $secretariac = "SELECT * FROM secretariac";
                $result = mysqli_query($conexion, $secretariac);
                while ($mostrar = mysqli_fetch_array($result)) {
                ?>
            <tr class="abajo">
                <td>
                    <?php echo $mostrar['Sc_Rut'] ?>
                </td>
                <td>
                    <?php echo $mostrar['Sc_Nombre'] ?>
                </td>
                <td>
                    <?php echo $mostrar['Sc_Correo'] ?>
                </td>
            </tr>
            <?php
                }
                ?>
        </table>