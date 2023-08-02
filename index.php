<?php require 'config.php'; ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
	<head> 
		<meta charset="utf-8">
		<title>Import Excel To MySQL</title>
	</head>
	<body>
		<form class="" action="" method="post" enctype="multipart/form-data">
			<input type="file" name="excel" required value="">
			<button type="submit" name="import">Import</button>
		</form>
		<hr>
		<table border = 1>
			<tr>
				<td>#</td>
				<td>Name</td>
				<td>correo</td>
				<td>contra</td>
			</tr>
			<?php
			$i = 1;
			$rows = mysqli_query($conn, "SELECT * FROM jefec");
			foreach($rows as $row) :
			?>
			<tr>
				<td> <?php echo $row["Jef_Rut"]; ?> ?> </td>
				<td> <?php echo $row["Jef_Nombre"]; ?> </td>
				<td> <?php echo $row["Jef_Correo"]; ?> </td>
				<td> <?php echo $row["Jef_contrasena"]; ?> </td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php
		if(isset($_POST["import"])){
			$fileName = $_FILES["excel"]["name"];
			$fileExtension = explode('.', $fileName);
      $fileExtension = strtolower(end($fileExtension));
			$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

			$targetDirectory = "uploads/" . $newFileName;
			move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);
			var_dump(move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory));

			// error_reporting(0);
			// ini_set('display_errors', 0);

			require 'excelReader/excel_reader2.php';
			require 'excelReader/SpreadsheetReader.php';

			$reader = new SpreadsheetReader($targetDirectory);
			foreach($reader as $key => $row){
				$rut = $row[0];
				$name = $row[1];
				$correo = $row[2];
				$pass = $row[3];
				mysqli_query($conn, "INSERT INTO jefec VALUES('$rut', '$name', '$correo', '$pass')");
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
	</body>
</html>
