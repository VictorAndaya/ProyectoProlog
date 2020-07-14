<?php 
    class DbConnect{
        
        private $con;

        function connect(){
            $dbhost=getenv('CONEXION_BD_IP_SERVIDOR');
            $dbuser=getenv('CONEXION_BD_USUARIO');
            $dbpass=getenv('CONEXION_BD_PASSWORD');
            $dbname="escuela";
            $this->con =new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             if(mysqli_connect_errno()){
                echo "Failed  to connect " . mysqli_connect_error(); 
                return null; 
            }
            return $this->con; 
        }
    }
?>