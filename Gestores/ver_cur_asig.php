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
include ('../conexion.php');

$id=$_REQUEST['id'];

?>

<script type="text/javascript">
//Funcion en especifica para poder hacer uso del 'delete' para poder borrar valores como tal con su respectivo llamado hacia el archivo como tal
function delet(id)
  {
    if(confirm("you want to delete ?"))
    {
      window.location.href="eliminar_cur.php?xxx="+id;
    }
  }

</script>

<?php
include('../include/sidebar.php');
?>

<section class="content">
    <div class="row clearfix">
        <div >
            <div>
                
                <div>
                    <a class="btn btn-info" href="add_cur_asig.php?id1=<?php echo $id; ?>">Anadir Curso asociado a la Asignatura</a>
                    <h2 style="text-align: center;margin-bottom:2.5rem">Gestion Curso</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Seccion</th>
                                    <th>Tipo</th>
                                    <th>Periodo</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                    include ('../include/config.php');
                    $query = mysqli_query($con, "select * from curso where Cur_Asignatura = '$id' ");
                    while ($res = mysqli_fetch_array($query)) {
                        $id1 = $res['Cur_Periodo'];
                        $id2 = $res['Cur_Tipo'];
                        $id3 = $res['Cur_Secc'];
                    ?>
                                <tr>
                                    <td><?php echo $id3; ?></td>
                                    <td><?php echo $id2; ?></td>
                                    <td><?php echo $id1; ?></td>
                                    <td>
                                        <a class='btn btn-info' href="act_cur_asig.php?id1=<?php echo $id; ?>&id2=<?php echo $id2; ?>&id3=<?php echo $id3; ?>">editar<span class="glyphicon glyphicon-pencil"></span></a>
                                        <a class='btn btn-danger' onclick="delet('<?php echo $id1; ?>', '<?php echo $id2; ?>', '<?php echo $id3; ?>');">eliminar<span class="glyphicon glyphicon-remove" style="color:white;"></span></a>
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
<img src="../Logos/CNA7.png" alt="7anos" class="logodeabajo" ></img>
</footer>

</html>
