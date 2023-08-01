<body class="bodycat">
<?php include("Template/Cabecera.php"); ?>

<?php
include("Administrador/configuración/bd.php");
if (isset($_GET["res"])) {
    $res = htmlspecialchars($_GET["res"]);

    if ($res == 1) {
        echo '<script language="javascript">alert("¡El Producto fue agregado al carrito de forma exitosa!");</script>';
    }
    if ($res == 0) {
        echo '<script language="javascript">alert("Debe iniciar sesion para agregar productos al carrito");</script>';
    }
}
$Producto = htmlspecialchars($_GET["producto"]);

$query = "  SELECT P.Pro_ID, P.Pro_Nombre, P.Pro_Descripcion, P.Pro_Precio, P.Pro_Tipo, P.Pro_Categoria
            FROM producto P  
            WHERE Pro_ID=$Producto";

if ($result = $mysqli->query($query)) {

    if ($row = $result->fetch_assoc()) {
        $field0name = $row["Pro_ID"];
        $field1name = $row["Pro_Nombre"];
        $field2name = $row["Pro_Descripcion"];
        $field3name = $row["Pro_Precio"];
        $field4name = $row["Pro_Tipo"];
        $field5name = $row["Pro_Categoria"];

    }
}

if ($field4name == 1) {

    echo '<box>';

    echo '<table>
        <tr>
            <td>
                <box>
                    <img src="imagen1.php?id=' . $Producto . '" width="450rem" height="450rem" style="margin-top:4px;">
                </box>
            </td>

            <td>
                <div class="borderedt">
                    <h1 class="text-color">Información del Producto</h1>
                </div>

                <table class="borderedt">
                    <tr>
                        <td><h3 class="text-color2">Nombre del Producto:</h3></td>
                        <td><h5 class="text-color2">' . $field1name . '</h5></td>
                    </tr>
                    <tr>
                        <td><h3 class="text-color2">Precio:</h3></td>
                        <td><h5 class="text-color2">' . $field3name . '</h5></td>
                    </tr>
                    <tr>
                        <td><h3 class="text-color2">Descripción:</h3></td>
                        <td><h5 class="text-color2">' . $field2name . '</h5></td>
                    </tr>
                </table>

                <box >

                    <form action="agregar_al_carrito.php" method="POST" class="formproducto2">
                        <input type="hidden" name="Pro_Tipo" value="' . $field4name . '">
                        <input type="hidden" name="Pro_ID" value="' . $field0name . '">
                        <label for="txtMensaje">Mensaje</label>
                        <input type="text" class="form-control" name="txtMensaje" id="txtMensaje" placeholder="Mensaje">
                        <br></br>
                        <a href="Catalogo.php" class="button button5" role="button">Regresar</a>
                        <button class="button button5">
                            <i class="fa fa-cart-plus"></i>&nbsp;Agregar al carrito
                        </button>
                    </form>
                </box>

            </td>
        </tr>
    </table>
</box>';
}

