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

if (isset($_SESSION['user_g']) || isset($_SESSION['user_a'])) {
    //echo "hay sesion de administrador"; 
    if (isset($_SESSION['user_g'])) {
        $user->setUser($userSession->getCurrentUser_g());
    } else if (isset($_SESSION['user_a'])) {
        $user->setUser($userSession->getCurrentUser_a());
    }

    $field2name = NULL;
    $Cargo = htmlspecialchars($_GET["Cargo"]);

    include("../../configuración/bd.php");

    $query = "  SELECT C.Car_Nombre, C.Car_Estado
                FROM Cargo C
                WHERE C.Car_ID=.$Cargo
                Order by C.Car_Nombre";
    if ($result = $mysqli->query($query)) {

        if ($row = $result->fetch_assoc()) {

            $field2name = $row["Car_Nombre"];
            $field3name = $row["Car_Estado"];
        }
    }
    ?>
    <form id="GestionForm" action="./Editar_Cargo.php" method="POST" enctype="multipart/form-data">


        <div class="card"
            style="margin-top: 5rem; margin-left:30rem; margin-bottom: 5rem; padding-right: 2rem; margin-right: 30rem; padding-left: 0rem;">

            <div class="card-header">
                Editar Cargo
            </div>

            <div class="card-body">

                <div class="form-group">
                    <label for="txtID">ID</label>
                    <?php
                    echo '<input type="text" class="form-control" name="txtID" id="txtID" value="' . $Cargo . '" ReadOnly>';
                    ?>
                </div>

                <div class="form-group">
                    <label for="txtNombre">Nombre</label>
                    <?php
                    if ($field2name == '') {
                        echo '<input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Nombre">';
                    } else {
                        echo '<input type="text" class="form-control" name="txtNombre" id="txtNombre" value="' . $field2name . '">';
                    }
                    ?>
                </div>


                <div class="form-group">
                    <label for="txtEstado">Estado</label>
                    <select type="text" class="form-control" name="txtEstado" id="txtEstado" placeholder="Estado">
                        <?php
                        if ($field3name == '1') {
                            echo '<option selected="selected" value="1">Habilitado</option>';
                        } else {
                            echo '<option value="1">Habilitado</option>';
                        }
                        if ($field3name == '0') {
                            echo '<option selected="selected" value="0">Deshabilitado</option>';
                        } else {
                            echo '<option value="0">Deshabilitado</option>';
                        }
                        ?>
                    </select>
                </div>


                <table>
                    <td>
                        <div>
                            <button type="submit" class="button button5">Guardar</button>
                        
                            <a href="./Mantencion_Cargo.php" class="button button5" role="button">Cancelar</a>
                        </div>
                    </td>


                </table>

            </div>

        </div>

    </form>
    <br>
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