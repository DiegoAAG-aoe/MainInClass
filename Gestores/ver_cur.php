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
include ('../include/header.php');
?>

<script type="text/javascript">
//Funcion en especifica para poder hacer uso del 'delete' para poder borrar valores como tal con su respectivo llamado hacia el archivo como tal
function delet(id1, id2, id3)
{
  if(confirm("you want to delete ?"))
  {
    window.location.href='eliminar_cur.php?id1='+id1+'&id2='+id2+'&id3='+id3;
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
                    <a class="btn btn-info" href="add_cur.php">Añadir Curso</a>
                    <h2 style="text-align: center;margin-bottom:2.5rem">Gestion Cursos</h2>
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include ('../include/config.php');
                                $query = mysqli_query($con, "select * from curso");
                                while ($res = mysqli_fetch_array($query)) {
                                    $id = $res['Cur_Asignatura'];
                                    $tip = $res['Cur_Tipo'];
                                    $secc = $res['Cur_Secc'];
                                    $per = $res['Cur_Periodo'];
                                ?>
                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $tip; ?></td>
                                    <td><?php echo $secc; ?></td>
                                    <td><?php echo $per; ?></td>
                                    <td>
                                        <a class='btn btn-info' href="act_cur.php?id=<?php echo $id; ?>&tip=<?php echo $tip; ?>&secc=<?php echo $secc; ?>')">editar<span class="glyphicon glyphicon-pencil"></span></a>
                                        <a class='btn btn-danger' onclick="delet('<?php echo $id; ?>', '<?php echo $tip; ?>', '<?php echo $secc; ?>');">eliminar<span class="glyphicon glyphicon-remove" style="color:white;"></span></a>

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
