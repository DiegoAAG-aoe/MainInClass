<?php 
include('../include/header.php');
include ('../include/sidebar.php');
extract($_REQUEST);
include ('../conexion.php');

$id=$_REQUEST['id'];

$query=mysqli_query($con,"select * from jefec where Jef_Rut='$id'");
$res=mysqli_fetch_array($query);


$nombre = $res['Jef_Nombre'];
$correo = $res['Jef_Correo'];
$pass = $res['Jef_Contrasena'];

if (isset($submit)) {

    $query = "update jefec set Jef_Nombre = '$jef_nombre', Jef_Correo = '$jef_correo', Jef_Contrasena = '$jef_pass' where Jef_Rut = '$id'";
    mysqli_query($con, $query);

    $msg = '<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Jefe de Carrera modificado correctamente.
  </div>';
    echo "<script>window.location.href='jefe.php';</script>";

}

         ?>        

<!--Barra lateral de acceso a todas las funciones/informacion de administrador  -->

       
        <!-- Seccion estetica y de orden -->
<section class="content">
        <div class="container-fluid">
            <?php echo @$msg;?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="text-align: center;">
                                Modificar Jefe Carrera
                            </h2>
                           
                        </div>
                        <!-- Seccion del html donde se le pide el ingreso de datos al usuario-->
<div class="body">
                            <form method="post" enctype="multipart/form-data">
                                <div class="row clearfix">

                                <div class="col-lg-8 col-md-2 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="text" name="jef_nombre" value="<?php echo $nombre;?>" class="form-control">
                                                <label class="form-label">Nombre Jefe Carrera</label>
                                            </div>
                                            <div class="form-line">
                                                <input required type="text" name="jef_correo" value="<?php echo $correo;?>" class="form-control">
                                                <label class="form-label">Correo del Jefe Carrera</label>
                                            </div>
                                            <div class="form-line">
                                                <input required type="text" name="jef_contrasena" value="<?php echo $pass;?>" class="form-control">
                                                <label class="form-label">Contraseña del Jefe Carrera</label>
                                            </div>


                                            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12" style="text-align: center";>
                             
                                     
                                        <input type="submit" name="submit" class="btn btn-primary btn-lg m-l-15 waves-effect" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<br></br>
<footer class="pie-pagina">
<img src="../Logos/CNA7.png" alt="7anos" class="logodeabajo" ></img>
</footer>    
