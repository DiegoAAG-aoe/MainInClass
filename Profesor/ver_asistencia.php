<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio Web</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../formatos_css/clases.css" media="screen">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/074b956457.js" crossorigin="anonymous"></script>
</head>

<?php

include('../include/header.php');
extract($_REQUEST);
include('../conexion.php');




?>

<?php
include('../include/sidebar.php');
$rut=$_SESSION['rut'];

// if (isset($_POST['rut'])) 
// { $rut = $_POST['rut']; }
// else {echo "chaaaaaaa";}
?>

<section class="content">
    <div class="row clearfix">
        <div>
            <div>

                <div>
                    <h2 style="text-align: center;margin-bottom:2.5rem">Asistencias guardadas por el Profesor</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                <th>RUT</th>
                                <th>Asistencia</th>
                                <th>Asignatura</th>
                                <th>Tipo</th>
                                <th>Seccion</th>
                                <th>Periodo</th>
                                <th>EstadoEstu</th>
                                <th>Asiste</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('../include/config.php');

                                $query = mysqli_query($con, "select * FROM estasist");
                                while ($res = mysqli_fetch_array($query)) {
                                    $ide1 = $res['Est_Rut'];
                                    $ide2 = $res['Est_Asistencia'];
                                    $ide3 = $res['Est_Asignatura'];
                                    $ide4 = $res['Est_Tipo'];
                                    $ide5 = $res['Est_Secc'];
                                    $ide6 = $res['Est_Periodo'];
                                    $ide7 = $res['Est_EstadoEstu'];
                                    $ide8 = $res['Est_Asiste'];

                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $ide1; ?>
                                        </td>
                                        <td>
                                            <?php echo $ide2; ?>
                                        </td>
                                        <td>
                                            <?php echo $ide3; ?>
                                        </td>
                                        <td>
                                            <?php echo $ide4; ?>
                                        </td>
                                        <td>
                                            <?php echo $ide5; ?>
                                        </td>
                                        <td>
                                            <?php echo $ide6; ?>
                                        </td>
                                        <td>
                                            <?php echo $ide7; ?>
                                        </td>
                                        <td>
                                            <?php echo $ide8; ?>
                                        </td>
                                        <td>
                                            
                                            <!-- <a class='btn btn-success' href="dashboard.php?page=c_info&id=<?php echo $id; ?>"><span class="fa fa-eye"></span></a> -->
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<footer class="pie-pagina">
    <img src="../Logos/CNA7.png" alt="7anos" class="logodeabajo"></img>
</footer>

</html>