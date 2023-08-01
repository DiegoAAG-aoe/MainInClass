<!DOCTYPE html>
<html lang="en">
<?php

include_once "funciones.php";
include_once 'includes/user.php';
include_once 'includes/user_s.php';
include_once 'includes/db.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio Web</title>
    <link rel="stylesheet" href="./formatos_css/clases.css" media="screen">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/074b956457.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./CSS/bootstrap.min.css" />

</head>

<body style="">
    <header class="header-2">
        <div class="ancho">
            <nav class="botonesposi">
                <ul>
                    <li><a href="Catalogo.php"><button class="button button2"
                                style="border-radius: 8px;">Catálogo</br></button></a>
                    </li>
                    <?php
                    $userSession = new UserSession();
                    $user = new User();
                    if (isset($_SESSION['user_c'])) {
                        ?>
                            <li><a href="Mis_Pedidos.php"><button class="button button2" style="border-radius: 8px;">Ver Pedidos</button></a>
                            </li>
                        <?php
                        }
                    if (isset($_SESSION['user_c'])) {
                    ?>
                        <li><a href="includes/logout.php"><button class="button button2" style="border-radius: 8px;">Cerrar
                                    Sesion</button></a>
                        </li>
                    <?php
                    }
                    ?>
                    
                    <div class="divini">
                        <li style="padding-left: 1rem;"><a href="./ver_carrito.php" class="fa-solid fa-cart-shopping"></a>
                        <li style="padding-left: 2rem;"><a href="inicio_sesion.php" class="fa-regular fa-user"></a>
                    </div>
                    </li>
                </ul>
            </nav>
            <div class="logo">

                <a title="logo">
                    <a href="index.php">
                        <img src="./imagenes/infinity.png" alt="reposteriakoslogo" class="img-responsive"></img>

                    </a>

                </a>
            </div>
        </div>
        
    </header>
    
</body>
