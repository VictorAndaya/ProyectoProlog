<?
function getPreguntas($request){
    $preguntas=new Pregunta();
    return $preguntas->getpreguntas($request);
}
function setpreguntas($request){
    $preguntas=new Pregunta();
    return $preguntas->setpreguntas($request);
}
function updatepregunta($request){
    $preguntas=new Pregunta();
    return $preguntas->updatepregunta($request);
}
function deletepregunta($request){
    $preguntas=new Pregunta();
    return $preguntas->deletepregunta($request);
}

class Pregunta{
    private $conexion;
    
    function __construct(){            
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }
    function getpreguntas(){
        $preguntas;
        $response;
        $sql="SELECT * FROM Preguntas;";    
        try{            
            $statement=$this->conexion->prepare($sql);            
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ);            
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }
    function setpreguntas($request){
        $preguntas;
        $response;
        $data=json_decode($request->getBody());
        $sql="INSERT INTO Preguntas(IdMateria,Pregunta) VALUES(:idMateria,:pregunta)"; 
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("idMateria",$data->idMateria);
            $statement->bindParam("pregunta",$data->pregunta);
            $statement->execute();
            $response->mensaje="La pregunta se agrego correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }
    function updatepregunta($request){
        $preguntas;
        $response;
        $data=json_decode($request->getBody());
        $sql="UPDATE Preguntas SET IdMateria=:IdMateria,Pregunta=:Pregunta WHERE IdPregunta=:IdPregunta";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("IdPregunta",$data->IdPregunta);
            $statement->bindParam("IdMateria",$data->IdMateria);
            $statement->bindParam("Pregunta",$data->Pregunta);
            $statement->execute();
            $response->mensaje="La pregunta se actualizo correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function deletepregunta($request){
        $preguntas;
        $response;
        $data=json_decode($request->getBody());
        $sql="DELETE FROM Preguntas WHERE IdPregunta=:IdPregunta";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("IdPregunta",$data->IdPregunta);
            $statement->execute();
            $response->mensaje="La pregunta se elimino Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }
}