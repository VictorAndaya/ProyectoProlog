<?
function setmateria($request){
    $materias=new Materia();
    return $materias->setMateria($request);
}
function getmaterias($request){
    $materias=new Materia();
    return $materias->getMaterias($request);
}
function updatematerias($request){
    $materias=new Materia();
    return $materias->updateMaterias($request);
}
function deletematerias($request){
    $materias=new Materia();
    return $materias->deleteMaterias($request);
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

    function updateMaterias($request){
        $carreras;
        $response;
        $carrera=json_decode($request->getBody());
        $sql="UPDATE Materias SET Nombre=:Nombre WHERE IdMateria=:IdMateria";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("IdMateria",$carrera->IdMateria);
            $statement->bindParam("Nombre",$carrera->Nombre);
            $statement->execute();
            $response->mensaje="La Materia se actualizo correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function deleteMaterias($request){
        $carreras;
        $response;
        $carrera=json_decode($request->getBody());
        $sql="DELETE FROM Materias WHERE IdMateria=:IdMateria";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("IdMateria",$carrera->IdMateria);
            $statement->execute();
            $response->mensaje="La Materia se elimino Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }
}