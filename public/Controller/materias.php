<?
function setmateria($request){
    $materias=new Materia();
    return $materias->setMateria($request);
}
function getmaterias($request){
    $materias=new Materia();
    return $materias->getMaterias($request);
}
class Materia{

    private $conexion;
    
    function __construct(){            
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

    function setMateria($request){
        $materias;
        $response;
        $data=json_decode($request->getBody());
        $sql="INSERT INTO Materias(Nombre) VALUES(:Nombre)"; 
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("Nombre",$data->nombre);
            $statement->execute();
            $response->mensaje="La materia se agrego correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }
    function getMaterias(){
        $materias;
        $response;
        $sql="SELECT * FROM Materias;";    
        try{            
            $statement=$this->conexion->prepare($sql);            
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ);            
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }
}