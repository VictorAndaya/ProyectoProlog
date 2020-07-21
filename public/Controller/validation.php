<?

function AccessLogin($request){

    $login=new Login();
    return $login->AccessLogin($request);
}

class Login{

    private $conexion;
    
    function __construct(){            
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

    function AccessLogin($request){

        $data=json_decode($request->getbody());
        $usuario = $data->usuario;
        $contrasena = $data->contrasena;
        $response;
        $sql = "SELECT * FROM Usuarios WHERE Usuario = :usuario AND Contrasena = :contrasena";
        try{   

            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":usuario",$usuario);
            $statement->bindParam(":contrasena",$contrasena);
            $statement->execute();
            $count=$statement->rowCount();
            
            if($count)
            {
                $response->mensaje = 1;
            }
            else
            {
                $response->mensaje = 0;
            }
              

        }catch(Exception $e){
            $response=$e;
        }
        
        return json_encode($response);
    }


    

    

}