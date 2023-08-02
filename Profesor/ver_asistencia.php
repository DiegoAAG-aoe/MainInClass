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
                    
                </div>
            </div>
        </div>
    </div>
</section>


<footer class="pie-pagina">
    <img src="../Logos/CNA7.png" alt="7anos" class="logodeabajo"></img>
</footer>

</html>