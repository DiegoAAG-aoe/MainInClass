<?php
include_once '../../../includes/user.php';
include_once '../../../includes/user_s.php';

$userSession = new UserSession();
$user = new User();

if (isset($_SESSION['user_g'])) {
    //echo "hay sesion de administrador"; 
    $user->setUser($userSession->getCurrentUser_g());
   
    date_default_timezone_set('America/Santiago');
    $fecha = date('d-m-y h:i:s');
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename= Listado de Productos ".$fecha." .xls");
    ?>
    <meta charset="UTF-8">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="formatos_css/clases.css" media="screen">
    </head>
    <div class="row">
        <div class="col l10 offset-l3">
            <div class=text-center>
                <h4 class="h4t">Listado de Productos</h4>
            </div>
            <br><br>
            <table class=bordered rules=rows>
                <thead>
                    <tr class="abajo">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Precio</th>
                        <th>Estado</th>
                        <th>Descripcion</th>
                    </tr>
                </thead>
                <tr>
                    <?php
                    include("../../../conexion.php");
                    $productos = "SELECT * FROM producto";
                    $result = mysqli_query($conexion, $productos);
                    while ($mostrar = mysqli_fetch_array($result)) {
                    ?>
                <tr class="abajo">
                    <td>
                        <?php echo $mostrar['Pro_ID'] ?>
                    </td>
                    <td>
                        <?php echo $mostrar['Pro_Nombre'] ?>
                    </td>
                    <td>
                        <?php if ($mostrar['Pro_Tipo'] == 1) {
                            echo "Estandar";
                        } elseif ($mostrar['Pro_Tipo'] == 0) {
                            echo "Perzonalizado";
                        } ?>
                    </td>
                    <td>
                        <?php echo $mostrar['Pro_Precio'] ?>
                    </td>
                    <td>
                        <?php if ($mostrar['Pro_Estado'] == 1) {
                            echo "Habilitado";
                        } elseif ($mostrar['Pro_Estado'] == 0) {
                            echo "Deshabilitado";
                        } ?>
                    </td>
                    <td>
                        <?php echo $mostrar['Pro_Descripcion'] ?>
                    </td>
                </tr>
                <?php
                    }
}
                ?>
        </table>