if ($field4name == 0) {

    if ($field5name == 1) {
        echo '<box>
            <table>
                <tr>
                    <td>
                        <box>
                            <img src="imagen1.php?id=' . $Producto . '" width="450rem" height="430rem" style="margin-top:4px;">
                        </box>
                    </td>
                    <td>
                        <div class="borderedt">
                            <h1 class="text-color">Información del Producto</h1>
                        </div>

                        <table class="borderedt">
                            <tr>
                                <td><h3 class="text-color2">Nombre del Producto:</h3></td>
                                <td><h5 class="text-color2">' . $field1name . '</h5></td>
                            </tr>
                            <tr>
                                <td><h3 class="text-color2">Precio:</h3></td>
                                <td><h5 class="text-color2">' . $field3name . '</h5></td>
                            </tr>
                            <tr>
                                <td><h3 class="text-color2">Descripción:</h3></td>
                                <td><h5 class="text-color2">' . $field2name . '</h5></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <form id="GestionForm" action="agregar_al_carrito.php" method="POST" enctype="multipart/form-data" class="formproducto">
            <div><h1 class="text-color3">Personalice su producto</h1></div>
                <table class="borderedd">
                    <tr class="borderedd">
                        <td class="borderedd">
                            <input type="hidden" name="Pro_ID" value="' . $field0name . '">
                            <input type="hidden" name="Pro_Tipo" value="' . $field4name . '">
                            <input type="hidden" name="Pro_Cat" value="' . $field5name . '">
                            <label for="txtColorTorta">Color de la Torta</label>
                            <select type="text" class="form-control" name="txtColorTorta" id="txtColorTorta" placeholder="ColorTorta">  
                                <option value="Blanco">Blanco</option>  
                                <option value="Azul">Azul</option>  
                                <option value="Rojo">Rojo</option>
                                <option value="Amarillo">Amarillo</option>
                                <option value="Celeste">Celeste</option>
                                <option value="Rosa">Rosa</option>
                                <option value="Naranja">Naranja</option>
                                <option value="Verde">Verde</option> 
                                <option value="Morado">Morado</option> 
                                <option value="Negro">Negro</option> 
                            </select> 
                        </td>
                        <td class="borderedd">
                            <label for="txtRelleno">Relleno</label>
                            <select type="text" class="form-control" name="txtRelleno" id="txtRelleno" placeholder="Relleno">  
                                <option value="Frutillas">Frutillas</option>  
                                <option value="Duraznos">Duraznos</option>  
                                <option value="Almendras">Almendras</option>
                                <option value="Nueces">Nueces</option>
                                <option value="Manjar">Manjar</option>
                                <option value="Crema">Crema</option>
                                <option value="Pastelera">Pastelera</option>
                            </select> 
                        </td>
                        <td class="borderedd">
                            <label for="txtSabor">Sabor</label>
                            <select type="text" class="form-control" name="txtSabor" id="txtSabor" placeholder="Sabor">  
                                <option value="Vainilla">Vainilla</option>  
                                <option value="Chocolate">Chocolate</option>  
                                <option value="RedVelvet">RedVelvet</option>    
                            </select>
                        </td>
                    </tr>
                </table>
                <table class="borderedd">
                    <tr class="borderedd">
                        <td>
                            <label for="txtDecoracion">Decoración</label>
                            <select type="text" class="form-control" name="txtDecoracion" id="txtDecoracion" placeholder="Decoración">  
                                <option value="Fondant">Fondant</option>  
                                <option value="Mostacillas">Duraznos</option>    
                            </select> 
                        </td>
                        <td class="borderedd">
                            <label for="txtMensaje">Mensaje</label>
                            <input type="text" class="form-control" name="txtMensaje" id="txtMensaje" placeholder="Mensaje">
                        </td>
                        <td>
                            <label for="txtImagen">Imagen</label>
                            <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Imagen">
                        </td>
                    </tr>
                </table>
                <ul>
                <button class="button button5" style="margin-left:4px;">
                <i class="fa fa-cart-plus"></i>&nbsp;Agregar al carrito
                </button>
                <a href="Catalogo.php" class="button button5" role="button" style="float:left;margin-left:22rem;">Regresar</a>
                </ul>
            </form>
        </box>';
    }

    if ($field5name == 2) {
        echo '<box>
            <table>
                <tr>
                    <td>
                        <box>
                            <img src="imagen1.php?id=' . $Producto . '" width="450rem" height="430rem" style="margin-top:4px;">
                        </box>
                    </td>
                    <td>
                        <div class="borderedt">
                            <h1 class="text-color">Información del Producto</h1>
                        </div>

                        <table class="borderedt">
                            <tr>
                                <td><h3 class="text-color2">Nombre del Producto:</h3></td>
                                <td><h5 class="text-color2">' . $field1name . '</h5></td>
                            </tr>
                            <tr>
                                <td><h3 class="text-color2">Precio:</h3></td>
                                <td><h5 class="text-color2">' . $field3name . '</h5></td>
                            </tr>
                            <tr>
                                <td><h3 class="text-color2">Descripción:</h3></td>
                                <td><h5 class="text-color2">' . $field2name . '</h5></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <form id="GestionForm" action="agregar_al_carrito.php" method="POST" enctype="multipart/form-data" class="formproducto">
            <div><h1 class="text-color3">Personalice su producto</h1></div>
                <table class="borderedd">
                    <tr class="borderedd">
                        <td class="borderedd">
                            <input type="hidden" name="Pro_ID" value="' . $field0name . '">
                            <input type="hidden" name="Pro_Tipo" value="' . $field4name . '">
                            <input type="hidden" name="Pro_Cat" value="' . $field5name . '">
                            <label for="txtColorCrema">Color de la Crema</label>
                            <select type="text" class="form-control" name="txtColorCrema" id="txtColorCrema" placeholder="ColorCrema">  
                                <option value="Blanco">Blanco</option>  
                                <option value="Azul">Azul</option>  
                                <option value="Rojo">Rojo</option>
                                <option value="Amarillo">Amarillo</option>
                                <option value="Celeste">Celeste</option>
                                <option value="Rosa">Rosa</option>
                                <option value="Naranja">Naranja</option>
                                <option value="Verde">Verde</option> 
                                <option value="Morado">Morado</option> 
                                <option value="Negro">Negro</option> 
                            </select>  
                        </td>
                        <td class="borderedd">
                            <label for="txtRelleno">Relleno</label>
                            <select type="text" class="form-control" name="txtRelleno" id="txtRelleno" placeholder="Relleno">  
                                <option value="Frutillas">Frutillas</option>  
                                <option value="Duraznos">Duraznos</option>  
                                <option value="Almendras">Almendras</option>
                                <option value="Nueces">Nueces</option>
                                <option value="Manjar">Manjar</option>
                                <option value="Crema">Crema</option>
                                <option value="Pastelera">Pastelera</option>
                            </select> 
                        </td>
                        <td class="borderedd">
                            <label for="txtSabor">Sabor</label>
                            <select type="text" class="form-control" name="txtSabor" id="txtSabor" placeholder="Sabor">  
                                <option value="Vainilla">Vainilla</option>  
                                <option value="Chocolate">Chocolate</option>  
                                <option value="RedVelvet">RedVelvet</option>    
                            </select> 
                        </td>
                    </tr>
                </table>
                <table class="borderedd">
                    <tr class="borderedd">
                        <td>
                            <label for="txtDecoracion">Decoración</label>
                            <select type="text" class="form-control" name="txtDecoracion" id="txtDecoracion" placeholder="Decoración">  
                                <option value="Fondant">Fondant</option>  
                                <option value="Mostacillas">Duraznos</option>    
                            </select> 
                        </td>
                        <td class="borderedd">
                            <label for="txtMensaje">Mensaje</label>
                            <input type="text" class="form-control" name="txtMensaje" id="txtMensaje" placeholder="Mensaje">
                        </td>
                        <td>
                            <label for="txtImagen">Imagen</label>
                            <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Imagen">
                        </td>
                    </tr>
                </table>
            </form>
            <ul>
            <button class="button button5" style="margin-left:4px;">
            <i class="fa fa-cart-plus"></i>&nbsp;Agregar al carrito
            </button>
            <a href="Catalogo.php" class="button button5" role="button" style="float:left;margin-left:42rem;">Regresar</a>
            </ul>
        </box>';
    }


}



?><br></br><br></br>
<?php include("Administrador/Template/Pie.php"); ?>