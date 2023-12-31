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
date_default_timezone_set('America/Santiago');
include('../include/header.php');
extract($_REQUEST);
include('../conexion.php');
include('../include/sidebar.php');

$date = date('m/d/Y');

$day = date('l', strtotime($date));


if ($day == 'Monday') {
    $day = 'Lun';
} elseif ($day == 'Tuesday') {
    $day = 'Ma';
} elseif ($day == 'Wednesday') {
    $day = 'Mi';
} elseif ($day == 'Thursday') {
    $day = 'Ju';
} elseif ($day == 'Friday') {
    $day = 'Vi';
}
?>

<?php 


// if (isset($_POST['rut'])) 
// { $rut = $_POST['rut']; }
// else {echo "chaaaaaaa";}
?>

<section class="content">
    <div class="row clearfix">
        <div>
            <div>

                <div>
                    <h2 style="text-align: center;margin-bottom:2.5rem">Cursos de los Profesores</h2>
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
                                    <th>Porcentaje</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('../include/config.php');
                                $query = mysqli_query($con, "select * from horario" );
                                while ($res = mysqli_fetch_array($query)) {
                                    $ide1 = $res['Hor_Asignatura'];
                                    $ide2 = $res['Hor_Tipo'];
                                    $ide3 = $res['Hor_Secc'];
                                    $ide4 = $res['Hor_Periodo'];
                                    $ide5 = $res['Hor_Dia'];
                                        $que = mysqli_query($con, "select * from curso where Cur_Asignatura='$ide1' AND Cur_Tipo='$ide2' AND Cur_Secc='$ide3' AND Cur_Periodo='$ide4'");
                                        $resu = mysqli_fetch_array($que);
                                        $id1 = $resu['Cur_Asignatura'];
                                        $id2 = $resu['Cur_Tipo'];
                                        $id3 = $resu['Cur_Secc'];
                                        $id4 = $resu['Cur_Periodo'];
                                        $id5 = $resu['Cur_Porcentaje'];
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $id1; ?>
                                            </td>
                                            <td>
                                                <?php echo $id2; ?>
                                            </td>
                                            <td>
                                                <?php echo $id3; ?>
                                            </td>
                                            <td>
                                                <?php echo $id4; ?>
                                            </td>
                                            <td>
                                                <?php echo $id5; ?>
                                            </td>
                                            <td>
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