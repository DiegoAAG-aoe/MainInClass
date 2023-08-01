<?php
session_start();
include('../include/header.php');
include ('../include/sidebar.php');
extract($_REQUEST);
include ('../conexion.php');

include('../include/config.php');

$peo = $_SESSION['asiggg']; 
$pata = $_SESSION['tipooo']; 
$piolin = $_SESSION['secccc']; 
$pepe = $_SESSION['periodooo'];

    // Get the attendance data from the form
    $rut = $_POST['attendance'];
    foreach ($rut as $estu_id => $presente) {
        // Save the attendance data to the database
        $query = mysqli_query($con, "select * from  where Es_Rut = '$rut'");
        $res = mysqli_fetch_array($query);
        
    }
    
?>

