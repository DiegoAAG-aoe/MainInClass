<?php
include 'db.php';

class User extends DB{
    private $ID;
    private $email;
    private $pwd;
    private $cargo;


    public function userExists_c($user, $pass){
        $md5pass = $pass;
        $query = $this->connect()->prepare('SELECT Con_Correo, Con_Contraseña FROM Consumidor WHERE Con_Correo = :user AND Con_Contraseña = :pass');
        $query->execute(['user' => $user, 'pass' => $md5pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function userExists_a($user, $pass){
        $md5pass = $pass;
        $query = $this->connect()->prepare('SELECT Adm_Correo, Adm_Contraseña, Adm_Cargo FROM administrador WHERE Adm_Correo = :user AND Adm_Contraseña = :pass AND Adm_Cargo = 1');
        $query->execute(['user' => $user, 'pass' => $md5pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function userExists_g($user, $pass){
        $md5pass = $pass;
        $query = $this->connect()->prepare('SELECT Adm_Correo, Adm_Contraseña, Adm_Cargo FROM administrador WHERE Adm_Correo = :user AND Adm_Contraseña = :pass AND Adm_Cargo != 1');
        $query->execute(['user' => $user, 'pass' => $md5pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser_c($user){
        $query = $this->connect()->prepare('SELECT Con_ID, Con_Correo, Con_Contraseña FROM Consumidor WHERE Con_Correo = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->ID = $currentUser['Con_ID'];
            $this->email = $currentUser['Con_Correo'];
            $this->pwd = $currentUser['Con_Contraseña'];
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT Adm_Correo, Adm_Contraseña, Adm_Cargo FROM administrador WHERE Adm_Correo = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->email = $currentUser['Adm_Correo'];
            $this->pwd = $currentUser['Adm_Contraseña'];
        }
    }

    public function getNombre(){
        return $this->email;
    }
}

?>