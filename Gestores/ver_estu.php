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
    <script type="text/javascript">
        
        


</script>

</head>
<?php
include ('../include/header.php');
include('../include/sidebar.php');
?>
<section class="content">
    <div class="row clearfix">
        <div >
            <div>
                <div>
                    <a class="btn btn-info" href="add_estu.php">Añadir Estudiante</a>
                    <h2 style="text-align: center;">Gestion Estudiante</h2>
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
                                include ('../include/config.php');
                                $query = mysqli_query($con, "select * from estudiante");
                                while ($res = mysqli_fetch_array($query)) {
                                    $id = $res['Es_Rut'];
                                    $nom = $res['Es_Nombre'];
                                ?>
                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $nom; ?></td>
                                    <td>
                                        <a class='btn btn-info' href="?id=<?php echo $id; ?>">editar<span class="glyphicon glyphicon-pencil"></span></a>
                                        <a class='btn btn-danger' onclick="delet(<?php echo $id; ?>);">eliminar<span class="glyphicon glyphicon-remove" style="color:white;"></span></a>
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

<script type="text/javascript">
    //Funcion en especifica para poder hacer uso del 'delete' para poder borrar valores como tal con su respectivo llamado hacia el archivo como tal
    function delet(id) {
        if (confirm("you want to delete ?")) {
            window.location.href = '' + id;
        }
    }
</script>



<footer class="pie-pagina">
<img src="../Logos/CNA7.png" alt="7años" class="logodeabajo" ></img>
</footer>

</html>