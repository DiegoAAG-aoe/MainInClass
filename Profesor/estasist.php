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

    // Get the attendance data from the form
    $rut = $_POST['attendance'];
    foreach ($rut as $estu_id => $presente) {
        
        // Save the attendance data to the database
        $query = "insert into estasist(Est_Rut, Est_Asistencia, Est_Asignatura, Est_Tipo, Est_Secc, Est_Periodo, Est_EstadoEstu, Est_Asiste) values('$estu_id','$idu1','$ide1','$ide2','$ide3','$ide4','Matriculado','$presente')";  
        mysqli_query($con, $query);
    }
    
   

    foreach ($rut as $estu_id => $presente) {

        if ($presente == 0){
        // Notificacion en caso de que falte X clase.
        $query = mysqli_query($con, "select * from estudiante where Es_Rut='$estu_id' ");
        $res = mysqli_fetch_array($query);
        $id1 = $res['Es_Correo'];
        $id2 = "Falta por asistencia de wa";
        $id3 = "Faltan 4 asistencias para echarte el ramo wn";
        $query2 = mysqli_query($con, "select * from recordatorio where Rec_ID=1");
        $res2 = mysqli_fetch_array($query2);
        $rec_id=$res2['Rec_ID'];    
        $rec_con=$res2['Rec_Contenido'];    
        $query3 = mysqli_query($con, "select * from mensaje where Men_Recordatorio='$rec_id' ");
        $res3 = mysqli_fetch_array($query3);    
        $men_men=$res3['Men_Mensaje'];
        $query4 = mysqli_query($con, "select * from Asignatura where Asi_ID='$ide1' ");
        $res4 = mysqli_fetch_array($query4);  
        $asi_nom=$res4['Asi_Nombre'];
        $mensaje = $men_men . " " . $asi_nom;
        

        
        $query = http_build_query(array(
            'id1' => $id1,
            'id2' => $rec_con,
            'id3' => $mensaje,
           
        ));
        
        // Redirect to esta.php with query string
        header('Location: email.php?' . $query);
        }
    }
    
?>