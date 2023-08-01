<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../include/header.php');
include ('../include/sidebar.php');
extract($_REQUEST);
include ('../conexion.php');

include('../include/config.php');

$ide1 = $_SESSION['ide1'];
$ide2 = $_SESSION['ide2'];;
$ide3 = $_SESSION['ide3'];
$ide4 = $_SESSION['ide4'];
$ide5 = $_SESSION['ide5'];
$query = mysqli_query($con, "select * from asistencia where Asi_Asignatura='$ide1' AND Asi_Tipo='$ide2' AND Asi_Secc='$ide3' AND Asi_periodo='$ide4' AND Asi_Fecha='$ide5'");
$res = mysqli_fetch_array($query);
    $idu1 = $res['Asi_ID'];
    echo $idu1;

    // Get the attendance data from the form
    $rut = $_POST['attendance'];
    foreach ($rut as $estu_id => $presente) {
        if($presente == "on"){
            $presente = 1;
        }
        else{ 
            $presente = 0;
        }
        // Save the attendance data to the database
        $query = "insert into estasist(Est_Rut, Est_Asistencia, Est_Asignatura, Est_Tipo, Est_Secc, Est_Periodo, Est_EstadoEstu, Est_Asiste) values('$estu_id','$idu1','$ide1','$ide2','$ide3','$ide4','Matriculado','$presente')";  
        mysqli_query($con, $query);
    }
   

