<?php
include('../include/header.php');
include('../include/sidebar.php');
extract($_REQUEST);
include('../conexion.php');

$id1 = $_REQUEST['id1'];
$id2 = $_REQUEST['id2'];
$id3 = $_REQUEST['id3'];
$Cur_Tipo = $_POST['curso']; 



$query = mysqli_query($con, "select * from curso where Cur_Asignatura='$id1' AND Cur_Tipo='$id2' AND Cur_Secc='$id3'");
$res = mysqli_fetch_array($query);


$id = $res['Cur_Asignatura'];
$seccion = $res['Cur_Secc'];
$tipo = $res['Cur_Tipo'];


if (isset($submit)) {

    $query1 = "update asistencia set Asi_Secc = '$Cur_Secc', Asi_Tipo = '$Cur_Tipo' where Asi_Asignatura='$id' AND Asi_Tipo='$tipo' AND Asi_Secc='$seccion'";
    $query2 = "update estasist set Est_Secc = '$Cur_Secc', Est_Tipo = '$Cur_Tipo' where Est_Asistencia='$id' AND Est_Tipo='$tipo' AND Est_Secc='$seccion'";
    $query3 = "update inscrito set Ins_Secc = '$Cur_Secc', Ins_Tipo = '$Cur_Tipo' where Ins_Asignatura='$id' AND Ins_Tipo='$tipo' AND Ins_Secc='$seccion'";
    $query4 = "update horario set Hor_Secc = '$Cur_Secc', Hor_Tipo = '$Cur_Tipo' where Hor_Asignatura='$id' AND Hor_Tipo='$tipo' AND Hor_Secc='$seccion'";      
    $query  = "update curso set Cur_Secc = '$Cur_Secc', Cur_Tipo = '$Cur_Tipo' where Cur_Asignatura='$id' AND Cur_Tipo='$tipo' AND Cur_Secc='$seccion'";
    
    mysqli_query($conexion,$query1);
    mysqli_query($conexion,$query2);
    mysqli_query($conexion,$query3);
    mysqli_query($conexion,$query4);
    mysqli_query($con, $query);

    $msg = '<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Curso modificado correctamente.
  </div>';
    echo "<script>window.location.href='ver_cur.php';</script>";

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
                            Modificar Curso
                        </h2>

                    </div>

                    <div class="body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row clearfix">

                                <div class="col-lg-8 col-md-2 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                        <div>
                                            <?php include("opcion_tipo_curso.php") ?>
                                        </div>
                                        <div class="form-line">
                                            <input required type="text" name="Cur_Secc" value="<?php echo $seccion; ?>"
                                                class="form-control">
                                            <label class="form-label">Sección de Curso</label>
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