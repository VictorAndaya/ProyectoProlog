<?
function gettodoslosalumnos(){
    $alumnos=new Alumno();
return $alumnos->getAlumnos();
}
function getalumno($request){
    $alumnos=new Alumno();
return $alumnos->getAlumno($request);
}
function setalumno($request){
    $alumnos=new Alumno();
return $alumnos->setAlumno($request);
}
function updatealumno($request){
    $alumnos=new Alumno();
return $alumnos->updateAlumno($request);
}
function deletealumno($request){
    $alumnos=new Alumno();
return $alumnos->deleteAlumno($request);
}
class Alumno{

    private $conexion;
    
    function __construct(){            
        $database=new DbConnect();
        $this->conexion=$database->connect();
    }

    function getAlumnos(){
        $alumnos;
        $response;
        $sql="SELECT * FROM alumnos;";    
        try{            
            $statement=$this->conexion->prepare($sql);            
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ);            
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function getAlumno($request){
        $alumnos;
        $response;
        $alumno=json_decode($request->getBody());
        $sql="SELECT * FROM alumnos WHERE matricula=:matricula";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":matricula",$alumno->matricula);
            $statement->execute();
            $response=$statement->fetchall(PDO::FETCH_OBJ);            
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function setAlumno($request){
        $alumnos;
        $response;
        $alumno=json_decode($request->getBody());
        $sql="INSERT INTO alumnos(nombre,matricula,carrera) VALUES(:nombre,:matricula,:carrera)";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("nombre",$alumno->nombre);
            $statement->bindParam("matricula",$alumno->matricula);
            $statement->bindParam("carrera",$alumno->carrera);
            $statement->execute();
            $response->mensaje="El alumno se inserto Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function updateAlumno($request){
        $alumnos;
        $response;
        $alumno=json_decode($request->getBody());
        $sql="UPDATE alumnos SET nombre=:nombre,matricula=:matricula,carrera=:carrera WHERE id=:id";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("id",$alumno->id);
            $statement->bindParam("nombre",$alumno->nombre);
            $statement->bindParam("matricula",$alumno->matricula);
            $statement->bindParam("carrera",$alumno->carrera);
            $statement->execute();
            $response->mensaje="El alumno se actualizo Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

    function deleteAlumno($request){
        $alumnos;
        $response;
        $alumno=json_decode($request->getBody());
        $sql="DELETE FROM alumnos WHERE matricula=:matricula";    
        try{            
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam("matricula",$alumno->matricula);
            $statement->execute();
            $response->mensaje="El alumno se elimino Correctamente";
        }catch(Exception $e){
            $response=$e;
        }
        return json_encode($response);
    }

}