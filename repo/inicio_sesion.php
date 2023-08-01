<?php
include_once 'includes/user.php';
include_once 'includes/user_s.php';
include_once 'includes/db.php';
include_once("Administrador/Configuración/BDregistro.php");

$userSession = new UserSession();
$user = new User();

if (isset($_SESSION['user_a'])) {
    //echo "hay sesion de administrador"; 
    $user->setUser($userSession->getCurrentUser_a());

    header("Status: 301 Moved Permanently");
    header("Location: Administrador/Adm_Sistema/InicioAdmin.php");
    exit;

} else if (isset($_SESSION['user_g'])) {
    //echo "hay sesion de gestor";
    $user->setUser($userSession->getCurrentUser_g());
    header("Status: 301 Moved Permanently");
    header("Location: Administrador/Gestor/InicioGestor.php");
    exit;

} else if (isset($_SESSION['user_c'])) {
    //echo "hay sesion de consumidor";
    $user->setUser_c($userSession->getCurrentUser_c());
    header("Status: 301 Moved Permanently");
    header("Location: Catalogo.php");
    exit;

} else if (isset($_POST['email']) && isset($_POST['pwd'])) {

    $userForm = $_POST['email'];
    $passForm = $_POST['pwd'];

    $user = new User();
    if ($user->userExists_a($userForm, $passForm)) { //comprobar que el usuario existe
        //echo "Existe el Administrador";
        $userSession->setCurrentUser_a($userForm);
        $user->setUser($userForm);

        header("Status: 301 Moved Permanently");
        header("Location: Administrador/Adm_Sistema/InicioAdmin.php");
        exit;
        //$_SESSION['PerfilUsr'] = 'A';

    } else if ($user->userExists_g($userForm, $passForm)) { //comprobar que el usuario existe
        //echo "Existe el Gestor";
        $userSession->setCurrentUser_g($userForm);
        $user->setUser($userForm);

        header("Status: 301 Moved Permanently");
        header("Location: Administrador/Gestor/InicioGestor.php");
        exit;
        //$_SESSION['PerfilUsr'] = 'G';

    } else if ($user->userExists_c($userForm, $passForm)) { //comprobar que el usuario existe
        echo "Existe el Consumidor";
        $consulta = mysqli_query($conexion,"SELECT Con_ID FROM Consumidor WHERE Con_Correo = '$userForm' AND Con_Contraseña = '$passForm'");
        $row = mysqli_fetch_array($consulta);
        $id = $row["Con_ID"];
        //echo $row["Con_ID"];
        /****/
        $userSession->setCurrentUser_c($id);
        $user->setUser($userForm);

        header("Status: 301 Moved Permanently");
        header("Location: Catalogo.php");
        exit;
        //$_SESSION['PerfilUsr'] = 'C';
    } else {
        //echo "No existe el usuario";
        $errorLogin = "Nombre de usuario y/o password incorrecto";
        include_once 'vistas/login.php';
        //$_SESSION['PerfilUsr'] = '';

    }
} else {
    //echo "login";
    include_once 'vistas/login.php';
    //$_SESSION['PerfilUsr'] = '';
}
?>