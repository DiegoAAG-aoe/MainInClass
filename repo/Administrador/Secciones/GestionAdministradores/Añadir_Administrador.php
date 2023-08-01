<body class="bodycat">
<?php include("../../template/Cabecera.php"); 

include("../../configuración/bd.php");
include_once '../../../includes/user.php';
include_once '../../../includes/user_s.php';

$userSession = new UserSession();
$user = new User();

if (isset($_SESSION['user_a'])) {
    //echo "hay sesion de administrador"; 
    $user->setUser($userSession->getCurrentUser_a());

?>
    <form id="GestionForm" action="Insertar_Administrador.php" method="POST" enctype="multipart/form-data">
        <div class="col-md-5">

            <div class="card" Style="margin-top:5rem;margin-left:25rem;margin-right:10rem;width:1000px">

            <div class="card-header">
                    Añadir nuevo Administrador
                </div>

                <div class="card-body">
                    
                <form method="POST" enctype="multipart/form-data">

                <div class = "form-group">
                    <label for="txtNombre">Nombre</label>
                    <input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Nombre">
                </div>

                <div class = "form-group">
                    <label for="txtApellido">Apellido</label>
                    <input type="text" class="form-control" name="txtApellido" id="txtApellido" placeholder="Apellido">
                </div>

                <div class = "form-group">
                    <label for="txtCorreo">Correo</label>
                    <input type="text" class="form-control" name="txtCorreo" id="txtCorreo" placeholder="Correo">
                </div> 

                <div class = "form-group">
                    <label for="txtContraseña">Contraseña</label>
                    <input type="text" class="form-control" name="txtContraseña" id="txtContraseña" placeholder="Contraseña">
                </div>

                <?php
                        $query = "  SELECT  C.Car_ID, C.Car_Nombre 
                            FROM Cargo C
                            WHERE C.Car_Estado='1'";
                        if ($result = $mysqli->query($query)) {
                        
                            echo '<div class = "form-group" >
                                    <label for="txtCargo">Cargo</label>
                                
                                <select type="text" class="form-control" name="txtCargo" id="txtCargo" placeholder="Cargo">';
                            while ($row = $result->fetch_assoc()) {

                                $id = $row["Car_ID"];
                                $nomcat = $row["Car_Nombre"];
                                    
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
                        <option value="1">Habilitado</option>}  
                        <option value="0">Deshabilitado</option>  
                    </select> 
                </div>
                
                <div>
                    <button type="submit" name="accion" value="Agregar" class="button button5">Agregar</button>
                    <a href="Gestion_Administradores.php" class="button button5" role="button">Cancelar</a>
                </div>
        
                </form>

                </div>

            </div>
            

        </div>
    </form>
    </body>
    <br></br>
<?php } ?>
</html>


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