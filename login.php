<?php
session_start();
include('include/config.php');
extract($_REQUEST);
if (isset($save)) {
  $que = mysqli_query($con, "select * from adminsis, jefec, secretariac, profesor where Adm_Correo ='$email' && Adm_contraseña ='$pass' || Jef_Correo ='$email' && Jef_contraseña ='$pass' ||Sc_Correo ='$email' && Sc_contraseña ='$pass' ||Prof_Correo ='$email' && Prof_contraseña ='$pass' ");
  $row = mysqli_fetch_array($que);
  $Adm_Correo = $row['Adm_Correo'];
  $Jef_Correo = $row['Jef_Correo'];
  $Sc_Correo = $row['Sc_Correo'];
  $Prof_Correo = $row['Prof_Correo'];
  if ($row) {
    if ($Adm_Correo == $email) {
      $_SESSION['email'] = $email;
      $_SESSION['tipo'] = 1;
      header('location:PU/usuario.php');
    } else if ($Jef_Correo == $email) {
      $_SESSION['email'] = $email;
      $_SESSION['tipo'] = 2;
      header('location:PU/usuario.php');
    } else if ($Sc_Correo == $email) {
      $_SESSION['email'] = $email;
      $_SESSION['tipo'] = 3;
      header('location:PU/usuario.php');
    } else {
      $_SESSION['email'] = $email;
      $_SESSION['tipo'] = 4;
      header('location:PU/usuario.php');
    }
  } else {
    $err = "Pls Enter Valid Email or Password";
  }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login</title>
  <!-- Bootstrap core CSS-->
  <link href="Gestores/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="Gestores/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="Gestores/assets/css/sb-admin.css" rel="stylesheet">



</head>

<body style="background-color:#00A499;">


  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="post" enctype="multipart/form-data">
          <?php
          if (isset($err)) {
            echo '<div class="form-group">
            <h6 class="bg-light" style="padding:10px;border-radius:5px">' . $err . '</h6></div>';
          }
          ?>

          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" name="email" required type="email"
              aria-describedby="emailHelp" placeholder="Enter email">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" name="pass" required type="password"
              placeholder="Password">
          </div>


          <input class="btn btn-primary btn-block" style="background-color:#ea7600;border:1px solid #ea7600;"
            type="submit" value="Login" name="save" />

          </br>
        </form>
        <a href="index.php"><button class="btn btn-primary btn-block"
            style="background-color:#ea7600;border:1px solid #ea7600;">Regresar</button></a>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="Gestores/assets/vendor/jquery/jquery.min.js"></script>
  <script src="Gestores/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="Gestores/assets/vendor/jquery-easing/jquery.easing.min.js"></script>


</body>

</html>