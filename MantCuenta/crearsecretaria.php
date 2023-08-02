<?php

include('../include/header.php');
include ('../include/sidebar.php');
extract($_REQUEST);
include ('../conexion.php');



if (isset($submit)) {
    $query = "insert into secretariac(Sc_Rut, Sc_Nombre, Sc_Correo, Sc_contrasena) values('$Sc_Rut', '$Sc_Nombre','$Sc_Correo', '$Sc_contrasena')";
    $r = mysqli_query($conexion, $query);

    //En caso de ingresarse de manera correcta se guardara dentro de msg un mensaje de confirmacion de ingreso.
    if ($r) {
        $msg = '<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Secretaria añadida correctamente.
  </div>';
    echo "<script>window.location.href='secretaria.php';</script>";

    }
    //En caso de ingresarse de manera incorrecta se guardara dentro de msg un mensaje de fallo de ingreso.
    else {
        $msg = '<div class="alert alert-danger alert-dismissible">
    <a href="secretaria.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
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
                            Anadir Secretaria
                        </h2>

                    </div>
                    <!-- Seccion del html donde se le pide el ingreso de datos al usuario-->
                    <div class="body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row clearfix" style="background-color:#ea7600;">

                                <div class="col-lg-8 col-md-2 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input required type="text" name="Sc_Nombre" class="form-control">
                                            <label class="form-label">Nombre de la Secretaria</label>
                                        </div>

                                        <div class="form-line">
                                            <input required type="text" name="Sc_Rut" class="form-control">
                                            <label class="form-label">Rut Secretaria</label>
                                        </div>

                                        <div class="form-line">
                                            <input required type="text" name="Sc_Correo" class="form-control">
                                            <label class="form-label">Correo Secretaria</label>
                                        </div>

                                        <div class="form-line">
                                            <input required type="text" name="Sc_contrasena" class="form-control">
                                            <label class="form-label">Contrasena Secretaria</label>
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