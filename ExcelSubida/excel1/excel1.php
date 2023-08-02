<?php
// Se incluyen las librerias
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Se crea una instancia de PHPSpreadSheet para manejar las diferentes hojas
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet(); // Se obtiene la priema hoja y aqui empezamos a agregar datos
$sheet->setCellValue('A1', 'Hola Mundo !'); // Con la funcion setCellValue se agrega la posicion de la celda y el valor
$sheet->setCellValue('A2', 'Hola Mundo !'); // Posicion A2
$sheet->setCellValue('A3', 'Hola Mundo !'); // Posicion A3

//$writer = new Xlsx($spreadsheet); // Creamos un Writer para escribir el archivo
//$writer->save('hola.xlsx'); //  Guardamos el archivo


$spreadsheet->setActiveSheetIndex(0);

////////////////////////////////////////////////////
  // Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="hola.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
//////////////////////////////////////////////////////
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

?>