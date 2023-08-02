<?php
include "database.php";
$datos = $con->query("select * from person");
?>
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
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="indexfondo">
<h1>Importar Datos de un archivo EXCEL con PHP</h1>

 <form method="post" id="addproduct" action="import.php" enctype="multipart/form-data" role="form">
  <div>
    <label class="col-lg-2 control-label">Archivo (.xlsx)*</label>
      <input type="file" name="name"  id="name" placeholder="Archivo (.xlsx)">
<br><br>
      <button type="submit" class="btn btn-primary">Importar Datos</button>
  </div>
</form>

<p>Formato de los datos [Rut/Rfc, Nombre, Apellidos, Direccion, Email, Telefono]</p>


<?php if($datos->num_rows>0):?>
	<h3>Datos</h3>
	<p>Resultados <?php echo $datos->num_rows; ?></p>
	<table border="1">
	<thead>
		<th>No</th>
		<th>Nombre completo</th>
		<th>Direccion</th>
		<th>Telefono</th>
		<th>Email</th>
		<th>Fecha de creacion</th>
	</thead>
	<?php while($d= $datos->fetch_object()):?>
		<tr>
		<td><?php echo $d->no; ?></td>
		<td><?php echo $d->name." ".$d->lastname; ?></td>
		<td><?php echo $d->address1; ?></td>
		<td><?php echo $d->phone1; ?></td>
		<td><?php echo $d->email1; ?></td>
		<td><?php echo $d->created_at; ?></td>
		</tr>

	<?php endwhile; ?>
</table>
<?php else:?>
	<h3>No hay Datos</h3>
<?php endif; ?>

</body>

</div>
<footer class="pie-pagina">
  <img src="../Logos/CNA7.png" alt="7anos" class="logodeabajo"></img>
</footer>

</html>
</html>