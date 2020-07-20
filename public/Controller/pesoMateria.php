<?
function setPesoMateria($request){
    $pesos=new PesoMateria();
    return $pesos->setpesoMateria($request);
}
function getPesoMateria($request){
    $pesos=new PesoMateria();
    return $pesos->getPesoMateria($request);
}
function updatePesoMateria($request){
    $pesos=new PesoMateria();
    return $pesos->updatePesoMateria($request);
}
function deletePesoMateria($request){
    $pesos=new PesoMateria();
    return $pesos->deletePesoMateria($request);
}

class PesoMateria{
    private $conexion;
    
    function __construct(){            
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }
    function setPesoMateria($request){
        $pesos;
        $response;
        $data=json_decode($request->getBody());
        $sql="INSERT INTO CarreraMaterias(IdCarrera,IdMateria,Peso) VALUES(:IdCarrera,:IdMateria,:Peso)"; 
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("IdCarrera",$data->IdCarrera);
            $statement->bindParam("IdMateria",$data->IdMateria);
            $statement->bindParam("Peso",$data->Peso);
            $statement->execute();
            $response->mensaje="El peso se agrego correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function getPesoMateria(){
        $pesos;
        $response;
        $sql="SELECT * FROM CarreraMaterias;";    
        try{            
            $statement=$this->conexion->prepare($sql);            
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ);            
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function updatePesoMateria($request){
        $pesos;
        $response;
        $data=json_decode($request->getBody());
        $sql="UPDATE CarreraMaterias SET IdCarrera=:IdCarrera,IdMateria=:IdMateria,Peso=:Peso WHERE IdCarreraMateria=:IdCarreraMateria";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("IdCarreraMateria",$data->IdCarreraMateria);
            $statement->bindParam("IdCarrera",$data->IdCarrera);
            $statement->bindParam("IdMateria",$data->IdMateria);
            $statement->bindParam("Peso",$data->Peso);
            $statement->execute();
            $response->mensaje="El peso se actualizo correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function deletePesoMateria($request){
        $pesos;
        $response;
        $data=json_decode($request->getBody());
        $sql="DELETE FROM CarreraMaterias WHERE IdCarreraMateria=:IdCarreraMateria";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("IdCarreraMateria",$data->IdCarreraMateria);
            $statement->execute();
            $response->mensaje="La pregunta se elimino Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }
}