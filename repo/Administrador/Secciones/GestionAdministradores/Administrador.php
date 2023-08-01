<body class="bodycat">
<?php

//session_start();

if (isset($_SESSION['perfil'])) {
    if ($_SESSION['perfil'] == 'G') {
        include("../../template/CabeceraGestor.php");
    } else if ($_SESSION['perfil'] == 'A') {
        include("../../template/Cabecera.php");
    }
} else {
    include("../../template/Cabecera.php");

}

include_once '../../../includes/user.php';
include_once '../../../includes/user_s.php';

$userSession = new UserSession();
$user = new User();

if (isset($_SESSION['user_a'])) {
    //echo "hay sesion de administrador"; 
    $user->setUser($userSession->getCurrentUser_a());

    $Administrador =htmlspecialchars($_GET["Administrador"]);

    include("../../configuración/bd.php"); 

    $query = "  SELECT A.Adm_Nombre, A.Adm_Apellido, A.Adm_Correo, A.Adm_Contraseña, C.Car_Nombre, A.Adm_Estado 
                FROM Administrador A LEFT JOIN Cargo C ON (A.Adm_Cargo=C.Car_ID)
                WHERE A.Adm_ID=".$Administrador."
                ORDER BY A.Adm_Nombre";

    if ($result = $mysqli->query($query)) {
        
        if ($row = $result->fetch_assoc()) {
            $field2name = $row["Adm_Nombre"];
            $field3name = $row["Adm_Apellido"];
            $field4name = $row["Adm_Correo"];
            $field5name = $row["Car_Nombre"];
            $field6name = $row["Adm_Estado"];
            $field7name = $row["Adm_Contraseña"];
        }
    }
    ?>
    <form id="GestionForm" action="Editar_Administrador.php" method="POST" enctype="multipart/form-data">


        <div class="card" style="margin-top: 5rem; margin-left:30rem; margin-bottom: 5rem; padding-right: 2rem; margin-right: 30rem; padding-left: 0rem;">

            <div class="card-header">
                    Editar Datos del Administrador
            </div>

            <div class="card-body">        
    
                <div class = "form-group">
                    <label for="txtID">ID</label>
                    <?php
                        echo '<input type="text" class="form-control" name="txtID" id="txtID" value="'.$Administrador.'" ReadOnly>';
                    ?>    
                </div>

                <div class = "form-group">
                    <label for="txtNombre">Nombre</label>
                    <?php
                    if ($field2name == '') {
                        echo '<input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Nombre">';
                    } else {
                        echo '<input type="text" class="form-control" name="txtNombre" id="txtNombre" value="' . $field2name .'">';
                    }
                    ?>    
                </div>

                <div class = "form-group">
                    <label for="txtApellido">Apellido</label>
                    <?php
                    if ($field3name == '') {
                        echo '<input type="text" class="form-control" name="txtApellido" id="txtApellido" placeholder="Apellido">';
                    } else {
                        echo '<input type="text" class="form-control" name="txtApellido" id="txtApellido" value="' . $field3name .'">';
                    }
                    ?>    
                </div>

                <div class = "form-group">
                    <label for="txtCorreo">Correo</label>
                    <?php
                    if ($field4name == '') {
                        echo '<input type="text" class="form-control" name="txtCorreo" id="txtCorreo" placeholder="Correo">';
                    } else {
                        echo '<input type="text" class="form-control" name="txtCorreo" id="txtCorreo" value="' . $field4name .'">';
                    }
                    ?>    
                </div>

                <div class = "form-group">
                    <label for="txtContraseña">Contraseña</label>
                    <?php
                    if ($field7name == '') {
                        echo '<input type="text" class="form-control" name="txtContraseña" id="txtContraseña" placeholder="Contraseña">';
                    } else {
                        echo '<input type="text" class="form-control" name="txtContraseña" id="txtContraseña" value="' . $field7name .'">';
                    }
                    ?>    
                </div>

                <?php
                    $query = "  SELECT  Car_ID, Car_Nombre 
                        FROM Cargo C
                        WHERE C.Car_Estado='1'";
                    if ($result = $mysqli->query($query)) {
                    
                        echo '<div class = "form-group" >
                                <label for="txtCargos">Cargos</label>
                            
                            <select type="text" class="form-control" name="txtCargos" id="txtCargos" placeholder="Cargo">';
                        while ($row = $result->fetch_assoc()) {

                            $id = $row["Car_ID"];
                            $nomcar = $row["Car_Nombre"];
                                

                            if ($field5name==$nomcar)
                                echo '<option selected="selected" value="'.$id.'">'.$nomcar.'</option>';
                            else 
                                echo '<option value="'.$id.'">'.$nomcar.'</option>';
                            

                        }
                        $result->free();
                        echo '</select>
                        </div>';
                    } 
                ?>       

                <div class = "form-group">
                    <label for="txtEstado">Estado</label>
                    <select type="text" class="form-control" name="txtEstado" id="txtEstado" placeholder="Estado">  
                        <?php
                        if($field6name == '1'){
                            echo '<option selected="selected" value="1">Habilitado</option>';
                        }
                        else {
                            echo '<option value="1">Habilitado</option>';
                        }
                        if($field6name == '0'){
                            echo '<option selected="selected" value="0">Deshabilitado</option>';
                        }
                        else {
                            echo '<option value="0">Deshabilitado</option>';
                        }
                        ?>
                    </select> 
                </div>
            

                <table>
                    <td><div>
                        <button type="submit" class="button button5">Guardar</button>

                        <a href="Gestion_Administradores.php" class="button button5" role="button">Cancelar</a>
                    </div></td>
                </table>

            </div>

        </div>

    </form>
    <br>
<?php }?>
</body>
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