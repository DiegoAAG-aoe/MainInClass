<?php

include('../include/header.php');
include ('../include/sidebar.php');
extract($_REQUEST);
include ('../conexion.php');



if (isset($submit)) {
    $query = "insert into adminsis(Adm_Rut, Adm_Nombre, Adm_Correo, Adm_Contrasena) values('$Adm_Rut', '$Adm_Nombre','$Adm_Correo', '$Adm_Contrasena')";
    $r = mysqli_query($conexion, $query);

    //En caso de ingresarse de manera correcta se guardara dentro de msg un mensaje de confirmacion de ingreso.
    if ($r) {
        $msg = '<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Administrador añadido correctamente.
  </div>';
    echo "<script>window.location.href='admin.php';</script>";

    }
    //En caso de ingresarse de manera incorrecta se guardara dentro de msg un mensaje de fallo de ingreso.
    else {
        $msg = '<div class="alert alert-danger alert-dismissible">
    <a href="admin.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error!</strong> Informacion no anadida.
  </div>';

    }

}

?>

<!--Barra lateral de acceso a todas las funciones/aainformacion de administrador  -->


<!-- Seccion estetica y de orden -->
<section class="content">
    <div class="container-fluid">
        <?php echo @$msg; ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 style="text-align: center;background-color:transparent;">
                            Anadir Administrador
                        </h2>

                    </div>
                    <!-- Seccion del html donde se le pide el ingreso de datos al usuario-->
                    <div class="body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row clearfix" style="background-color:#ea7600;">

                                <div class="col-lg-8 col-md-2 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input required type="text" name="Adm_Nombre" class="form-control">
                                            <label class="form-label">Nombre del Administrador</label>
                                        </div>

                                        <div class="form-line">
                                            <input required type="text" name="Adm_Rut" class="form-control">
                                            <label class="form-label">Rut Administrador</label>
                                        </div>

                                        <div class="form-line">
                                            <input required type="text" name="Adm_Correo" class="form-control">
                                            <label class="form-label">Correo Administrador</label>
                                        </div>

                                        <div class="form-line">
                                            <input required type="text" name="Adm_Contrasena" class="form-control">
                                            <label class="form-label">Contrasena Administrador</label>
                                        </div>


                                        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12" style="text-align: center" ;>


                                            <input type="submit" name="submit"
                                                class="btn btn-primary btn-lg m-l-15 waves-effect" value="Submit">
                                        </div>

                                    </div>
                                </div>


                            </div>
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