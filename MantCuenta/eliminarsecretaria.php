<?php

include ('../conexion.php');


//Recibe la id que se le envia en la seccion de "view" que se usara para determinar que cosa en especifico eliminar.
$sid=$_GET['xxx'];
//Elimina en totalidad dato de su respectiva tabla en la base de datos, en base a la comparacion echa en el where.

mysqli_query($conexion,"delete from secretariacarrera where SEC_SC='$sid'");
mysqli_query($conexion,"delete from secretariac where Sc_Rut='$sid'");

//Luego de realizada la accion anterios a esta, se re dirige a la pagina indicada en el "href".
echo"<script>window.location.href='secretaria.php';</script>";


?>