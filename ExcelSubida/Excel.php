<!DOCTYPE html>
<html lang="en">
<?php error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../include/header.php');
include('../include/sidebar.php');
extract($_REQUEST);
include('../conexion.php');

include('../include/config.php');
?>


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sitio Web</title>
  <link rel="stylesheet" href="../formatos_css/clases.css" media="screen">
  <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/074b956457.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../CSS/bootstrap.min.css" />
  <script src="jquery-2.1.4.js"></script>
  <script lang="javascript" src="xlsx.full.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<?php

$secretaria = "SELECT * FROM secretariac";
$result = mysqli_query($conexion, $secretaria);
$mostrar = mysqli_fetch_array($result);



?>

<div class="indexfondo">

</div>
<footer class="pie-pagina">
  <img src="../Logos/CNA7.png" alt="7anos" class="logodeabajo"></img>
</footer>

</html>