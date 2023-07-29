<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio Web</title>
    <link rel="stylesheet" href="../formatos_css/clases.css" media="screen">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/074b956457.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/bootstrap.min.css" />
    <script src="jquery-2.1.4.js"></script>
    <script lang="javascript" src="xlsx.full.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<?php
                include("../conexion.php");
                $secretaria = "SELECT * FROM secretariac";
                $result = mysqli_query($conexion, $secretaria);
                $mostrar = mysqli_fetch_array($result);
                ?>
<body>
    <header class="header-2">
        <div class="ancho">
            <nav class="botonesposi">
                <ul>
                    <div class="divini">
                        <li style="padding-left: 2rem;"><a href="login.php" class="fa-regular fa-user"></a>
                    </div>
                    </li>
                </ul>
            </nav>
            <div class="logo">

                <a title="logo">
                    <a href="http://www.universidaddesantiago.cl/">
                        <img src="../Logos/UsachP1.png" alt="InClasslogo" class="img-responsive"></img>

                    </a>

                </a>
            </div>
        </div>

    </header>

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

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <b style="color:black"><?php echo $mostrar['Sc_Nombre'] ?></b>
  <a href="../PantallaUsuarios/secretaria.php">Inicio</a>
  <a href="#">Horario Docente</a>
  <a href="#">Cursos</a>
  <a href="#">Subir Archivos</a>
  <a href="#">Profesores</a>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer;color:black;" onclick="openNav()">&#9776; Secretaria Menu</span>
</div>

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

<div class="indexfondo">
<body>
<div id="navbar"><span>Red Stapler - SheetJS </span></div>
<div id="wrapper">
        
        <input type="file" id="input-excel" />

</div>
<script>
        $('#input-excel').change(function(e){
                var reader = new FileReader();
                reader.readAsArrayBuffer(e.target.files[0]);

                reader.onload = function(e) {
                        var data = new Uint8Array(reader.result);
                        var wb = XLSX.read(data,{type:'array'});

                        var htmlstr = XLSX.write(wb,{sheet:"sheet no1", type:'binary',bookType:'html'});
                        $('#wrapper')[0].innerHTML += htmlstr;
                }
        });

</script>
</body>
</html>
</div>
</body>
<footer class="pie-pagina">
<img src="../Logos/CNA7.png" alt="7anos" class="logodeabajo" ></img>
</footer>

</html>