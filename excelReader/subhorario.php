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
		<title>Subir Datos Horario</title>
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
				<td>Asignatura</td>
				<td>Tipo</td>
				<td>Seccion</td>
				<td>Periodo</td>
                <td>Dia</td>
				<td>Bloque</td>
				<td>Hora</td>
                <td>Profesor</td>
			</tr>
			<?php
			$i = 1;
			$rows = mysqli_query($conn, "SELECT * FROM horario");
			foreach($rows as $row) :
			?>
			<tr>
				<td> <?php echo $row["Hor_Asignatura"];  ?> </td>
				<td> <?php echo $row["Hor_Tipo"]; ?> </td>
				<td> <?php echo $row["Hor_Secc"]; ?> </td>
				<td> <?php echo $row["Hor_Periodo"]; ?> </td>
                <td> <?php echo $row["Hor_Dia"]; ?> </td>
                <td> <?php echo $row["Hor_Num"]; ?> </td>
				<td> <?php echo $row["Hor_Hora"]; ?> </td>
                <td> <?php echo $row["Hor_Profesor"]; ?> </td>
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
				$asig = $row[0];
				$tipo = $row[1];
				$secc = $row[2];
				$per = $row[3];
                $dia = $row[4];
                $blo = $row[5];
				$hora = $row[6];
                $prof = $row[7];
				mysqli_query($conn, "INSERT INTO horario VALUES('$asig', '$tipo', '$secc', '$per', '$dia', '$blo', '$hora', '$prof')");
			
			
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
