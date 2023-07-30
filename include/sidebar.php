<?php
include('../conexion.php'); 
     session_start();
$email=$_SESSION['email'];
$tipo=$_SESSION['tipo'];
$query=mysqli_query($conexion,"select * from adminsis, jefec, secretariac, profesor where Adm_Correo ='$email' || Jef_Correo ='$email' ||Sc_Correo ='$email' ||Prof_Correo ='$email' ");
$res1=mysqli_fetch_array($query);


if ($tipo == 1) {
  @$name=$res1['Adm_Nombre'];
} elseif ($tipo == 2) {
  @$name=$res1['Jef_Nombre'];
} elseif ($tipo == 3) {
  @$name=$res1['Sc_Nombre'];
} else {
  @$name=$res1['Prof_Nom'];
}

     ?>
<body>

<div class="indexfondo2">
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #EA7600;;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #f1f1f1;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #000000;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<?php
if ($tipo == 1) {
?>

<!-- Admin menu content -->

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <b style="color:black"><?php echo $name; ?></b>
  <a href="#">Inicio</a>
  <a href="#">Lista de Usuarios</a>
  <a href="../Mantenedores/MantenedorAsignatura.php">Mantención Asignaturas</a>
  <a href="../Mantenedores/MantenedorPeriodo.php">Mantención Periodos</a>
  <a href="../Mantenedores/MantenedorEstadoEstu.php">Mantención Estado Estudiantes</a>
  <a href="../Mantenedores/MantenedorBH.php">Mantención BloqueHorario</a>
  <a href="../MantCuenta/MantencionUs.php">Mantención Usuarios</a>
  <a href="../MantBasic/ver_asig.php">Asignaturas</a>
  <a href="../include/logout.php">Cerrar Sesión</a>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer;color:black;" onclick="openNav()">&#9776; Menú del Administrador</span>
</div>

<?php
} elseif ($tipo == 2) {
?>

<!-- Jefe de Carrera menu content -->

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <b style="color:black"><?php echo $name; ?></b>
  <a href="#">Descargar Listado Estudiantes</a>
  <a href="#">Descargar Listado Cursos</a>
  <a href="#">Generar Estadística de Clases por semestre</a>
  <a href="#">Generar Estadística de Asistencia mensual por Curso</a>
  <a href="#">Generar Estadística de Asistencia por Estudiante</a>
  <a href="../include/logout.php">Cerrar Sesión</a>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer;color:black;" onclick="openNav()">&#9776; Menú del Jefe de Carrera</span>
</div>

<?php
} elseif ($tipo == 3) {
?>

<!-- Secretaria/o menu content -->

<div id="mySidenav" class="sidenav">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<b style="color:black"><?php echo $name; ?></b>
  <a href="secretaria.php">Inicio</a>
  <a href="#">Horario Docente</a>
  <a href="#">Cursos</a>
  <a href="../excelsubida/excel.php">Subir Archivos</a>
  <a href="#">Profesores</a>
  <a href="../Gestores/ver_estu.php">Gestion Estudiante</a>
  <a href="../include/logout.php">Cerrar Sesión</a>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer;color:black;" onclick="openNav()">&#9776; Menú de Secretaria/o</span>
</div>

<?php
} else {
?>

<!-- Profesor menu content -->

<div id="mySidenav" class="sidenav">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<b style="color:black"><?php echo $name; ?></b>
  <a href="#">Inicio</a>
  <a href="#">Cursos</a>
  <a href="#">Listado Asistencia</a>
  <a href="#">Mensajes</a>
  <a href="../include/logout.php">Cerrar Sesión</a>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer;color:black;" onclick="openNav()">&#9776; Menú del Profesor</span>
</div>

<?php
}
?>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
</div>
</body>