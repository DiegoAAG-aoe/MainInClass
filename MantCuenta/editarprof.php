<?php 
include('../include/header.php');
include ('../include/sidebar.php');
extract($_REQUEST);
include ('../conexion.php');

$id=$_REQUEST['id'];

$query=mysqli_query($con,"select * from profesor where Prof_Rut ='$id'");
$res=mysqli_fetch_array($query);


$nombre = $res['Prof_Nombre'];
$correo = $res['Prof_Correo'];
$pass = $res['Prof_Contrasena'];

if (isset($submit)) {

    $query = "update adminsis set Prof_Nombre = '$prof_nombre', Prof_Correo = '$prof_correo', Prof_Contrasena = '$prof_pass' where Prof_Rut = '$id'";
    mysqli_query($con, $query);

    $msg = '<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Profesor modificado correctamente.
  </div>';
    echo "<script>window.location.href='profesor.php';</script>";

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
                                Modificar Profesor
                            </h2>
                           
                        </div>
                        <!-- Seccion del html donde se le pide el ingreso de datos al usuario-->
<div class="body">
                            <form method="post" enctype="multipart/form-data">
                                <div class="row clearfix">

                                <div class="col-lg-8 col-md-2 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="text" name="prof_nombre" value="<?php echo $nombre;?>" class="form-control">
                                                <label class="form-label">Nombre Profesor</label>
                                            </div>
                                            <div class="form-line">
                                                <input required type="text" name="prof_correo" value="<?php echo $correo;?>" class="form-control">
                                                <label class="form-label">Correo de Profesor</label>
                                            </div>
                                            <div class="form-line">
                                                <input required type="text" name="prof_contrasena" value="<?php echo $pass;?>" class="form-control">
                                                <label class="form-label">Contraseña de Profesor</label>
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
