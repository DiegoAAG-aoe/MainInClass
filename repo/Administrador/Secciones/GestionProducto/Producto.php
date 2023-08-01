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


$Producto =htmlspecialchars($_GET["Producto"]);

include("../../configuración/bd.php"); 

$query = "  SELECT P.Pro_Imagen,P.Pro_ID, P.Pro_Nombre, P.Pro_Descripcion, C.Cat_Nombre, 
                  P.Pro_Estado, P.Pro_Precio 
            FROM producto P   LEFT JOIN categoria C ON (P.Pro_Categoria=C.Cat_ID) 
            WHERE Pro_ID=$Producto";

if ($result = $mysqli->query($query)) {

    
    if ($row = $result->fetch_assoc()) {
        //header("Content-type: image/png"); 
        //echo $row["pro_imagen"];
        $field0name = $row["Pro_Imagen"];
        $field1name = $row["Pro_ID"];
        $field2name = $row["Pro_Nombre"];
        $field3name = $row["Pro_Descripcion"];
        $field4name = $row["Cat_Nombre"];
        $field5name = $row["Pro_Estado"]; 
        $field6name = $row["Pro_Precio"]; 

        if($field5name == '1'){
            $field5name = 'Habilitado';
        }
        else {
            $field5name = 'Deshabilitado';
        }
    }
}

?>
<table>
<tr>
<td>
<form id="GestionForm" action="Editar_Producto.php" method="POST" enctype="multipart/form-data">


    <div class="card" style="margin-top: 0rem; margin-left:15rem; margin-bottom: 0rem;">

        <div class="card-header">
                Datos del Producto
        </div>

        <div class="card-body">        
 
            <div class = "form-group">
                <label for="txtID">ID</label>
                <?php
                echo '<input type="text" class="form-control" name="txtID" id="txtID" value="'.$Producto.'" ReadOnly>';
                ?>    
            </div>

            <div class = "form-group">
                <label for="txtTitulo">Título</label>
                <?php
                if ($field2name=='')
                    echo '<input type="text" class="form-control" name="txtTitulo" id="txtTitulo" placeholder="Titulo">';
                else
                    echo '<input type="text" class="form-control" name="txtTitulo" id="txtTitulo" value="'.$field2name.'">';
                ?>    
            </div>

            <div class = "form-group">
                <label for="txtPrecio">Precio</label>
                <?php
                if ($field6name=='')
                    echo '<input type="text" class="form-control" name="txtPrecio" id="txtPrecio" placeholder="Precio">';
                else
                    echo '<input type="text" class="form-control" name="txtPrecio" id="txtPrecio" value="'.$field6name.'">';
                ?>    
            </div>

            <div class = "form-group">
                <label for="txtDescripcion">Descripción</label>
                <?php
                if ($field3name=='')
                    echo '<input type="text" class="form-control" name="txtDescripcion" id="txtDescripcion" placeholder="Descripcion">';
                else
                    echo '<input type="text" class="form-control" name="txtDescripcion" id="txtDescripcion" value="'.$field3name.'">';
                ?>  
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
                            

                        if ($field4name==$nomcat)
                            echo '<option selected="selected" value="'.$id.'">'.$nomcat.'</option>';
                        else 
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

            <table>
                <td><div>
                    <button type="submit" class="button button5">Guardar</button>
                    <a href="Gestion_Productos.php" class="button button5" role="button">Cancelar</a>
                </div></td>
            </table>

        </div>

    </div>

</form>
</td>
<?php
echo '<td valign="top" style="padding-left: 5rem;"><img src="../imagen.php?id='.$field1name.'" width="500"></td>';
?>
</tr>

</table>
<br></br>
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
