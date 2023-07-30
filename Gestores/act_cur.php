<?php 
include('../include/header.php');
include ('../include/sidebar.php');
extract($_REQUEST);
include ('../conexion.php');

$id = $_REQUEST['id'];
$tip = $_REQUEST['tip'];
$secc = $_REQUEST['secc'];


$query=mysqli_query($con,"select * from curso where Cur_Asignatura='$id' AND Cur_Tipo='$tip' AND Cur_Secc='$secc'");
$res=mysqli_fetch_array($query);


$tipo = $res['Cur_Tipo'];
$seccion = $res['Cur_Secc'];


if (isset($submit)) {

    $query = "update curso set Cur_Tipo = '$tipo', Cur_Secc = '$secc'";
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
            <?php echo @$msg;?>
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
                                            <div class="form-line">
                                                <input required type="text" name="Cur_Tipo" value="<?php echo $tipo;?>" class="form-control">
                                                <label class="form-label">Tipo de Curso</label>
                                            </div>
                                            <div class="form-line">
                                                <input required type="text" name="Cur_Secc" value="<?php echo $seccion;?>" class="form-control">
                                                <label class="form-label">Sección de Curso</label>
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
