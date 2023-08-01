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
 ?>


    <?php 
    $txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
    $txtEstado=(isset($_POST['txtEstado']))?$_POST['txtEstado']:"";
    $Accion=(isset($_POST['accion']))?$_POST['accion']:"";

    include("../../configuración/bd.php"); 

    $sql = "INSERT INTO Categoria (Cat_Nombre,Cat_Estado) 
            VALUES ('$txtNombre', $txtEstado)";

    if ($Accion=='Agregar'){
        mysqli_query($mysqli, $sql);
        header("Location: Mantencion_Categoria.php", TRUE, 301);
        exit();
    }

    ?>


    <div class="col-md-5" style="margin-top: 5rem; margin-left:35rem; margin-bottom: 5rem;">

        <div class="card">

        <div class="card-header">
                Agregar una nueva Categoría
            </div>

            <div class="card-body">
                
            <form method="POST" enctype="multipart/form-data">

            <div class = "form-group">
                <label for="txtTitulo">Nombre</label>
                <input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Nombre">
            </div>

            <div class = "form-group">
                <label for="txtEstado">Estado</label>
                <select type="text" class="form-control" name="txtEstado" id="txtEstado" placeholder="Estado">  
                    <option value="1">Habilitado</option>}  
                    <option value="0">Deshabilitado</option>  
                </select> 
            </div>
            
            <div>
                <button type="submit" name="accion" value="Agregar" class="button button5">Agregar</button>
                <a href="./Mantencion_Categoria.php" class="button button5" role="button">Cancelar</a>
            </div>
    
            </form>

            </div>

        </div>
        

    </div>
    <br>
<?php } ?>
</body>
</html>
</br><br></br><br></br><br></br><br>
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