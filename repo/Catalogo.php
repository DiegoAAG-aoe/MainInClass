<?php include("Template/Cabecera.php"); 
if ( isset($_GET["res"])){
    $res =htmlspecialchars($_GET["res"]);
    
    if($res==1) {
        echo '<script language="javascript">alert("¡El Producto fue agregado al carrito de forma exitosa!");</script>';
    } 
    if($res==0) {
        echo '<script language="javascript">alert("Debe iniciar sesion");</script>';
    }
    if($res==2) {
        echo '<script language="javascript">alert("¡Su pedido ha sido entregado con exito a Delicias Infinity!");</script>';
    }
}
?>
<div class="container">
    <br />
    <div class="row">
        <div class="jumbotron">
            <h1 class="display-3">Catálogo</h1>
            <p class="lead">Revisa nuestras delicias!</p>
            <hr class="my-2">
        </div>

        <head>
            <meta charset="utf=8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title> Inicio Usuario</title>
            <link rel="stylesheet" href="formatos_css/clases.css" media="screen">
            <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
        </head>

        <body class="bodycat">
            <?php

    $Categoria = 0;
    $Precio = '';

    if (isset($_POST['txtCategorias'])) {
        $Categoria = $_POST['txtCategorias'];
    }
    if (isset($_POST['txtPrecio'])) {
        $Precio = $_POST['txtPrecio'];
    }
    include("Administrador/configuración/bd.php");

    echo '<form id="GestionForm" method="POST">';

    $query = "  SELECT  C.Cat_ID, C.Cat_Nombre 
                FROM Categoria C
                WHERE C.Cat_Estado='1' ORDER BY C.Cat_Nombre";
    echo ' <table width="80%" class = "form-group">';
    if ($result = $mysqli->query($query)) {

        echo '<tr><td width="40%"><div>
            <label for="txtCategorias">Categorias</label>
        </div>
        <select type="text" class="form-control" name="txtCategorias" id="txtCategorias" placeholder="Categorias">
            <option selected="selected" value="0">Por Defecto</option>';
        while ($row = $result->fetch_assoc()) {

            $field0name = $row["Cat_ID"];
            $field1name = $row["Cat_Nombre"];

            echo '<option value="' . $field0name . '">' . $field1name . '</option>';

        }
        $result->free();
        echo '</select></td>';
    }

    echo '<td width="40%" class="form-group"><div class = "form-group">
        <label for="txtPrecio">Precio</label>';
    echo '<input type="text" class="form-control" name="txtPrecio" id="txtPrecio" placeholder="Escribe aqui..">';
    echo '</div></td>
      <td><button type="submit" class="button button5" style="margin-left:2rem;">Filtrar</button>
      </td>
      </tr>
  </table> ';


    echo '</form>';


    if ($Categoria == 0 && $Precio == '') {

        $query1 = "  SELECT  P.Pro_Imagen,P.Pro_ID, P.Pro_Nombre, P.Pro_Precio 
                FROM producto P 
                WHERE P.Pro_Estado='1' ORDER BY P.Pro_Nombre";
    } else {
        if ($Precio == '') {
            $query1 = "  SELECT  P.Pro_Imagen,P.Pro_ID, P.Pro_Nombre, P.Pro_Precio 
                    FROM producto P 
                    WHERE P.Pro_Estado='1' AND Pro_Categoria=".$Categoria." ORDER BY P.Pro_Nombre";
        } else {
            if ($Categoria == 0) {
                $query1 = "  SELECT  P.Pro_Imagen,P.Pro_ID, P.Pro_Nombre, P.Pro_Precio 
                        FROM producto P 
                        WHERE P.Pro_Estado='1' AND Pro_Precio<=" . $Precio." ORDER BY P.Pro_Nombre";
            } else {
                $query1 = "  SELECT  P.Pro_Imagen,P.Pro_ID, P.Pro_Nombre, P.Pro_Precio 
                        FROM producto P 
                        WHERE P.Pro_Estado='1' AND Pro_Categoria=" . $Categoria . " AND Pro_Precio<=" . $Precio." ORDER BY P.Pro_Nombre";
            }
        }
    }

    if ($result = $mysqli->query($query1)) {

        while ($row = $result->fetch_assoc()) {

            $field0name = $row["Pro_Imagen"];
            $field1name = $row["Pro_ID"];
            $field2name = $row["Pro_Nombre"];
            $field3name = $row["Pro_Precio"];

            echo '<div class="col-md-3">
                <div class="card">
                    <img class="card-img-top" src="imagen1.php?id=' . $field1name . '" width="225" height="200">  
                    <div class="card-body">
                        <h3 class="card-title">' . $field2name . '</h3>
                        <h4 class="card-description">' . $field3name . '</h4>
                        <a name="" id="" class="button4"  href="./Producto.php?producto=' . $field1name . '" role="button"> Ver más</a> 
                    </div>
                </div>
             </div>';
        }
        $result->free();
    }


    ?>

        </body>
        <?php include("template/Pie.php"); ?>
        <footer class="pie-pagina">
            <div class="grupo-1">
                <div class="box">
                    <figure>
                        <a href="#">
                            <img src="imagenes/8.png" alt="Logo de Reposteriakos">
                        </a>
                    </figure>
                </div>
                <div class="box">
                    <h2>SOBRE NOSOTROS</h2>
                    <p>¡Hola! Comenzamos nuestra tienda de repostería junto a mi mamá, durante la pandemia y nos encantó
                        tanto
                        que deseamos continuar.</p>
                    <p>Si quieres algún dulcecito, te prometemos que lo prepararemos con todo el amor y dedicación del
                        mundo.
                    </p>
                </div>
                <div class="box">
                    <h2>SIGUENOS</h2>
                    <div class="red-social">
                        <a href="https://www.facebook.com/profile.php?id=100063171552620" class="fa fa-facebook"></a>
                        <a href="https://www.instagram.com/delicias_infinity/" class="fa fa-instagram"></a>
                    </div>
                </div>
            </div>
            <div class="grupo-2">
                <small><b>Delicias Infinity</b> &copy; - Todos los Derechos reservados</small>
            </div>
        </footer>