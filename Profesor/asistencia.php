<?php
include('../include/header.php');
include('../include/sidebar.php');
extract($_REQUEST);
include('../conexion.php');

$id1 = $_REQUEST['id1'];
$id2 = $_REQUEST['id2'];
$id3 = $_REQUEST['id3'];
$id4 = $_REQUEST['id4'];


?>


<section class="content">
    <div class="row clearfix">
        <div>
            <div>
                <div>
                    <a class="btn btn-info" href="add_estu.php">Anadir Estudiante</a>
                    <h2 style="text-align: center;margin-bottom:2.5rem">Asistencia</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Rut</th>
                                    <th>Nombre</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('../include/config.php');
                                $query = mysqli_query($con, "select Ins_Rut from inscrito where Ins_Asignatura='$id1' AND Ins_Tipo='$id2' AND Ins_Secc='$id3' AND Ins_Periodo='$id4'");
                                while ($res = mysqli_fetch_array($query)) {
                                    $ide = $res['Ins_Rut'];
                                    $que = mysqli_query($con, "select * from estudiante where Es_Rut='$ide'");
                                    $resu = mysqli_fetch_array($que);
                                    $id = $resu['Es_Rut'];
                                    $nom = $resu['Es_Nombre'];
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $id; ?>
                                        </td>
                                        <td>
                                            <?php echo $nom; ?>
                                        </td>
                                        <td>
                                        <label><input type="checkbox" id="cbox1" value="first_checkbox" /></label>
                                           
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