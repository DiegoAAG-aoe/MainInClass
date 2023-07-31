<?php

include ('../conexion.php');


//Recibe la id que se le envia en la seccion de "view" que se usara para determinar que cosa en especifico eliminar.
$sid1=$_GET['id1'];
$sid2=$_GET['id2'];
$sid3=$_GET['id3'];

//Elimina en totalidad dato de su respectiva tabla en la base de datos, en base a la comparacion echa en el where.
mysqli_query($conexion,"delete from asistencia where Asi_Asignatura='$sid1' AND Asi_Tipo='$sid2' AND Asi_Secc='$sid3'");
mysqli_query($conexion,"delete from estasist where Est_Asistencia='$sid1' AND Est_Tipo='$sid2' AND Est_Secc='$sid3'");
mysqli_query($conexion,"delete from inscrito where Ins_Asignatura='$sid1' AND Ins_Tipo='$sid2' AND Ins_Secc='$sid3'");
mysqli_query($conexion,"delete from horario where Hor_Asignatura='$sid1' AND Hor_Tipo='$sid2' AND Hor_Secc='$sid3'");
mysqli_query($conexion,"delete from curso where Cur_Asignatura='$sid1' AND Cur_Tipo='$sid2' AND Cur_Secc='$sid3'");


//Luego de realizada la accion anterios a esta, se re dirige a la pagina indicada en el "href".
echo "<script>window.location.href='ver_cur.php?id=$sid1 ';</script>";


?>
