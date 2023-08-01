
<?php

    include("Administrador/Configuración/BDregistro.php");
    
    if(isset($_POST['a_nombre']) && isset($_POST['a_apellido']) && isset($_POST['a_email']) && isset($_POST['a_telefono'])&& isset($_POST['a_pwd'])){
        $nombreForm = $_POST['a_nombre'];
        $apellidoForm = $_POST['a_apellido'];
        $emailForm = $_POST['a_email'];
        $telefonoForm = $_POST['a_telefono'];
        $pwdForm = $_POST['a_pwd'];

        $cant = mysqli_query($conexion,"SELECT count(Con_ID) as cantidad FROM Consumidor WHERE Con_Correo = '$emailForm'");
        $row2 = mysqli_fetch_array($cant);
        $cantidad = $row2["cantidad"];

        if($cantidad==0){
            $sql = "INSERT INTO Consumidor (Con_Correo, Con_Contraseña, Con_Nombre, Con_Apellido, Con_Estado, Con_Telefono)
                                VALUES('$emailForm ', '$pwdForm', '$nombreForm', '$apellidoForm', 1, '$telefonoForm')";
            
            if($conexion->query($sql) === true){
                //echo 'logrado';
                echo '<script language="javascript">alert("¡Se ha registrado de forma exitosa!");</script>';
                include_once 'index.php';
            }else{
                //die("Error al insertar datos: " . $conexion->error);
                echo "Error";
            }
            $conexion->close();
        }else{
            echo '<script language="javascript">alert("El correo que ingresó ya se encuentra registrado. Utilice otro por favor.");</script>';
            include_once 'vistas/login_a.php';
        }
    }else{
        //echo "login";
        include_once 'vistas/login_a.php';
        //header("vistas/login_a.php");
    }
?>