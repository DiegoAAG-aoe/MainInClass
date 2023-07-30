<?php

include ('../conexion.php');


//Recibe la id que se le envia en la seccion de "view" que se usara para determinar que cosa en especifico eliminar.
$sid1=$_GET['id1'];
$sid2=$_GET['id2'];
$sid3=$_GET['id3'];
//Elimina en totalidad dato de su respectiva tabla en la base de datos, en base a la comparacion echa en el where.
mysqli_query($conexion,"delete from asistencia where Asi_Asignatura='$sid'");
mysqli_query($conexion,"delete from estasist where Est_Asistencia='$sid'");
mysqli_query($conexion,"delete from inscrito where Ins_Asignatura='$sid'");
mysqli_query($conexion,"delete from horario where Hor_Asignatura='$sid'");
mysqli_query($conexion,"delete from curso where Cur_Asignatura='$sid'");
mysqli_query($conexion,"delete from asignatura where Asi_ID='$sid'");

//Luego de realizada la accion anterios a esta, se re dirige a la pagina indicada en el "href".
echo"<script>window.location.href='ver_asig.php';</script>";


?>
