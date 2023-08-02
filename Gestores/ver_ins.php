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
function delet(id)
  {
    if(confirm("you want to delete ?"))
    {
      window.location.href="eliminar_ins.php?xxx="+id;
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
                    <a class="btn btn-info" href="add_ins.php"> Añadir Inscrito </a>
                    <h2 style="text-align: center;margin-bottom:2.5rem">Gestion Inscrito</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Asignatura</th>
                                    <th>Rut</th>
                                    <th>Tipo</th>
                                    <th>Seccion</th>
                                    <th>Periodo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include ('../include/config.php');
                                $query = mysqli_query($con, "select * from inscrito");
                                while ($res = mysqli_fetch_array($query)) {
                                    $asi = $res['Ins_Asignatura'];
                                    $rut = $res['Ins_Rut'];
                                    $tipo = $res['Ins_Tipo'];
                                    $secc = $res['Ins_Secc'];
                                    $per = $res['Ins_Periodo']
                                ?>
                                <tr>
                                    <td><?php echo $asi; ?></td>
                                    <td><?php echo $rut; ?></td>
                                    <td><?php echo $tipo; ?></td>
                                    <td><?php echo $secc; ?></td>
                                    <td><?php echo $per; ?></td>
                                    
                                    <td>
                                        <a class='btn btn-info' href="act_ins.php?asi=<?php echo $asi; ?>&rut=<?php echo $rut; ?>&tipo=<?php echo $tipo; ?>&secc=<?php echo $secc; ?>&per=<?php echo $per; ?>">editar<span class="glyphicon glyphicon-pencil"></span></a>
                                        <a class='btn btn-danger' onclick="delet('<?php echo $asi; ?>', '<?php echo $rut; ?>', '<?php echo $tipo; ?>', '<?php echo $secc; ?>', '<?php echo $per; ?>');">eliminar<span class="glyphicon glyphicon-remove" style="color:white;"></span></a>
                                        
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