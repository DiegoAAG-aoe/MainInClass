<?php

include ('../conexion.php');


//Recibe la id que se le envia en la seccion de "view" que se usara para determinar que cosa en especifico eliminar.
$sid=$_GET['xxx'];
//Elimina en totalidad dato de su respectiva tabla en la base de datos, en base a la comparacion echa en el where.
mysqli_query($conexion,"delete from estcarre where Cr_Estudiante='$sid'");
mysqli_query($conexion,"delete from estrec where Estc_Estudiante='$sid'");
mysqli_query($conexion,"delete from inscrito where Ins_Rut='$sid'");
mysqli_query($conexion,"delete from estasist where Est_Rut='$sid'");
mysqli_query($conexion,"delete from estudiante where Es_Rut='$sid'");


//Luego de realizada la accion anterios a esta, se re dirige a la pagina indicada en el "href".
echo"<script>window.location.href='ver_estu.php';</script>";


?>
