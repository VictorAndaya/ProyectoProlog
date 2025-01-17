<?
function setUsuario($request){
    $usuarios =new usuarios();
    return $usuarios->setUsuario($request);
}

function getUsuario($request){
    $usuarios = new usuarios();
    return $usuarios->getUsuario($request);

}
class usuarios{
    private $conexion;
    
    function __construct(){            
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

    function setUsuario($request){
        $response;
        $data=json_decode($request->getBody());
        
        $sql="INSERT INTO Usuarios(Rol, Nombre, Usuario, Contrasena) VALUES(0,:Nombre,:Usuario,:Contrasena)"; 
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("Nombre",$data->Nombre);
            $statement->bindParam("Usuario",$data->Usuario);
            $statement->bindParam("Contrasena",$data->Contrasena);
            $statement->execute();
            $response->mensaje="El registro fue correcto.";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }


    function getUsuario($request){
        
        $response;
        $data = json_decode($request->getBody());
        $sql = "SELECT * FROM Usuarios WHERE Usuario = :user";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("user",$data->usuario);
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ);            
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);

    }
}