<?php

class UserSession{

    public function __construct(){
        session_start();
    }

    public function setCurrentUser_a($user){
        $_SESSION['user_a'] = $user;
    }

    public function getCurrentUser_a(){
        return $_SESSION['user_a'];
    }

    public function setCurrentUser_g($user){
        $_SESSION['user_g'] = $user;
    }

    public function getCurrentUser_g(){
        return $_SESSION['user_g'];
    }

    public function setCurrentUser_c($user){
        $_SESSION['user_c'] = $user;
    }

    public function getCurrentUser_c(){
        return $_SESSION['user_c'];
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }
}

?>