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
                        Iniciar Sesion
                    </div>

                    <div class="card-body">
                        <form action="" method="POST">
                        <?php
                            if(isset($errorLogin)){
                                echo $errorLogin;
                            }
                        ?>
                        <div class = "form-group">
                            <label >E-mail:</label>
                            <input type="Text" class="form-control" name="email" placeholder="Escribe tu Correo">
                            <!--<small id="emailHelp" class="form-text text-muted">Escriba su rut sin puntos y con guion.</small>-->
                        </div>

                        <div class="form-group">
                            <label >Contraseña</label>
                            <input type="password" class="form-control" name="pwd" placeholder="Escribe tu Contraseña">
                        </div>

                        <button type="submit" class="button button5" >Ingresar</button>
                        <a href="index.php" class="button button5" role="button">Cancelar</a>
                        <a class="nav-item nav-link" href="Registro.php";?>¿No tienes una cuenta? Registrese Aquí</a>       
                        </form>
                    </div>
                    
                </div>
            </div>
            
        </div>
      </div>
  </body>
</html>