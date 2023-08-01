<body class="bodycat">
<?php
include_once "Template/Cabecera.php"; 
if ( isset($_GET["res"])){
    $res =htmlspecialchars($_GET["res"]);
    
    if($res==1) {
        echo '<script language="javascript">alert("Debe ingresar una fecha");</script>';
    } 
    if($res==0) {
        echo '<script language="javascript">alert("Algo salio mal. Vuelva a intentarlo");</script>';
    }
    if($res==2) {
        echo '<script language="javascript">alert("La fecha que eligio ya ha pasado. Ingrese otra");</script>';
    } 
}

?>
<?php

if (isset($_SESSION['user_c'])) {
    //echo "hay sesion de consumidor"; 
    $user->setUser_c($userSession->getCurrentUser_c());
    //echo $_SESSION['user_c'];
    $sesion = $_SESSION['user_c'];

    $productos = obtenerProductosEnCarrito($sesion);
    $cant = & cantsol($sesion);
    
    if ($productos==0 || $cant==0) {
    ?>
        <section class="hero is-info">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Todavía no hay productos
                    </h1>
                    <h2 class="subtitle">
                        Visita el catalogo para agregar productos a tu carrito
                    </h2>
                    <a href="Catalogo.php" class="button button5">Ver Catalogo</a>
                </div>
            </div>
        </section>
    <?php } else if(count($productos) >= 1) { ?>
        <div class="columns">
            <div class="column">
                <br></br><br></br>
                <h2 class="is-size-2">Mi carrito de compras</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Mensaje</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Quitar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        
                        foreach ($productos as $producto) {
                            $total += $producto->Sol_Precio;
                            ?>
                                <tr>
                                    <td><?php echo $producto->Pro_Nombre ?></td>
                                    <td><?php echo $producto->Pro_Descripcion ?></td>
                                    <td><?php echo $producto->Sol_Mensaje ?></td>
                                    <td>$<?php echo number_format($producto->Sol_Precio, 2) ?></td>
                                    <td>
                                    <div class="input-group">
                                        <form action="carrito/restarsumar.php" method="post">
                                            <input type="hidden" name="accion" value="0">
                                            <input type="hidden" name="id_producto" value="<?php echo $producto->Pro_ID ?>">
                                            <input type="hidden" name="id_sol" value="<?php echo $producto->Sol_ID ?>">
                                            <input type="hidden" name="sol_precio" value="<?php echo $producto->Sol_Precio ?>">
                                            <input type="hidden" name="sesion" value="<?php echo $sesion ?>">
                                            <input type="hidden" name="cant" value="<?php echo $producto->Sol_Cantidad ?>">
                                            <button> <?php echo "-" ?> </button>
                                        </form>
                                        <button id="btn2"><?php echo $producto->Sol_Cantidad ?></button>
                                        <form action="carrito/restarsumar.php" method="post">
                                            <input type="hidden" name="accion" value="1">
                                            <input type="hidden" name="id_producto" value="<?php echo $producto->Pro_ID ?>">
                                            <input type="hidden" name="id_sol" value="<?php echo $producto->Sol_ID ?>">
                                            <input type="hidden" name="sol_precio" value="<?php echo $producto->Sol_Precio ?>">
                                            <input type="hidden" name="sesion" value="<?php echo $sesion ?>">
                                            <input type="hidden" name="cant" value="<?php echo $producto->Sol_Cantidad ?>">
                                            <button> <?php echo "+" ?> </button>
                                        </form>
                                    </div>
                                            
                                    </td>
                                    <td>
                                        <form action="eliminar_del_carrito.php" method="post">
                                            <input type="hidden" name="id_producto" value="<?php echo $producto->Pro_ID ?>">
                                            <input type="hidden" name="sesion" value="<?php echo $sesion ?>">
                                            <input type="hidden" name="id_sol" value="<?php echo $producto->Sol_ID ?>">
                                            <input type="hidden" name="sol_precio" value="<?php echo $producto->Sol_Precio ?>">
                                            <input type="hidden" name="redireccionar_carrito">
                                            <button class="button is-danger">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                    </td>
                            <?php } ?>
                            </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" class="is-size-4 has-text-right"><strong>Total: $<?php echo number_format($total, 2) ?></strong></td>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <form action="terminar_compra.php" method="post">
                    <div class = "form-group">
                        <label >Fecha en la que desea su pedido:</label>
                        <input type="date" name="fecha">
                    </div>
                    <input type="hidden" name="ped_id" value="<?php echo $producto->Sol_Pedido ?>">
                    <input type="hidden" name="solicitado">
                    <div class = "form-group">
                        <button class="button button5"><?php echo "Terminar Solicitud"?></button>
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>
<?php }else{
header("Location: Catalogo.php?res=0");    
} ?>
<br></br><br></br><br></br><br></br><br></br><br></br><br></br>
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
            <p>¡Hola! Comenzamos nuestra tienda de repostería junto a mi mamá, durante la pandemia y nos encantó tanto
                que deseamos continuar.</p>
            <p>Si quieres algún dulcecito, te prometemos que lo prepararemos con todo el amor y dedicación del mundo.
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