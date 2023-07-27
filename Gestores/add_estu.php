<?php
include('../include/header.php');
extract($_REQUEST);
include ('../include/config.php');



if (isset($submit)) {
    $query = "insert into estudiante(Es_Rut, Es_Nombre, Es_Correo) values('$Es_Rut', '$Es_Nombre','$Es_Correo')";
    $r = mysqli_query($con, $query);

    //En caso de ingresarse de manera correcta se guardara dentro de msg un mensaje de confirmacion de ingreso.
    if ($r) {
        $msg = '<div class="alert alert-success alert-dismissible">
    <a href="ver_estu.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Exito!</strong> Informacion añadida de manera correcta.
  </div>';

    }
    //En caso de ingresarse de manera incorrecta se guardara dentro de msg un mensaje de fallo de ingreso.
    else {
        $msg = '<div class="alert alert-danger alert-dismissible">
    <a href="ver_estu.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error!</strong> Informacion no añadida.
  </div>';

    }

}

?>

<!--Barra lateral de acceso a todas las funciones/informacion de administrador  -->


<!-- Seccion estetica y de orden -->
<section class="content">
    <div class="container-fluid">
        <?php echo @$msg; ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 style="text-align: center;">
                            Añadir Estudiante

                        </h2>

                    </div>
                    <!-- Seccion del html donde se le pide el ingreso de datos al usuario-->
                    <div class="body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row clearfix">

                                <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input required type="text" name="Es_Rut" class="form-control">
                                            <label class="form-label">Nombre del Estudiante</label>
                                        </div>

                                        <div class="form-line">
                                            <input required type="text" name="Es_Nombre" class="form-control">
                                            <label class="form-label">RUT</label>
                                        </div>

                                        <div class="form-line">
                                            <input required type="text" name="Es_Correo" class="form-control">
                                            <label class="form-label">Correo</label>
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

