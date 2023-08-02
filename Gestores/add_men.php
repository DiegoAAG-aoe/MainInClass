<?php
include('../include/header.php');
include ('../include/sidebar.php');
extract($_REQUEST);
include ('../conexion.php');



if (isset($submit)) {
    $recordatorio = $_POST['recordatorio'];
    $query = "insert into mensaje(Men_Id, Men_Mensaje, Men_Recordatorio) values('$Men_Id', '$Men_Mensaje', '$recordatorio')";
    $r = mysqli_query($con, $query);

    //En caso de ingresarse de manera correcta se guardara dentro de msg un mensaje de confirmacion de ingreso.
    if ($r) {
        $msg = '<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Exito!</strong> Informacion añadida de manera correcta.
  </div>';
        echo "<script>window.location.href='ver_men.php';</script>";
    }
    //En caso de ingresarse de manera incorrecta se guardara dentro de msg un mensaje de fallo de ingreso.
    else {
        $msg = '<div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
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
                            Añadir Mensaje
                        </h2>

                    </div>
                    <!-- Seccion del html donde se le pide el ingreso de datos al usuario-->
                    <div class="body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row clearfix">

                            <div class="col-lg-8 col-md-2 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input required type="text" name="Men_Id" class="form-control">
                                            <label class="form-label">Seccion</label>
                                        </div>
                                        
                                        <div class="form-line">
                                            <input required type="text" name="Men_Mensaje" class="form-control">
                                            <label class="form-label">Seccion</label>
                                        </div>

                                        <div>
                                            <?php include("opcion_recordatorio.php") ?>
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

</html>