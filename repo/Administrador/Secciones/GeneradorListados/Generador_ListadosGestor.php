<body class="bodycat">
<?php include("../../template/CabeceraGestor.php"); 
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
    ?>
    <div class=text-center><h4 class="h4t">Generador de Listados</h4></div>
    <br></br>

    <table width="100%">
        <tr><td><h3><a class="nav-item nav-link" href="Categorias.php";?>Listado de Categorias</a></h3></td></tr>
        <tr><td><h3><a class="nav-item nav-link" href="list_producto_code.php";?>Listado de Productos</a></h3></td></tr>
    </table>
<?php } ?>
</body>
</html>
<br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br>
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