<?php
include_once '../../../includes/user.php';
include_once '../../../includes/user_s.php';

$userSession = new UserSession();
$user = new User();

if (isset($_SESSION['user_g']) || isset($_SESSION['user_a'])) {
    //echo "hay sesion de administrador"; 
    if (isset($_SESSION['user_g'])) {
        $user->setUser($userSession->getCurrentUser_g());
    } else if (isset($_SESSION['user_a'])) {
        $user->setUser($userSession->getCurrentUser_a());
    }
    $Nombre = './Archivos/' . htmlspecialchars($_GET["Nombre"]);
    echo $Nombre;

    if (isset($_GET['Nombre'])) {
        if (file_exists($Nombre)) {
            header('Content-Description: File Transfer');
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename=' . basename($Nombre));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($Nombre));
            ob_clean();
            flush();
            readfile($Nombre);
            exit;
        } else {
            echo 'Archivo no disponible.';
        }
    }
}
?>
