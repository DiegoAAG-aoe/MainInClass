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



?>

<section class="content">
    <div class="row clearfix">
        <div>
            <div>

                <div>
                    <h2 style="text-align: center;margin-bottom:2.5rem">Horarios de los Profesores</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Asignatura</th>
                                    <th>Tipo</th>
                                    <th>Seccion</th>
                                    <th>Periodo</th>
                                    <th>Dia</th>
                                    <th>Num Bloque</th>
                                    <th>Hora</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('../include/config.php');

                                $query = mysqli_query($con, "select * from horario");
                                while ($res = mysqli_fetch_array($query)) {
                                    $ide1 = $res['Hor_Asignatura'];
                                    $ide2 = $res['Hor_Tipo'];
                                    $ide3 = $res['Hor_Secc'];
                                    $ide4 = $res['Hor_Periodo'];
                                    $ide5 = $res['Hor_Dia'];
                                    $ide6 = $res['Hor_Num'];
                                    $ide7 = $res['Hor_Hora'];

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