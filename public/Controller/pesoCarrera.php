<?
function setpeso($request){
    $pesos=new Peso();
    return $pesos->setpeso($request);
}
function getpeso($request){
    $pesos=new Peso();
    return $pesos->getpeso($request);
}
function updatepeso($request){
    $pesos=new Peso();
    return $pesos->updatepeso($request);
}
function deletepeso($request){
    $pesos=new Peso();
    return $pesos->deletepeso($request);
}

class Peso{
    private $conexion;
    
    function __construct(){            
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }
    function setpeso($request){
        $pesos;
        $response;
        $data=json_decode($request->getBody());
        $sql="INSERT INTO PesoCarrera(IdCarrera,Peso) VALUES(:IdCarrera,:Peso)"; 
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("IdCarrera",$data->IdCarrera);
            $statement->bindParam("Peso",$data->Peso);
            $statement->execute();
            $response->mensaje="El peso se agrego correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function getpeso(){
        $pesos;
        $response;
        $sql="SELECT * FROM PesoCarrera;";    
        try{            
            $statement=$this->conexion->prepare($sql);            
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ);            
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function updatepeso($request){
        $pesos;
        $response;
        $data=json_decode($request->getBody());
        $sql="UPDATE PesoCarrera SET IdCarrera=:IdCarrera,Peso=:Peso WHERE IdPeso=:IdPeso";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("IdPeso",$data->IdPeso);
            $statement->bindParam("IdCarrera",$data->IdCarrera);
            $statement->bindParam("Peso",$data->Peso);
            $statement->execute();
            $response->mensaje="El peso se actualizo correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function deletepeso($request){
        $pesos;
        $response;
        $data=json_decode($request->getBody());
        $sql="DELETE FROM PesoCarrera WHERE IdPeso=:IdPeso";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("IdPeso",$data->IdPeso);
            $statement->execute();
            $response->mensaje="La pregunta se elimino Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }
}