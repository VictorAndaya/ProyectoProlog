<?
function getCarreraMateria($request){
    $carreras=new consulta();
return $carreras->getCarreraMateria($request);
}
function setCarreraMaterias($request){
    $carreras= new consulta();
    return $carreras->setCarreraMaterias($request);
}
function getMotor($request){
    $carreras= new consulta();
    return $carreras->getMotor($request);
}
function getTotalCarreraMaterias($request){
    $carreras= new consulta();
    return $carreras->getTotalCarreraMaterias($request);
}
class consulta{
    private $conexion;
    
    function __construct(){            
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

    function getCarreraMateria($request){
        $carreras;
        $response;
        $carrera=json_decode($request->getBody());
        $sql="SELECT * FROM CarreraMaterias WHERE IdCarrera=:IdCarrera AND IdMateria=:IdMateria";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("IdCarrera",$carrera->IdCarrera);
            $statement->bindParam("IdMateria",$carrera->IdMateria);
            $statement->execute();
            $count=$statement->rowCount();
            
            if($count)
            {
                //Si ya existe un registro no debe de hacer nada
                $response->mensaje = 1;
            }
            else
            {
                //De lo contario inserta
                $response->mensaje = 0;
            }         
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }
    //
    function getMotor($request){
        $carreras;
        $response;
        $carrera=json_decode($request->getBody());
        $sql="SELECT Peso FROM CarreraMaterias WHERE IdMateria=:IdMateria";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("IdMateria",$carrera->IdMateria);
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ);  
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }
    //
    function setCarreraMaterias($request){
        $carreras;
        $response;
        $carrera=json_decode($request->getBody());
        $sql="INSERT INTO CarreraMaterias (IdCarreraMateria, IdCarrera, IdMateria, Peso) VALUES(:IdCarreraMateria,:IdCarrera,:IdMateria,:Peso)"; 
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("IdCarreraMateria",$carrera->IdCarreraMateria);
            $statement->bindParam("IdCarrera",$carrera->IdCarrera);
            $statement->bindParam("IdMateria",$carrera->IdMateria);
            $statement->bindParam("Peso",$carrera->Peso);
            $statement->execute();
            $response->mensaje="Se relaciono correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }
    function getTotalCarreraMaterias($request){
        $carreras;
        $response;
        $carrera=json_decode($request->getBody());
        //$sql="SELECT IdCarrera,SUM(Peso) as PesoTotal FROM CarreraMaterias;"; 
        $sql="SELECT c.Nombre,SUM(Peso) as PesoTotal FROM CarreraMaterias cm JOIN Carreras c ON cm.IdCarrera = c.IdCarrera GROUP BY cm.IdCarrera;"; 
        try{            
            $statement=$this->conexion->prepare($sql);
            //$statement->bindParam("IdCarrera",$carrera->IdCarrera);
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ);
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }


}