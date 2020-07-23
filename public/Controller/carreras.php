<?
function gettodaslascarreras(){
    $carreras=new Carrera();
return $carreras->getCarreras();
}
function getcarrera($request){
    $carreras=new Carrera();
return $carreras->getCarrera($request);
}
function setcarrera($request){
    $carreras=new Carrera();
return $carreras->setCarrera($request);
}
function updatecarrera($request){
    $carreras=new Carrera();
return $carreras->updateCarrera($request);
}
function deletecarrera($request){
    $carreras=new Carrera();
return $carreras->deleteCarrera($request);
}
class Carrera{

    private $conexion;
    
    function __construct(){            
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

    function getCarreras(){
        $carreras;
        $response;
        $sql="SELECT * FROM Carreras;";    
        try{            
            $statement=$this->conexion->prepare($sql);            
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ);            
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function getCarrera($request){
        $carreras;
        $response;
        $carrera=json_decode($request->getBody());
        $sql="SELECT * FROM Carreras WHERE IdCarrera=:IdCarrera";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("IdCarrera",$carrera->Id);
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ);            
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function setCarrera($request){
        $carreras;
        $response;
        $carrera=json_decode($request->getBody());
        $sql="INSERT INTO Carreras (IdCarrera, Nombre) VALUES(:IdCarrera,:Nombre)";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("IdCarrera",$carrera->IdCarrera);
            $statement->bindParam("Nombre",$carrera->Nombre);
            $statement->execute();
            $response->mensaje="La carrera se inserto Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function updateCarrera($request){
        $carreras;
        $response;
        $carrera=json_decode($request->getBody());
        $sql="UPDATE Carreras SET Nombre=:Nombre WHERE IdCarrera=:IdCarrera";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("IdCarrera",$carrera->IdCarrera);
            $statement->bindParam("Nombre",$carrera->Nombre);
            $statement->execute();
            $response->mensaje="La carrera se actualizo correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function deleteCarrera($request){
        $carreras;
        $response;
        $carrera=json_decode($request->getBody());
        $sql="DELETE FROM Carreras WHERE IdCarrera=:IdCarrera";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("IdCarrera",$carrera->IdCarrera);
            $statement->execute();
            $response->mensaje="La carrera se elimino Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }


}