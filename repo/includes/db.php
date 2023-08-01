<?php
    /*$db_host="localhost";
    $db_nombre="Reposteriakos";
    $db_usuario="root";
    $db_contra="";*/
?>

<?php
/*$db_host = "localhost";
$db_usuario = "root";
$db_contra = "";
$db_nombre = "Reposteriakos";

// Create connection
$conn = new mysqli($db_host,$db_usuario,  $db_contra, $db_nombre);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    echo "Connected successfully";
}*/

?>
<?php

class DB{
    private $host;
    private $db;
    private $user;
    private $password;

    public function __construct(){
        $this->host     = 'localhost';
        $this->db       = 'reposteriakos';
        $this->user     = 'root';
        $this->password = "";
    }

    function connect(){
    
        try{
            
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($connection, $this->user, $this->password, $options);
    
            return $pdo;

        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }   
    }
}
