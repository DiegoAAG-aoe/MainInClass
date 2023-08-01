<?php

    /*if($_POST){
        header('Location:InicioAdmin.php');
    }*/

?>

<br><!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <link rel="stylesheet" href="./formatos_css/clases.css" media="screen">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="bodycat">
      <div class="container">
        <div class="row">

            <div class="col-md-4">
                
            </div>

            <div class="col-md-5">
            <br/><br/><br/><br/>

                <div class="card">
                    
                    <div class="card-header">
                        Registro
                    </div>

                    <div class="card-body">
                        <form action="" method="POST">
                        <?php
                            if(isset($errorLogin)){
                                echo $errorLogin;
                            }
                        ?>
                        <div class = "form-group">
                            <label >Nombre:</label>
                            <input type="Text" class="form-control" name="a_nombre" placeholder="Escriba su Nombre">
                        </div>

                        <div class = "form-group">
                            <label >Apellido:</label>
                            <input type="Text" class="form-control" name="a_apellido" placeholder="Escriba su Apellido">
                        </div>

                        <div class = "form-group">
                            <label >E-mail:</label>
                            <input type="Text" class="form-control" name="a_email" placeholder="Escriba su Correo">
                        </div>

                        <div class = "form-group">
                            <label >Telefono:</label>
                            <input type="Text" class="form-control" name="a_telefono" placeholder="Escriba su Telefono">
                        </div>

                        <div class = "form-group">
                            <label >Contraseña</label>
                            <input type="password" class="form-control" name="a_pwd" placeholder="Escribe tu Contraseña">
                        </div>

                        <button type="submit" class="button button5">Registrar</button>
                        <a class="nav-item nav-link" href="inicio_sesion.php";?>Iniciar Sesion</a>   
                        </form>
                    </div>
                    
                </div>
            </div>
            
        </div>
      </div>
  </body>
</html>