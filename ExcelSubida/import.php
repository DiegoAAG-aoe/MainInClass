<?php
use PhpOffice\PhpSpreadsheet\IOFactory;
require 'vendor/autoload.php';
include "class.upload.php";
include('../include/header.php');
include('../include/sidebar.php');
extract($_REQUEST);
include('../conexion.php');



include('../include/config.php');
if(isset($_FILES["name"])){
    $up = new Upload($_FILES["name"]);
    if($up->uploaded){
        $up->Process("./uploads/");
        if($up->processed){
            // Load the PhpSpreadsheet library
            require 'vendor/autoload.php';

            use PhpOffice\PhpSpreadsheet\IOFactory;

            // Read the Excel file
            $archivo = "uploads/".$up->file_dst_name;
            $spreadsheet = IOFactory::load($archivo);
            $worksheet = $spreadsheet->getActiveSheet();
            $highestRow = $worksheet->getHighestRow();

            // Iterate over the rows
            for ($row = 2; $row <= $highestRow; $row++) {
                $x_rut = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                $x_nombre = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                $x_correo = $worksheet->getCellByColumnAndRow(3, $row)->getValue();

                // Insert the data into the database
                $sql = "INSERT INTO estudiante (Es_Rut, Es_Nombre, Es_Correo) VALUES ";
                $sql .= " (\"$x_rut\",\"$x_nombre\",\"$x_correo\", NOW())";
                $conexion->query($sql);
            }
            unlink($archivo);
        }
    }
}
echo "<script>
window.location = 'excel.php';
</script>
";
?>
