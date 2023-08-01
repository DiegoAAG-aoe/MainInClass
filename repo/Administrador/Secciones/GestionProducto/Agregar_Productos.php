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
if (isset($_GET["res"])) {
    $res = htmlspecialchars($_GET["res"]);

    if ($res == 4) {
        echo '<script language="javascript">alert("Le faltó ingresar datos");</script>';
    }
}    
include("../../configuración/bd.php");


if (isset($_SESSION['user_g'])) {
    //echo "hay sesion de administrador"; 
    $user->setUser($userSession->getCurrentUser_g());
?>

    <form id="GestionForm" action="Insertar_Producto.php" method="POST" enctype="multipart/form-data">
        <div class="col-md-5" style="margin-top: 5rem; margin-left:35rem; margin-bottom: 5rem;">

            <div class="card">

            <div class="card-header">
                    Agregar nuevo Producto
                </div>

                <div class="card-body">
                    
                <form method="POST" enctype="multipart/form-data">

                <div class = "form-group">
                    <label for="txtTitulo">Título</label>
                    <input type="text" class="form-control" name="txtTitulo" id="txtTitulo" placeholder="Titulo">
                </div>

                <div class = "form-group">
                    <label for="txtPrecio">Precio</label>
                    <input type="text" class="form-control" name="txtPrecio" id="txtPrecio" placeholder="Precio">
                </div>

                <div class = "form-group">
                    <label for="txtDescripcion">Descripción</label>
                    <input type="text" class="form-control" name="txtDescripcion" id="txtDescripcion" placeholder="Descripcion">
                </div>

                <?php
                        $query = "  SELECT  C.Cat_ID, C.Cat_Nombre 
                            FROM Categoria C
                            WHERE C.Cat_Estado='1'";
                        if ($result = $mysqli->query($query)) {
                        
                            echo '<div class = "form-group" >
                                    <label for="txtCategorias">Categorias</label>
                                
                                <select type="text" class="form-control" name="txtCategorias" id="txtCategorias" placeholder="Categorias">';
                            while ($row = $result->fetch_assoc()) {

                                $id = $row["Cat_ID"];
                                $nomcat = $row["Cat_Nombre"];
                                    
                                echo '<option value="'.$id.'">'.$nomcat.'</option>';

                            }
                            $result->free();
                            echo '</select>
                            </div>';
                        } 
                ?> 

                <div class = "form-group">
                    <label for="txtEstado">Estado</label>
                    <select type="text" class="form-control" name="txtEstado" id="txtEstado" placeholder="Estado">  
                        <option value="1">Disponible</option>}  
                        <option value="0">No Disponible</option>  
                    </select> 
                </div>

                <div class = "form-group">
                    <label for="txtImagen">Imagen</label>
                    <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Imagen">
                </div>
                
                <div>
                    <button type="submit" name="accion" value="Agregar" class="button button5">Agregar</button>
                    <a href="Gestion_Productos.php" class="button button5" role="button">Cancelar</a>
                </div>
        
                </form>

                </div>

            </div>
            

        </div>
    </form>
<?php }?>
</body>
</html>
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