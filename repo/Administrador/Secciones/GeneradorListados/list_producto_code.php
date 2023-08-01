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
if (isset($_SESSION['user_g'])) {
    //echo "hay sesion de administrador"; 

    $user->setUser($userSession->getCurrentUser_g());

    // codigo para conectarse a la base de datos
    // $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
    $con = mysqli_connect('localhost', 'root', '', 'reposteriakos');

    ?>
    <?php
    include("../../../conexion.php");
    $productos = "SELECT * FROM producto
                Order by Pro_Nombre";
        ?>

    <div class=text-center>
        <h4 class="h4t">Listado de Productos</h4>
    </div>

    <div>
        <a href="../GeneradorListados/Generador_ListadosGestor.php" class="button button5" role="button" Style="margin-top:0rem;margin-left:20rem;">Regresar</a>
        <a href="../GeneradorListados/Descargar_Producto.php" class="button button5" role="button"
            Style="margin-top:7rem;margin-bottom:1rem;">Descargar Listado</a>
    </div>



    <table class=bordered4>
        <thead>
            <tr class="abajo">
                <th class="thtd">ID</th>
                <th class="thtd">Nombre</th>
                <th class="thtd">Tipo</th>
                <th class="thtd">Precio</th>
                <th class="thtd">Estado</th>
                <th class="thtd">Descripcion</th>
            </tr>
        </thead>
        <tr>
            <?php
            $sql = "SELECT * from producto";
            $result = mysqli_query($conexion, $productos);
            while ($mostrar = mysqli_fetch_array($result)) {
            ?>
        <tr class="abajo">
            <td class="filas2">
                <?php echo $mostrar['Pro_ID'] ?>
            </td>
            <td class="filas2">
                <?php echo $mostrar['Pro_Nombre'] ?>
            </td>
            <td class="filas2">
                <?php if ($mostrar['Pro_Tipo'] == 1) {
                    echo "Estandar";
                } elseif ($mostrar['Pro_Tipo'] == 0) {
                    echo "Perzonalizado";
                } ?>
            </td>
            <td class="filas2">
                <?php echo $mostrar['Pro_Precio'] ?>
            </td>
            <td class="filas2">
                <?php if ($mostrar['Pro_Estado'] == 1) {
                    echo "Habilitado";
                } elseif ($mostrar['Pro_Estado'] == 0) {
                    echo "Deshabilitado";
                } ?>
            </td>
            <td class="filas2">
                <?php echo $mostrar['Pro_Descripcion'] ?>
            </td>
        </tr>
        <?php
            }
            ?>
        <br><br>
    </table>
<?php } ?>
</body>

</html>
<br></br>
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