<?php
include('../include/header.php');
include('../include/sidebar.php');
extract($_REQUEST);
include('../conexion.php');

$id1 = $_REQUEST['id1'];
$id2 = $_REQUEST['id2'];
$id3 = $_REQUEST['id3'];
$id4 = $_REQUEST['id4'];




$query = mysqli_query($con, "select * from curso where Cur_Asignatura='$id1' AND Cur_Tipo='$id2' AND Cur_Secc='$id3'");
$res = mysqli_fetch_array($query);


$id = $res['Cur_Asignatura'];
$seccion = $res['Cur_Secc'];
$tipo = $res['Cur_Tipo'];



if (isset($submit)) {

    $query  = "update curso set Cur_Secc = '$Cur_Secc', Cur_Tipo = '$cur' where Cur_Asignatura='$id' AND Cur_Tipo='$tipo' AND Cur_Secc='$seccion AND Cur_Porcentaje='$id4'";

 
    mysqli_query($con, $query);

    $msg = '<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Porcentaje modificado correctamente.
  </div>';
    echo "<script>window.location.href='ver_cur_asistencia.php';</script>";

}

?>


<!-- Seccion estetica y de orden -->
<section class="content">
    <div class="container-fluid">
        <?php echo @$msg; ?>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 style="text-align: center;">
                            Asignar Porcentaje
                        </h2>

                    </div>

                    <div class="body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row clearfix">

                                <div class="col-lg-8 col-md-2 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                        <div>
                                                <select name="cur" id="opciones">
                                                    <!-- option tag starts -->
                                                    <option value="T">T</option>
                                                    <option value="E">E</option>
                                                    <option value="L">L</option>
                                                </select>
                                          
                                        </div>
                                        <div class="form-line">
                                            <input required type="text" name="Cur_Porcentaje" value="<?php echo $seccion; ?>"
                                                class="form-control">
                                            <label class="form-label">Porcentaje de curso</label>
                                        </div>


                                        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12" style="text-align: center" ;>


                                            <input type="submit" name="submit"
                                                class="btn btn-primary btn-lg m-l-15 waves-effect" value="Submit">
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
    <img src="../Logos/CNA7.png" alt="7anos" class="logodeabajo"></img>
</footer>