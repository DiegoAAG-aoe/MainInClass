<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignaturas</title>
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
function delet(id)
  {
    if(confirm("you want to delete ?"))
    {
      window.location.href="eliminar_asig.php?xxx="+id;
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
                    <a class="btn btn-info" href="add_estu.php">Anadir Asignatura</a>
                    <h2 style="text-align: center;">Mantenedor Asignatura</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include ('../include/config.php');
                                $query = mysqli_query($con, "select * from asignatura");
                                while ($res = mysqli_fetch_array($query)) {
                                    $id = $res['Asi_ID'];
                                    $nom = $res['Asi_Nombre'];
                                ?>
                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $nom; ?></td>
                                    <td>
                                        <a class='btn btn-info' href="act_estu.php?id=<?php echo $id; ?>">editar<span class="glyphicon glyphicon-pencil"></span></a>
                                        <a class='btn btn-danger' onclick="delet('<?php echo $id; ?>');">eliminar<span class="glyphicon glyphicon-remove" style="color:white;"></span></a>
                                        <a class='btn btn-success' href="ver_curso.php?page=c_info&id=<?php echo $id; ?>"><span class="fa fa-eye"></span></a>
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
