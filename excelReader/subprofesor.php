<?php require 'config.php'; 

include('../include/header.php');
extract($_REQUEST);
include('../conexion.php');
include('../include/sidebar.php');
?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
	<head> 
		<meta charset="utf-8">
		<title>Subir Datos Profesor</title>
	</head>
	<body>
	<div class="body">
		<form style="text-align:center;" action="" method="post" enctype="multipart/form-data">
			<input type="file" name="excel" required value="">
			<button class ="btn btn-info" type="submit" name="import">Import</button>
		</form>
		<hr>
		<table border = 1>
			<tr>
				<td>Rut</td>
				<td>Nombre</td>
				<td>correo</td>
				<td>contrasena</td>
			</tr>
			<?php
			$i = 1;
			$rows = mysqli_query($conn, "SELECT * FROM Profesor");
			foreach($rows as $row) :
			?>
			<tr>
				<td> <?php echo $row["Prof_Rut"];  ?> </td>
				<td> <?php echo $row["Prof_Nom"]; ?> </td>
				<td> <?php echo $row["Prof_Correo"]; ?> </td>
				<td> <?php echo $row["Prof_contrasena"]; ?> </td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php
		if(isset($_POST["import"])){
			$fileName = $_FILES["excel"]["name"];
			$fileExtension = explode('.', $fileName);
      $fileExtension = strtolower(end($fileExtension));
			$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

			$targetDirectory = "../uploads/" . $newFileName;
			move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);
			var_dump(move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory));

			// error_reporting(0);
			// ini_set('display_errors', 0);

			require './excel_reader2.php';
			require './SpreadsheetReader.php';

			$reader = new SpreadsheetReader($targetDirectory);
			foreach($reader as $key => $row){
				// Check if values in row are empty
				if(empty($row[0]) && empty($row[1]) && empty($row[2]) && empty($row[3])) {
					// Skip over this row
					continue;
				}
				$rut = $row[0];
				$name = $row[1];
				$correo = $row[2];
				$pass = $row[3];
				mysqli_query($conn, "INSERT INTO profesor VALUES('$rut', '$name', '$correo', '$pass')");
			
			
			}

			echo
			"
			<script>
			alert('Succesfully Imported');
			document.location.href = '';
			</script>
			";
		}
		?>
	</div>	
	</body>
	<footer class="pie-pagina">
<img src="../Logos/CNA7.png" alt="7anos" class="logodeabajo" ></img>
</footer>
</html>
