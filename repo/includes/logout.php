<?php

    include_once 'user_s.php';

    $userSession = new UserSession();
    $userSession->closeSession();

    header("location: ../index.php");

?>