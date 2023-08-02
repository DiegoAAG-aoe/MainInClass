<?php
include "database.php";
include "class.upload.php";

if(isset($_FILES["name"])){
	$up = new Upload($_FILES["name"]);
	if($up->uploaded){
		$up->Process("./uploads/");
		if($up->processed){
            /// leer el archivo excel
            require_once 'PHPExcel/Classes/PHPExcel.php';
            $archivo = "uploads/".$up->file_dst_name;
            $inputFileType = PHPExcel_IOFactory::identify($archivo);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($archivo);
            $sheet = $objPHPExcel->getSheet(0); 
            $highestRow = $sheet->getHighestRow(); 
            $highestColumn = $sheet->getHighestColumn();
            for ($row = 2; $row <= $highestRow; $row++){ 
                $x_no = $sheet->getCell("A".$row)->getValue();
                $x_name = $sheet->getCell("B".$row)->getValue();
                $x_lastname = $sheet->getCell("C".$row)->getValue();
                $x_address1 = $sheet->getCell("D".$row)->getValue();
                $x_email = $sheet->getCell("E".$row)->getValue();
                $x_phone1 = $sheet->getCell("F".$row)->getValue();
                $sql = "insert into person (no, name, lastname, address1, email1, phone1, created_at) value ";
                $sql .= " (\"$x_no\",\"$x_name\",\"$x_lastname\",\"$x_address1\",\"$x_email\",\"$x_phone1\", NOW())";
               $con->query($sql);
            }
    	unlink($archivo);
        }	

}
}
echo "<script>
window.location = './index.php';
</script>
";
?>