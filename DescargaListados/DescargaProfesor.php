<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= listaprofesores.xls");
?>
<meta charset="UTF-8">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formatos_css/clases.css" media="screen">
</head>
<div class="row">
    <div class="col l10 offset-l3">
        <div class=text-center>
            <h4 class="h4t">Listado de Profesores</h4>
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
                $profesor = "SELECT * FROM profesor";
                $result = mysqli_query($conexion, $profesor);
                while ($mostrar = mysqli_fetch_array($result)) {
                ?>
            <tr class="abajo">
                <td>
                    <?php echo $mostrar['Prof_Rut'] ?>
                </td>
                <td>
                    <?php echo $mostrar['Prof_Nom'] ?>
                </td>
                <td>
                    <?php echo $mostrar['Prof_Correo'] ?>
                </td>
            </tr>
            <?php
                }
                ?>
        </table>